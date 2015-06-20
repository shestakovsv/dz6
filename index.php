<?php
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
ini_set('display_errors', 1 );
header('Content-type: text/html; charset=utf-8');

session_start();

//print_r($_POST);
function notation(){
?>
<form  method="post">
    
<label<b>Ваше имя </b></label><input type="text" maxlength="40"   name="seller_name">
<br>  
<label>Электронная почта </label><input type="text"  name="email">
<br>
<label>Номер телефона </label><input type="text" c name="phone">
<br>
<label>Город</label> 
    <select title="Выберите Ваш город" name="location_id">
        <option value="">-- Выберите город --</option>
        <option class="opt-group" disabled="disabled">-- Города --</option>
            <option selected="" data-coords=",," value="Новосибирск">Новосибирск</option>   
            <option data-coords=",," value="Барабинск">Барабинск</option>   
            <option data-coords=",," value="Бердск">Бердск</option>   
            <option data-coords=",," value="Искитим">Искитим</option>   
            <option data-coords=",," value="Колывань">Колывань</option>
            <option id="select-region" value="0">Выбрать другой...</option> </select> 
<br>
<label>Категория</label> 
    <select title="Выберите категорию объявления" name="category_id" > 
        <option value="">-- Выберите категорию --</option>
            <optgroup label="Транспорт">
                <option value="9">Автомобили с пробегом</option>
                <option value="109">Новые автомобили</option>
                <option value="14">Мотоциклы и мототехника</option>
                <option value="81">Грузовики и спецтехника</option>
                <option value="11">Водный транспорт</option>
                <option value="10">Запчасти и аксессуары</option>
            </optgroup></select>
<br>
<label for="fld_title" class="form-label">Название объявления</label> <input type="text" maxlength="50"  name="title">
<br>
<label>Описание объявления</label><textarea maxlength="3000" name="description"></textarea>
<br>
<label>Цена</label> <input type="text" maxlength="9" value="0" name="price"><span>руб.</span>
<br><br>
<input type="submit" value="Далее" id="form_submit" name="main_form_submit" class="vas-submit-input"> 
<br><br>
        
</form>
<?php
    
}
notation();




// функция вывода заполненной формы

function notation2($key){
 echo   $_SESSION['advt'][$key]['seller_name'];
?>
<form  method="post">
    
    <label><b>Ваше имя </b></label><input type="text" maxlength="40"  value="<?php echo $_SESSION['advt'][$key]['seller_name'];?>" name="seller_name">
<br>  
<label>Электронная почта </label><input type="text" value="<?php echo $_SESSION['advt'][$key]['email'];?>" name="email">
<br>
<label>Номер телефона </label><input type="text" value="<?php echo $_SESSION['advt'][$key]['phone'];?>" name="phone">
<br>
<label>Город</label> 
    <select title="Выберите Ваш город" value="<?php echo $_SESSION['advt'][$key]['location_id'];?>" name="location_id">
        <option value="">-- Выберите город --</option>
        <option class="opt-group" disabled="disabled">-- Города --</option>
            <option selected="" data-coords=",," value="Новосибирск">Новосибирск</option>   
            <option data-coords=",," value="Барабинск">Барабинск</option>   
            <option data-coords=",," value="Бердск">Бердск</option>   
            <option data-coords=",," value="Искитим">Искитим</option>   
            <option data-coords=",," value="Колывань">Колывань</option>
            <option id="select-region" value="0">Выбрать другой...</option> </select> 
<br>
<label>Категория</label> 
    <select title="Выберите категорию объявления" value="<?php echo $_SESSION['advt'][$key]['category_id'];?>" name="category_id" > 
        <option value="">-- Выберите категорию --</option>
            <optgroup label="Транспорт">
                <option value="9">Автомобили с пробегом</option>
                <option value="109">Новые автомобили</option>
                <option value="14">Мотоциклы и мототехника</option>
                <option value="81">Грузовики и спецтехника</option>
                <option value="11">Водный транспорт</option>
                <option value="10">Запчасти и аксессуары</option>
            </optgroup></select>
<br>
<label>Название объявления</label> <input type="text" maxlength="50" value="<?php echo $_SESSION['advt'][$key]['title'];?>" name="title">
<br>
<label>Описание объявления</label><input type="text" maxlength="3000" value="<?php echo $_SESSION['advt'][$key]['description'];?>" name="description">
<br>
<label>Цена</label> <input type="text" maxlength="9" value="<?php echo $_SESSION['advt'][$key]['price'];?>" name="price"><span>руб.</span>
<br><br>
<input type="submit" value="Сохранить изменения" id="form_submit" name="main_form_submit" class="vas-submit-input"> 
<br><br>
        
</form>
<?php
    
}

//добавленых объявления в массив ссесий
if ($_POST == TRUE){
    $_SESSION['advt'][]=$_POST;
} 

if ($_SESSION == TRUE){
    foreach ($_SESSION['advt'] as $key => $value){
        title($key); 
        echo "<br>";
    }
}  
echo "<br>";
//}


// раскрытие объявления или его удаление
if($_GET == TRUE){
    foreach ($_GET as $key => $value){
        if ($key == "id"){
            $id=$_GET['id'];
//            echo 'id='.$id.'<br>';
            //completed_form_advt($id);
            notation2($id);
        }if ($key == "id_del"){    
            $id_del=$_GET['id_del'];
            unset($_SESSION['advt'][$id_del]);
            unset($id_del);
        }    
    }    
}    
echo "<br>";


// ФУНКЦИЯ ВЫВОДА ОБЪЯВЛЕНИЯ

function completed_form_advt($key) {
    // foreach 
    echo 'Ваше Имя:'.$_SESSION['advt'][$key]['seller_name']."<br>";
    echo 'Электронная почта:'.$_SESSION['advt'][$key]['email']."<br>";
    echo 'Номер телефона:'.$_SESSION['advt'][$key]['phone']."<br>";
    echo 'Город:'.$_SESSION['advt'][$key]['location_id']."<br>";
    //echo 'Станция метро:'.$_SESSION['advt'][$key]['metro_id']."<br>";
    echo 'Категория:'.$_SESSION['advt'][$key]['category_id']."<br>";
    echo 'Название объявдения:'.$_SESSION['advt'][$key]['title']."<br>";
    echo 'Описание объявдения:'.$_SESSION['advt'][$key]['description']."<br>";
    echo 'Цена:  '.$_SESSION['advt'][$key]['price']." руб.<br>";
   
}

//вывод содержания объявления 
function title($x) {
    ?>
        <a href="index.php?id=<?php echo $x; ?>"><?php echo $_SESSION['advt'][$x]['title']; ?></a>
        <?php 
        echo '|  Цена:'.$_SESSION['advt'][$x]['price'].' руб.  |';
        echo  $_SESSION['advt'][$x]['seller_name'].'  |'; 
        ?>
        <a href="index.php?id_del=<?php echo $x; ?>">Удалить</a>
    <?php  
}


 