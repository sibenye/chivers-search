<?php

  require_once('recaptchalib.php');
  $privatekey = "6LdC8cISAAAAAHcmtbVoS2KkWgfKqqyqZjfJB8hB";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) :
    // What happens when the CAPTCHA was entered incorrectly
    $errorcaptcha = "The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "reCAPTCHA said: " . $resp->error;
   else:
    $errorcaptcha = 0;
  endif;
  ?>
 