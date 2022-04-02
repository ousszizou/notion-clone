<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MagicAuthCodeLink extends Mailable
{
    use Queueable, SerializesModels;

    public $url;
    public $code;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($url, $code)
    {
        $this->url = $url;
        $this->code = $code;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(config("app.name"))->markdown("emails.magic-auth-code-link")->with([
            "url" => $this->url,
            "code" => $this->code
        ]);
    }
}
