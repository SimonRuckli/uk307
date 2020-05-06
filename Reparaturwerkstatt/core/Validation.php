<?php

class Validation
{
    private  $errors = array();

    public  function validateName($name)
    {
        if(!preg_match('/.[a-zA-Z]/', trim($name)))
        {
            array_push($this->errors, "Name ist nicht gültig.\n");
        }
    }

    public function validateEmail($email)
    {
        if (filter_var(trim($email), FILTER_VALIDATE_EMAIL) == false)
        {
            array_push($this->errors,"E-Mail ist nicht gültig.\n");
        }
    }

    public function validatePhone($phone)
    {
        if(!preg_match("/^[0-9 + .\-]+$/i", trim($phone)))
        {
            array_push($this->errors,"Telefonnummer ist nicht gültig.\n");
        }
    }
    
    public function validateUrgency($urgency)
    {
        if($urgency == "")
        {
            array_push($this->errors,"Dringlichkeit muss gewählt werden.\n");
        }
    }

    public function validateProcessing($processing)
    {
        if($processing == "")
        {
            array_push($this->errors,"Status muss gewählt werden.\n");
        }
    }

    public function validateTool($selectedTool)
    {
        $count = 0;
        $pdo = new Task();
        $tools = $pdo->getAllTools();

        foreach($tools as $tool)
        {
            if(strtoupper($tool) != strtoupper($selectedTool))
            {
                $count++;
            }
        }

        if(count($tools) == $count)
        {
            array_push($this->errors,"Werkzeug gibt es nicht.\n");
        }
    }

    public function hasNoErrors() : bool {
        return count($this->errors) === 0;
    }

    public function getErrors() {
        return $this->errors;
    }
}