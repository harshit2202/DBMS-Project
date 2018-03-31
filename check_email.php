<?php
    isValidEmail("iit2016022@iiita.ac.in");
    function isValidEmail($email) {
    	echo $email;
        $email = filter_var($email , FILTER_SANITIZE_EMAIL);
        echo $email;
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
            echo "true";
        else
            echo "false";
    }

?>