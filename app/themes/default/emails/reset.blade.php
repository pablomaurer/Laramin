<h1>Hello {{ $email }}!</h1>
<h2>Do you want to reset you're Passwort?</h2>

<p>In order to Reset your account Password, klick on this following Link or enter the Reset Code manually.</p>

<p>
<ul>
    <li>Reset Link: {{ link_to_route('confirmReset', 'here', $data = array('resetCode' => $resetCode)) }} </li>
    <li>Confirmation Code: {{ $resetCode }}</li>
</ul>
</p>

