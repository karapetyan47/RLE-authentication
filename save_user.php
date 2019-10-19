<?php
    require_once 'rle.php';
    require_once 'encryption.php';
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
 if (empty($login) or empty($password)) 
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
   
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
 
    $login = trim($login);

    $password = RLE(trim($password));
    $password = transposition($password);
    $password = addCrc($password);

 
    include ("bd.php");
 
    $result = mysqli_query( $db, "SELECT id FROM regist.user WHERE login='$login'");
    $myrow = mysqli_fetch_array($result);
    if (!empty($myrow['id'])) {
    exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
    }
 
    $result2 = mysqli_query ( $db, "INSERT INTO user (login,password) VALUES('$login','$password')" );
    
    if ($result2=='TRUE')
    {
    echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт";
    }
 else {
    echo "Ошибка! Вы не зарегистрированы.";
    }
