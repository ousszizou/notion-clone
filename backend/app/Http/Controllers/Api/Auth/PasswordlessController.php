<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\AuthCode;
use App\Models\User;
use App\Mail\MagicAuthCodeLink;

class PasswordlessController extends Controller
{
    public function send(Request $request) {
        // Get the email address from the request
        $email = $request->email;
        // Check if the email address is found in the database
        if (!User::where("email", $email)->exists()) {
            // Generate a random code by generateCode() method
            $code = $this->generateCode();
            // Generate a URL with the code and email address by generateUrl() method
            $url = $this->generateUrl($code, $email);
            // Store the code & email to DB
            $this->SaveCredientialsToDB($code, $email);
            // Send Mail to the user with the URL & code
            $this->sendMail($url, $code, $email);
            return response()->json([
                "message" => "We just sent you a temporary signup code. Please check your inbox.",
                "status" => 200
            ]);
        } else {
            return response()->json([
                "mesage" => "We just sent you a temporary login code. Please check your inbox.",
                "status" => 200
            ]);
        }
    }

    // Store the code & email to DB
    protected function SaveCredientialsToDB($code, $email) {
        return AuthCode::create([
            "code" => $code,
            "email" => $email
        ]);
    }

    // Generate a random code for passwordless authentication
    protected function generateCode() {
        $code = Str::random(5) . "-" . Str::random(3) . "-" . Str::random(4) . "-" . Str::random(5);

        return $code;
    }

    // Generate a Signed URL with the code and email address
    protected function generateUrl($code, $email) {
        $signedUrl = URL::temporarySignedRoute(
            'passwordless-auth.verify', now()->addMinutes(30), ['email' => $email, 'code' => $code]
        );

        $url = env("SPA_URL") . "/passwordless-auth?queryURL=" . $signedUrl;

        return $url;
    }

    // Send Mail to user
    protected function sendMail($url, $code, $email) {
        \Mail::to($email)->send(new MagicAuthCodeLink($url, $code));
    }
}
