<?php
/**
 * @checkCountCharsInText - подсчет символов без пробелов в посту для проверки. Не менее 2000т символов
 */

function checkCountCharsInText(string $text): bool
{
    $sizeText = 2000;
    $textNonSpace = str_replace(array(" "), '', $text);
    $countChars = mb_strlen($textNonSpace, 'utf8');
    if ($countChars < $sizeText) {
        return false;
    }
    return true;
}

/**
 * @cutTextPost - обрезает текст поста до нужного количества букв. В нашем случае лучше 1572символа оставить
 */
function cutTextPost(string $string, int $countChars): string
{

    $string = strip_tags($string);
    $string = substr($string, 0, $countChars);
    $string = rtrim($string, "!,.-");
    $string = substr($string, 0, strrpos($string, ' '));
    return $string . "… ";
}

/**
 * Выводит последние три поста по любым категориям.
 *  $space: указывает на папку, в которой хранятся посты всех категорий
 * $countPosts: указывает на количество выводимых постов
 * Функция типа void
 * @getNewPosts
 */
function getNewPostsFromAllCategories(string $space, int $countPosts,string $text): void
{
    /** $arrayAllPosts сортировка по ключу в массивах*/
    $arrayAllPosts = sortFilesInSpaceById($space);
    /**$arrayLast берем последние три поста*/
    $arrayLast = array_slice($arrayAllPosts, -$countPosts);
    /** $arrayRev реверсируем массив, что бы выводить с конца*/
    $arrayRev = array_reverse($arrayLast);

    foreach ($arrayRev as $item) {
        echo sprintf($text, $item[0], $item[0], $item[2], $item[2], $item[3], $item[3], $item[3], $item[3], cutTextPost($item[4], 1574),
            getCountComments($item[0]), $item[5], $item[5], $item[0]);
    }
}

/**
 * Выводит посты по определенной категории.
 * $space: указывает на папку, в которой хранятся посты всех категорий.
 * $category: указывает на необходимую категорию, из которой будут выводиться посты
 * Функция типа void
 * @getNewPostsFromCategory
 */
function getNewPostsFromCategory(string $space, string $category,string $text): ?bool
{
    /**
     * $arrayAllPostsByCategories получает массив постов с указанной категорией.
     * Где field1 5 - ключ в массиве со значением категории
     * Где field2 6 - ключ в массиве со значением опубликовано/не опубликовано
     */
    $arrayAllPostsByCategories = selectWhereFieldsEqual($space, 5, $category,6,1);

    //$arrayLast = array_slice($arrayAllPostsByCategories, -$countPosts);
    /**
     * $arrayRev - получает массив постов в реверсивном варианте
     */
    $arrayRev = array_reverse($arrayAllPostsByCategories);
   if (!empty($arrayRev)) {
       foreach ($arrayRev as $item) {
      echo sprintf($text, $item[0], $item[0], $item[2], $item[2], $item[3], $item[3], $item[3], $item[3], cutTextPost($item[4], 1574),
            getCountComments($item[0]), $item[5], $item[5], $item[0]);
    } return true;}
   else return false;

}






