<?php
    session_start();

    if(isset($_POST["submit"])){
        $userName = $_POST["username"];
        $password = $_POST["password"];

        if($userName == 'admin' && $password == '123456'){
            $_SESSION["username"] = $userName;
            header('Location: index.php');
        }else{
            echo "Sai tài khoản hoặc mật khẩu";
        }
    }
?>

<form action="login.php" method ="post">
    <label for="">UserName</label>
    <input type="text" name="username"><br>

    <label for="">Password</label>
    <input type="password" name="password"><br>

    <input type="submit" name="submit">
</form>