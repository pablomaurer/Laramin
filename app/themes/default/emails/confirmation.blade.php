You're Confirmation Code:

<h1>Hello {{ $email }}!</h1>
<h2>Please Activate your Account</h2>

<p>In order to activate your account klick on this following Link or enter the Activation Code manually.</p>

<p>
    <ul>
        <li>Activation Link: {{ link_to_route('confirm', 'here', $data = array('activationCode' => $activationCode)) }} </li>
        <li>Confirmation Code: {{ $activationCode }}</li>
    </ul>
</p>