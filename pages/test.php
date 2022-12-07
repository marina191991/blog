<?php
//include 'functionsApp/registrFunc.php';
include_once '../functionsDB/dbFunctions.php';
include_once '../functionsApp/postFunctions.php';
//["tatyana","martiniz@gmail.com","zxzxzxz","e92c70ea5c90d141000079a0ba276b84"]


$min = 0;

$arrayComments = getAll("posts");

$id = array_column($arrayComments, 0);
array_multisort($id, SORT_ASC, $arrayComments);

//$sort=natcasesort($arrayComments);
//$sort = usort($arrayComments,natcasesort);
echo print_r($arrayComments);
/*foreach ($sort as $arrayComment) {
   echo $arrayComment[0];
}*/
echo "\n";
//echo print_r($arrayComments)."\n";
//foreach ($arrayComments as $item) {
//cutTextPost($item[4],500);
//вывести на главную страницу для короткого поста 1572 символа
// echo strlen($item[4])> 1600;//условие для создания поста. Минимальное количество букв
/*$string=$item[4];
$string = strip_tags($string);
$string = substr($string, 0, 1000);
$string = rtrim($string, "!,.-");
$string = substr($string, 0, strrpos($string, ' '));
echo $string."… ";*/
//$textResult=mb_strimwidth($text, 0, 1572, "...");
// echo $string;

/*    echo "<br><br>";
}*/

//insertValueById("test",1,"xerota",3);
/*$email = "checkmate@check.ru";
echo $id=getIdByField("users", 1, $email);
echo "\n";
echo gettype($id)."\n";
echo $token = getValueById("users", $id, 3);
echo "\n";
echo '$token='.gettype($token);
$token = md5(microtime() . 'salt' . time());

echo "\n";
insertValueById("users", $id, $token, 3);*/

//echo time() + (60 * 60 * 24 * 30)."\n";
//echo print_r($arr123);
/*$arr123[]="xyu";
echo print_r($arr123);
insert("test",1,$arr123)*/;
/*$arr=["katya"=>23,"tanya"=>35];
$arr1=["katya"=>13,"tanya"=>45];
$arr2=["katya"=>30,"tanya"=>20];

/*$a=3;
$b=10;
$c=8;
if (!empty($a)) {
    if ($a == 3) {
        echo 1;
    }
    if ($b <3) {
        echo 2;
    }
    if ($c > 3) {
        echo 3;
    }
}*/
/*$int=setId("test");
echo $int."\n";
*/
//echo getMaxIdForSpace("users");
/*var_dump(getAll("test"));*/
/*var_dump(selectWhereFieldEqual("test","katya",23));*/
/*var_dump(getById("test",1));*/
/*deleteById("test",1);*/

