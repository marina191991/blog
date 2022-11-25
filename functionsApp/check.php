<?php
function clean($value): string
{
    $value = trim($value); //Удаляет пробелы (или другие символы) из начала и конца строки
    $value = stripslashes($value); //Удаляет экранирование символов
    $value = strip_tags($value);
    return htmlspecialchars($value);
}

function checkLength($value, $min, $max): bool
{
    return (strlen($value) >= $min && strlen($value) <= $max);
}
function checkPass($password,$passwordR): bool {
    return ($password === $passwordR);

}
function checkLengthValues($password,$name): bool {

    return (checkLength($name, 4, 10) && checkLength($password, 6, 12));
}
function validEmail($email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}
