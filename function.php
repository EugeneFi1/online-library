<?php
    $link = mysqli_connect('localhost', 'root' ,'', 'library');
        
    $sql = 'SELECT * FROM users';
    $result = mysqli_query($link, $sql);
    $name = mysqli_fetch_all($result, 1);

    if(isset($_GET['login']) && isset($_GET['pass'])){
        addUser($link, $_GET['login'], $_GET['pass']);
        $id = getUserId($link, $_GET['login']);
    }
    if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['surname'])) {
        addReader($link, $_GET['id'], $_GET['name'], $_GET['surname']);
    }
    

    function addUser($link, $login, $pass) {
        $sql = "INSERT INTO `users`(`login`, `password`) VALUES ('".$login."','".$pass."')";
        $result = mysqli_query($link, $sql);
    }
    function getUserId($link, $login) {
        $sql = "SELECT id FROM users where login='".$login."'";
        $result = mysqli_query($link, $sql);
        return mysqli_fetch_all($result, 1);
    }
    function addReader($link, $id, $name, $surname) {
        $sql = "INSERT INTO `readers`(`id`, `name`, `surname`, `book_name`) VALUES ('".$id."','".$name."','".$surname."','')";
        $result = mysqli_query($link, $sql);
    }
?>   