<?php
    require_once("connect.php");
    //thêm mới
    $id ='';

    $tenLoaiXe="";
    $xuatXu ="";
    $idDanhMuc ='';
    $mauSac ='';
    //thêm mới
    $hinhAnh ='';

    $errMauSac ='';
    $errTenLoaiXe ='';
    $errXuatXu ='';  
    $errHinhAnh =''; 
    
    $isCheck =true;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        
        if($id){
            $sql = "SELECT * FROM xe WHERE id = $id";
            $result = $conn->query($sql);
            if($result){
                $xe = $result->fetch(PDO::FETCH_ASSOC);
                if($xe){
                    // echo "<pre>";
                    // print_r($xe);
                    // echo "</pre>";
                    $id = $xe["id"];
                    $tenLoaiXe=$xe["tenLoaiXe"];
                    $xuatXu =$xe["xuatXu"];
                    $idDanhMuc =$xe["idDanhMuc"];
                    $mauSac =$xe["mauSac"];
                    $hinhAnh = $xe["hinhAnh"];
                    // echo $hinhAnh;
                }
            }
        }
    }

    if(isset($_POST["submit"])){
        $id = $_POST["id"];
        $tenLoaiXe=$_POST["tenLoaiXe"];
        $xuatXu =$_POST["xuatXu"];
        $idDanhMuc =$_POST["idDanhMuc"];
        $mauSac =$_POST["mauSac"];
        $hinhAnh =$_FILES["hinhAnh"];
        // print_r($hinhAnh);
        if($isCheck){
            $filename = $hinhAnh["name"];
            $sql ='';
            if($filename){
                $filename = time().$filename;
                $dir = 'uploads/'.$filename;
                if(move_uploaded_file($hinhAnh["tmp_name"],$dir)){
                    $sql = "UPDATE xe
                            SET tenLoaiXe = '$tenLoaiXe', xuatXu = '$xuatXu', idDanhMuc = '$idDanhMuc',
                            mauSac ='$mauSac', hinhAnh ='$filename' 
                            WHERE id = '$id' ";
                }
                
            }else{
                // nếu k gửi ảnh
                $sql = "UPDATE xe
                SET tenLoaiXe = '$tenLoaiXe', xuatXu = '$xuatXu', idDanhMuc = '$idDanhMuc',
                mauSac ='$mauSac' 
                WHERE id = '$id' ";
            }

            $result = $conn->query($sql);
            if($result){
                header('Location: index.php');
            }
            
        }


    }

?>

<form action="edit.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name ="id" value="<?= $id ?>">
    <label for="">Tên xe</label>
    <input type="text" name ="tenLoaiXe" value="<?= $tenLoaiXe ?>">
    <span style ="color:red"><?= $errTenLoaiXe ?></span> <br>

    <label for="">Xuất xứ</label>
    <input type="text" name ="xuatXu" value="<?= $xuatXu ?>">
    <span style ="color:red"><?= $errXuatXu ?></span> <br>

    <label for="">Danh mục</label>
    <select name="idDanhMuc" id="">
        <?php
            //lấy dữ liệu danh mục và đổ vào select

            $sql = "SELECT * FROM danhmuc";
            $options ='';
            $result= $conn->query($sql);
            if($result){
                $listDanhMuc = $result->fetchAll(PDO::FETCH_ASSOC);
                if($listDanhMuc){
                    // echo "<pre>";
                    // print_r($listDanhMuc);
                    foreach($listDanhMuc as $value){
                        $options .= '<option '.($value["id"] == $idDanhMuc ? 'selected': '' ).' value="'.$value["id"].'">'.$value["tenHangXe"].'</option>';
                    }
                }
                // echo htmlspecialchars($options);
            }
            
            echo $options;
        ?>
    </select> <br>

    <label for="">Màu sắc</label>
    <input type="color" name ="mauSac" value="<?= $mauSac ?>"> <br>

    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh" id="inputImg">
    <span style ="color:red"><?= $errHinhAnh ?></span> <br>
    <img src="uploads/<?= $hinhAnh ?>" alt="" style="width:150px"> <br>

    <input type="submit" name="submit" value="Gửi">



</form>