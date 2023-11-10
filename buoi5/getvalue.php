<?php
    if(isset($_POST["submit"])){//isset để kiểm tra 1 biến có tồn tại hay k
        $username = $_POST["user"];
        echo $username.'<br>';
        $password = $_POST["pass"];
        echo $password;
    }
?>