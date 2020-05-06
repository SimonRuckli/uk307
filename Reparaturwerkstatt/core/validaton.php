<?php

static class Validation
{
    public static $errors[];

    public function validateName($name)
    {
        if(!preg_match('/.[a-zA-Z]/', trim($name)))
        {
            $errors[] = "{$name} ist nicht gültig.\n";
        }
    }

    public function validateEmail($email)
    {
        if (filter_var(trim($email), FILTER_VALIDATE_EMAIL) == false)
        {
            $errors[] = "{$email} ist nicht gültig.\n";
        }
    }

    public function validatePhone($phone)
    {
        if(!preg_match('/^-[0-9]{10}+$/', trim($phone)))
        {
            $errors[] = "{$phone} ist nicht gültig.\n";
        }
    }

    public function validateUrgency($urgency)
    {
        if($urgency == " -- Bitte auswählen -- ")
        {
            $errors[] = "{$urgency} ist nicht gültig.\n";
        }
    }

    public function validateTool()
    {

    }
}