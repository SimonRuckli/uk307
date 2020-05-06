<?php

class Validation
{
    static public $errors;

    public static function validateName($name)
    {
        if(!preg_match('/.[a-zA-Z]/', trim($name)))
        {
            $errors[] = "{$name} ist nicht gültig.\n";
        }
    }

    public static function validateEmail($email)
    {
        if (filter_var(trim($email), FILTER_VALIDATE_EMAIL) == false)
        {
            $errors[] = "{$email} ist nicht gültig.\n";
        }
    }

    public static function validatePhone($phone)
    {
        if(!preg_match('/^-[0-9]{10}+$/', trim($phone)))
        {
            $errors[] = "{$phone} ist nicht gültig.\n";
        }
    }

    public static function validateUrgency($urgency)
    {
        if($urgency == " -- Bitte auswählen -- ")
        {
            $errors[] = "{$urgency} ist nicht gültig.\n";
        }
    }

    public static function validateTool($tools)
    {

    }
}