<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class PasswordlessController extends Controller
{
    public function send(Request $request) {
        // Get the email address from the request
        $email = $request->email;
        // Generate a random code by generateCode() method
        $code = $this->generateCode();
        // Generate a URL with the code and email address by generateUrl() method
        $url = $this->generateUrl($code, $email);
        return response()->json([
            "email" => $email,
            "code" => $code,
            "url" => $url
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
}
