<?php
function insert(string $space, int $id, array $data): void
{
    $filePath = _getPathFile($space, $id);
    $content = json_encode($data);
    file_put_contents($filePath, $content);
}

function getById(string $space, int $id): ?array
{
    $filePath = _getPathFile($space, $id);
    if (!file_exists($filePath)) {
        return null;
    }
    return json_decode(file_get_contents($filePath), true);
}

function deleteById($space, $id): void
{
    $filePath = _getPathFile($space, $id);
    if (!file_exists($filePath)) {
        return;
    }
    unlink($filePath);
}
/**получить все файлы, где полЯ равны значению*/
function selectWhereFieldsEqual(string $space, $field1, $value1, $field2, $value2): ?array
{
    $arrResult = [];
    foreach (getAll($space) as $file) {
        if (($file[$field1] == $value1) && ($file[$field2] == $value2)) {
            $arrResult[] = $file;
        }
    }
    return $arrResult;
}

/**получить все файлы, где поле равно значению*/
function selectWhereFieldEqual(string $space, $field, $value): ?array
{
    $arrResult = [];
    foreach (getAll($space) as $file) {
        if ($file[$field] == $value) {
            $arrResult[] = $file;
        }
    }
    return $arrResult;
}

function getAll($space): ?array
{
    $spacePath = _getPathSpace($space);
    $arrayResult = [];
    $arrFiles = scandir($spacePath);
    array_shift($arrFiles);
    array_shift($arrFiles);
    foreach ($arrFiles as $file) {
        $filePath = $spacePath . "/" . $file;
        $arrayResult[] = json_decode(file_get_contents($filePath), true);

    }
    return $arrayResult;
}

function getMaxIdForSpace(string $space): int
{
    $pathSpace = _getPathSpace($space);
    $arrayFiles = scandir($pathSpace);
    return (int)explode(".", max($arrayFiles))[0];


}

//получить id по полю
function getIdByField(string $space, int $field, string $value): ?int
{
    $arrResult = [];
    $idArr = [];
    $k = 0;
    $spacePath = _getPathSpace($space);
    $arrFiles = scandir($spacePath);
    array_shift($arrFiles);
    array_shift($arrFiles);
    foreach ($arrFiles as $file) {
        $filePath = $spacePath . "/" . $file;
        $arrResult[] = json_decode(file_get_contents($filePath), true);
        $idArr[] = explode(".", $file)[0];
    }
    foreach ($arrResult as $fileIn) {
        if ($fileIn[$field] == $value) {
            return $idArr[$k];
        }
        $k++;
    }
    return null;
}

//получить по id значение поля
function getValueById(string $space, int $id, int $key): ?string
{
    $arrResult = [];
    $filePath = _getPathFile($space, $id);
    $arrResult[] = json_decode(file_get_contents($filePath), true);
    $outArray = call_user_func_array('array_merge', $arrResult);
    return $outArray[$key];

}

//изменить или добавить по id значение в указанном поле
function insertValueById(string $space, int $id, string $value, int $key): void
{
    $filePath = _getPathFile($space, $id);
    $arrResult[] = json_decode(file_get_contents($filePath), true);
    $outArray = call_user_func_array('array_merge', $arrResult);
    $outArray[$key] = $value;
    echo print_r($outArray);
    $content = json_encode($outArray);
    file_put_contents($filePath, $content);
}

function setId(string $space): int
{
    if (getMaxIdForSpace($space) > 0) {
        return getMaxIdForSpace($space) + 1;
    }
    return 1;
}
/**сортировка по ключу в массивах*/
function sortFilesInSpaceById (string $space) {
    $arrayAllPosts = getAll($space);
    //сортировка по ключу в массивах
    $id  = array_column($arrayAllPosts, 0);
    array_multisort ($id,SORT_ASC,$arrayAllPosts);
    return $arrayAllPosts;
}

function _getPathSpace(string $space): string
{

    //for dedugging test.php
    //$pathSpace = "storage/" . $space;

    if (!file_exists("../storage/test")) {
        $pathSpace = "storage/" . $space;
        if (!file_exists($pathSpace)) {
            mkdir($pathSpace, 0777, true);
        }
    }
    else   {
        $pathSpace = "../storage/" . $space; {
            if (!file_exists($pathSpace)) {
                mkdir($pathSpace, 0777, true);
            }
        }
    }

return $pathSpace;
}

function _getPathFile(string $space, int $id): string
{
    return _getPathSpace($space) . "/$id.json";
}

