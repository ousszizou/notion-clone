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
        return response()->json([
            "email" => $email,
            "code" => $code,
        ]);
    }

    // Generate a random code for passwordless authentication
    protected function generateCode() {
        $code = Str::random(5) . "-" . Str::random(3) . "-" . Str::random(4) . "-" . Str::random(5);

        return $code;
    }
}
