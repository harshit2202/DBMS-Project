<?php
    isValidEmail("nweinf@nvsn.ceij");
    function isValidEmail($email) {
        $email = filter_var($email , FILTER_SANITIZE_EMAIL);
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }

?>