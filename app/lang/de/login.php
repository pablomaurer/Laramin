<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    // Login Page
    "loginTitle"           => "Bitte Anmelden",
    "remember"             => "Passwort merken",
    "login"                => "Anmelden",
    "logout"               => "Abmelden",
    "email"                => "Email",
    "password"             => "Passwort",
    "register"             => "Registrieren",
    "forgot"               => "Passwort vergessen?",
    "username"             => "Benutzername",

    // Register Page
    "registerTitle"       => "Bitte Regisrieren",
    "pleaseRegister"      => "Bitte Regisrieren",

    // Confirmation Page
    "confirmTitle"      => "Registrierung bestätigen",
    "confirmCode"       => "Bestätigungs Code",
    "confirmInfo"       => "Bestätigungs möglichkeiten: <ol><li>Geben Sie den Bestätigungscode den Sie per Mail erhalten haben ein</li><li>Klicken Sie auf den Link im Email!</li>",
    "confirmMailTitle"  => "Bitte Bestätigen Sie die Registrierung!",  //todo Prio Low: mail subject with name of website

    // Reset Page
    "resetTitle"            => "Passwort zurücksetzen...",
    "reset"                 => "Zurücksetzen",
    "resetInfo"             => "Wie weiter? <ol><li>Geben Sie die Email Adresse an.</li><li>Klicken Sie auf den Zurücksetzen Link im Email</li><li>Falls der Link nicht funktioniert geben Sie den Code hier manuell ein.</li></ol>",
    "confirmResetMailTitle" => "Bestätigen Sie, dass Sie ein neues Passwort möchten!", //todo Prio Low: mail subject with name of website
    "newPassword"           => "Neus Passwort",

    "between"              => array(
        "numeric" => "The :attribute must be between :min and :max.",
        "file"    => "The :attribute must be between :min and :max kilobytes.",
        "string"  => "The :attribute must be between :min and :max characters.",
        "array"   => "The :attribute must have between :min and :max items.",
    ),
);
