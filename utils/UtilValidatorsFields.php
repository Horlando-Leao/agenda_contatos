<?php

class UtilValidatorsFields {

    public static function isEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else{
            return false;
        }
    }

    public static function lengthMaxMin($ValueField, $lenMax, $lenMin){
        $lenValueField = strlen($ValueField);

        if($lenValueField > $lenMax || $lenValueField < $lenMin){
            return false;
        }else{
            return true;
        }
        
    }
}