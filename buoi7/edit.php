<?php
    include_once('./connect.php');
    $id='';
    $hoVaTen='';
    $khoa ='';
    $ngaySinh ='';
    $lopId ='';

    $errHoVaTen ='';
    $errKhoa ='';
    $errNgaySinh ='';
    $errLopId ='';
    $isCheck = true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($id){
            $sql = "SELECT * FROM sinhvien WHERE id = $id";
            try {
                $result = $conn->query($sql);
                if($result){
                    $sinhVien = $result->fetch(PDO::FETCH_ASSOC);
                    if($sinhVien){
                        // echo "<pre>";
                        // print_r($sinhVien);
                        $id = $sinhVien["id"];
                        $hoVaTen = $sinhVien["hoVaTen"];
                        $khoa = $sinhVien["khoa"];
                        $ngaySinh = $sinhVien["ngaySinh"];
                        $lopId = $sinhVien["lopId"];
                    }
                }
            } catch (\Throwable $th) {
                echo "Không tìm thấy sinh viên";
                die();
            }
        }
    }

    if(isset($_POST["submit"])){
        $id =$_POST["id"];
        $hoVaTen = trim($_POST["hoVaTen"]);
        $khoa = trim($_POST["khoa"]);
        $ngaySinh = $_POST["ngaySinh"];
        $lopId = $_POST["lopId"];

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
        // echo "<pre>";
        // print_r([$id,$hoVaTen,$khoa,$ngaySinh,$lopId]);
        if($isCheck){
            $sql ="UPDATE sinhvien 
            SET hoVaTen ='$hoVaTen', khoa = '$khoa', ngaySinh ='$ngaySinh', lopId ='$lopId'
            WHERE id = $id";

            $result = $conn->query($sql);
            if($result){
                header('Location: index.php');
            }else{
                echo "Có lỗi khi thêm";
            }
        }
    }


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
                $option .= '<option '.($item["id"] == $lopId ? "selected":"").' 
                value="'.$item["id"].'">'.$item["tenLop"].'</option>';
            }

        }
    }

    

?>

<form action="edit.php" method="post">
    <input type="hidden" name="id" value="<?= $id; ?>">

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