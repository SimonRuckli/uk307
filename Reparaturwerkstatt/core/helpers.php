<?php

/**
 * Nutze diese Funktion um einfach eine Ausgabe
 * mit htmlspecialchars() zu erstellen.
 *
 * @param  string $value
 *
 * @return string
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}

/**
 * Nutze diese Funktion um auf einen POST-Wert
 * zuzugreifen.
 *
 * @param  string $value
 *
 * @return mixed
 */
function post(string $key, $default = '')
{
    return $_POST[$key] ?? $default;
}

function get(string $key, $default = "")
{
    return $_GET[$key] ?? $default;
}

function getReturnDate($entrydate, $urgency): string
{
    switch ($urgency) {
        case "sehr tief":
            return date("Y-m-d", strtotime($entrydate . " + 25 days"));
        case "tief":
            return date("Y-m-d", strtotime($entrydate . " + 20 days"));
        case "normal":
            return date("Y-m-d", strtotime($entrydate . " + 15 days"));
        case "hoch":
            return date("Y-m-d", strtotime($entrydate . " + 10 days"));
        case "sehr hoch":
            return date("Y-m-d", strtotime($entrydate . " + 5 days"));
    }
}

function getInTimeIcon($status, $entryDate, $urgency): string
{
    $today = date("Y-m-d");
    
    if (getReturnDate($entryDate, $urgency) < $today && $status == "1") {
        return "👎";
    } else if (getReturnDate($entryDate, $urgency) < $today && $status == "0") {
        return "👍";
    } else if (getReturnDate($entryDate, $urgency) > $today && $status == "1") {
        return "👍";
    } else if (getReturnDate($entryDate, $urgency) > $today && $status == "0") {
        return "👍";
    }
}
