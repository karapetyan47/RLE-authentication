<?php

    session_start();/
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
//
    $login = trim($login);
    
    $password = RLE(trim($password));
    $password = transposition($password);
    $password = addCrc($password);

// 
    include ("bd.php");// 
 
$result = mysqli_query($db,"SELECT * FROM user WHERE login='$login'"); //
    $myrow = mysqli_fetch_array($result);
    if (empty($myrow['password']))
    {
    //
    exit ("Извините, введённый вами login или пароль неверный.");
    }
    else {
    //
    if ($myrow['password']==$password) {
    //
    $_SESSION['login']=$myrow['login']; 
    $_SESSION['id']=$myrow['id'];//
    echo "Вы успешно вошли на сайт! <a href='index.php'>Главная страница</a>";
    }
 else {
    //е

    exit ("Извините, введённый вами login или пароль неверный.");
    }
    }
    ?>