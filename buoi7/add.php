<?php
    
?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen"><br>

    <label for="">Khoa</label>
    <input type="text" name="khoa"><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" id=""><br>

    <label for="">Lớp</label>
    <select name="lopId " id="">
        <option value="1">PHP1</option>
    </select><br>

    <input type="submit" value="Gửi" name ="submit">

</form>