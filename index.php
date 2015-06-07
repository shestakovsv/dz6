<?php
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
ini_set('display_errors', 1 );
header('Content-type: text/html; charset=utf-8');


//GET

$news='Четыре новосибирские компании вошли в сотню лучших работодателей
Выставка университетов США: открой новые горизонты
Оценку «неудовлетворительно» по качеству получает каждая 5-я квартира в новостройке
Студент-изобретатель раскрыл запутанное преступление
Хоккей: «Сибирь» выстояла против «Ак Барса» в пятом матче плей-офф
Здоровое питание: вегетарианская кулинария
День святого Патрика: угощения, пивной теннис и уличные гуляния с огнем
«Красный факел» пустит публику на ночные экскурсии за кулисы и по закоулкам столетнего здания
Звезды телешоу «Голос» Наргиз Закирова и Гела Гуралиа споют в «Маяковском»';
$news=  explode("\n", $news);



if ($_GET == null){
    all_news($news);
    table();
exit;} 

if ($_GET['id'] == null){
    all_news($news);
    table();
exit;} 
$id=$_GET["id"];
$amount_keys=count($news);

if (is_numeric($id)and $id<$amount_keys){
    table();
    news($news);
}
else{
    table();
    not_round_news();   
} 
// функция вывода таблицы
function table(){
echo 'Введите id конкретной новости'."\n";
?>
<!DOCTYPE HTML>
<FORM ACTION="http://xaver.loc/index.php"
METHOD="GET">
<INPUT size=31 name="id">
<P>
<INPUT TYPE="submit" VALUE="Отправить"> <P>
</FORM>
<?php
}

// Функция вывода всего списка новостей.
function all_news($x){
    foreach ($x as $key => $value){
        echo '- ['.$key.']'.$value."<br>";
    }
}

//// Функция вывода конкретной новости.
function news($x){
    global $id;   
    echo '<h2>'.$x[$id].'</h2>';
}

// 404 error
function not_round_news(){
  header ("HTTP/1.1 404 Not Found");
       header("Status: 404 Not Found");
       echo '<div style="text-align: center; margin-top: 200px"><h1>404 Not Found</h1>';
       exit;    
}

?>