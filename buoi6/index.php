<form action="index.php" method ="post">
    <label for="">Môn học</label> <br>
    <input type="checkbox" name="subject[]" value="toan" id="" checked>Toán <br>
    <input type="checkbox" name="subject[]" value="van" id="">Văn <br>
    <input type="checkbox" name="subject[]" value="anh" id="" checked>Anh <br>

    <label for="">Hoạt động</label> <br>

    <input type="radio" name="action" value="run" id="" checked> Chạy<br>
    <input type="radio" name="action" value="swim" id=""> Bơi<br>
    <input type="radio" name="action" value="do" id=""> Làm việc<br>

    <textarea name="note" id="" cols="30" rows="10"></textarea>

    <input type="submit" name="submit">
</form>

<?php
    if(isset($_POST["submit"])){
        $subject = $_POST["subject"];
        print_r($subject);//do checkbox có thể chọn nhiều
        //sử dụng vòng lặp foreach để in ra các gt khi người dùng
        //lựa chọn môn học
        echo "<br>";
        // foreach($subject as $value){
        //     echo $value."<br>";
        // }

        $act = $_POST["action"];
        echo $act."<br>";
    
        $note = $_POST["note"];
        echo $note;
    }
?>