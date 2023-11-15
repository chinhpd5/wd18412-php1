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
    $isCheck = true;

    $sql = "SELECT * FROM lop";// viết ra 1 câu sql lấy danh sách lớp
    $result = $conn->query($sql);//thực hiện câu sql
    $option="";
    

    if(isset($_POST["submit"])){
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];
        // echo "<pre>";
        // print_r([$hoVaTen,$khoa,$ngaySinh,$lopId]);
        
        //Kiểm tra dữ liệu
        if(empty($hoVaTen)){
            $errHoVaTen ="Người dùng nhập họ và tên";
            $isCheck= false;
        }
        if(empty($khoa)){
            $isCheck= false;
            $errKhoa ="Người dùng nhập khoa";
        }
        if(empty($ngaySinh)){
            $isCheck= false;
            $errNgaySinh ="Người dùng nhập ngày sinh";
        }

        if($isCheck){
            $sql = "INSERT INTO sinhvien(hoVaTen,khoa,ngaySinh,lopId) 
                    VALUES ('$hoVaTen','$khoa','$ngaySinh',$lopId)";

            $result = $conn->query($sql);

            if($result){
                // echo "Thêm thành công";
                header("Location: index.php");
            }else{
                echo "Thêm thất bại";
            }



        }

    }

    if($result){//kiểm tra có thành công hay không
        $listLop = $result->fetchAll(PDO::FETCH_ASSOC);//gán gt vào 1 biến
        if($listLop){
            //echo "<pre>";
            // print_r($listLop);
            foreach($listLop as $item){
                // print_r($item);
                $option .= '<option '.($item["id"] == $lopId ? "selected":"").' value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }

        }
    }
   // echo htmlspecialchars($option);

?>

<form action="add.php" method="post">
    <label for="">Họ và tên</label>
    <input type="text" name="hoVaTen" value="<?= $hoVaTen?>">
    <span style="color:red"><?= $errHoVaTen; ?></span><br>

    <label for="">Khoa</label>
    <input type="text" name="khoa" value ="<?= $khoa?>">
    <span style="color:red"><?= $errKhoa; ?></span><br>

    <label for="">Ngày sinh</label>
    <input type="date" name="ngaySinh" id="" value="<?= $ngaySinh?>">
    <span style="color:red"><?= $errNgaySinh; ?></span><br>

    <label for="">Lớp</label>
    <select name="lopId" id="">
        <?php echo $option;?>
    </select><br>

    <input type="submit" value="Gửi" name ="submit">

</form>