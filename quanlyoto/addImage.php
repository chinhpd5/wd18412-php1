<?php
    include_once('connect.php');
    $isCheck =true;
    $errImage ='';

    //khi người dùng gửi dữ liệu lên
    if(isset($_POST["submit"])){
        $image = $_FILES["hinhAnh"];
        // echo "<pre>";
        // print_r($image);
        //lấy tên hình ảnh
        $filename = $image["name"];

        //kiểm tra hình ảnh
        if($filename){
            //lấy ra đuôi của file
            $extension = pathinfo($filename,PATHINFO_EXTENSION);
            // echo $extension."<br>";
            $arrAllow = ['png','jpg','jpeg'];

            if(!in_array($extension,$arrAllow)){
               $errImage = "Cần nhập hình ảnh";
               $isCheck =false;
            }
        }else{
            $isCheck =false;
            $errImage = "Cần nhập hình ảnh";
        }

        //thêm vào cơ sở dữ liệu và server
        if($isCheck){
            //thêm vào thư uploads
            $dir ="uploads/".time().$filename;
            if(move_uploaded_file($image["tmp_name"],$dir)){
                $sql ="INSERT INTO image(hinhAnh) VALUES('$dir')";
                $result = $conn->query($sql);
                if($result){
                    echo "Thêm thành công";
                }else{
                    echo "Thêm Thất bại";
                }
            }
        }
    }

?>

<form action="addImage.php" method="post" enctype="multipart/form-data">
    <label for="">Hình ảnh</label>
    <input type="file" name="hinhAnh"> 
    <span style="color:red"><?= $errImage ?></span><br>

    <input type="submit" name="submit" value="Gửi">

</form>