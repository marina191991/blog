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

function checkTypeImageFile(array $fileImage): bool {
    // разбиваем имя файла по точке и получаем массив
    $getMime = explode('.', $fileImage['name']);
    // нас интересует последний элемент массива - расширение
    $mime = strtolower(end($getMime));
    // объявим массив допустимых расширений
    $types = ['jpg', 'png', 'gif', 'bmp', 'jpeg'];
    // если расширение не входит в список допустимых - return
    if(in_array($mime, $types)) {
        return true;
    }
    return false;
}

function checkErrorUploadImage($errorCode): ?string {
    $size = 3500000;
    $mb = $size / 1e+6;
    $errorMessages = [
        UPLOAD_ERR_INI_SIZE => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
        UPLOAD_ERR_FORM_SIZE => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме. Допустимый размер' . $mb,
        UPLOAD_ERR_PARTIAL => 'Загружаемый файл был получен только частично.',
        UPLOAD_ERR_NO_FILE => 'Файл не был загружен.',
        UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
        UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
        UPLOAD_ERR_EXTENSION => 'PHP-расширение остановило загрузку файла.',
    ];
    if (!isset($errorMessages[$errorCode])) {
        return null;
           }
    return $errorMessages[$errorCode];

}