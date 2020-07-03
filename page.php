<?php

    $link = mysqli_connect('localhost', 'root' ,'', 'library');
    if(isset($_GET['login'])){
        $id = getUserId($link, $_GET['login']);
    }
    function getUserId($link, $login) {
        $sql = "SELECT id FROM users where login='".$login."'";
        $result = mysqli_query($link, $sql);
        return mysqli_fetch_all($result, 1);
    }
?>
<div>
    <div>Login:</div>
    <?php
        echo ('<h1>'.$_GET['login'].'</h1>');
    ?>
    <div>Name:</div>
    <input type="text" id="name">
    <div>Surname:</div>
    <input type="text" id="surname"></br>
    <?php
        echo "<input type='button' value='save' onclick='saveReader(".$id[0]['id'].")'>";
    ?>
</div>
<script>
    function saveReader(i) {
        var id = i;
        var name = $('#name').val();
        var surname = $('#surname').val();

        $.ajax({
        url: 'function.php',
        type: 'GET',
        data: { 'id': id, 'name': name, 'surname': surname},
        dataType: 'html',
        cache: false,       
        success: function(data) {
            $(".main").load("reader_page.php");
        }
    });
    }
</script>        