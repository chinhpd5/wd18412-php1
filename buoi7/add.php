<?php
    require_once("connect.php");
    $hoVaTen='';
    $khoa ='';
    $ngaySinh ='';
    $lopId ='';

    $errHoVaTen ='';
    $errKhoa ='';
    $errNgaySinh ='';
    $errLopId ='';

    $sql = "SELECT * FROM lop";// viết ra 1 câu sql lấy danh sách lớp
    $result = $conn->query($sql);//thực hiện câu sql
    $option="";
    if($result){//kiểm tra có thành công hay không
        $listLop = $result->fetchAll(PDO::FETCH_ASSOC);//gán gt vào 1 biến
        if($listLop){
            //echo "<pre>";
            // print_r($listLop);
            foreach($listLop as $item){
                // print_r($item);
                $option .= '<option value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }

        }
    }
    //echo htmlspecialchars($option)

    if(isset($_POST["submit"])){
        $hoVaTen = $_POST["hoVaTen"];
        $khoa
        $ngaySinh
        $lopId
    }


?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen">
    <span style="color:red"><?= $errHoVaTen; ?></span><br>

    <label for="">Khoa</label>
    <input type="text" name="khoa">
    <span style="color:red"><?= $errKhoa; ?></span><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" id="">
    <span style="color:red"><?= $errNgaySinh; ?></span><br>

    <label for="">Lớp</label>
    <select name="lopId " id="">
        <?php echo $option;?>
    </select><br>

    <input type="submit" value="Gửi" name ="submit">

</form>