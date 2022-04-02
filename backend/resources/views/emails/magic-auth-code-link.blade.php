@component("mail::message")
<h1>Signup</h1>
We didn't find a Notion account for this email address.
@component("mail::button", ["url" => $url])
Click to sign up
@endcomponent
Or, copy and paste this temporary signup code:<br />
<code>{{ $code }}</code><br />

If you didn't try to signup, you can safely ignore this email.<br />
Hint: You can set a permanent password in Settings & members → My account.
@endcomponent
