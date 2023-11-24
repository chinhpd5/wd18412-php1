<?php
    include_once('connect.php');
    $tenLoaiXe="";
    $xuatXu ="";
    $idDanhMuc ='';
    $mauSac ='';

    $errMauSac ='';
    $errTenLoaiXe ='';
    $errXuatXu ='';  
    $errHinhAnh =''; 
    
    $isCheck =true;

    //khi người dùng submit

    if(isset($_POST["submit"])){
        // echo "<pre>";
        // print_r($_POST);

        $tenLoaiXe = trim($_POST["tenLoaiXe"]);
        $xuatXu = trim($_POST["xuatXu"]);
        $mauSac = $_POST["mauSac"];
        $idDanhMuc = $_POST["idDanhMuc"];
        $image = $_FILES["hinhAnh"];

        // print_r([$tenLoaiXe,$xuatXu,$mauSac,$idDanhMuc,$image]);
        //validate

        if($tenLoaiXe == ''){
            $errTenLoaiXe ="Cần nhập tên xe";
            $isCheck =false;
        }

        if($xuatXu == ''){
            $errXuatXu ="Cần nhập xuất xứ";
            $isCheck =false;
        }

        $filename = $image["name"];
        if($filename ==""){
            $errHinhAnh = "Cần nhập file";
            $isCheck = false;
        }else{
            //lấy đuôi hình ảnh
            $extension = pathinfo($filename, PATHINFO_EXTENSION);

            $arrAllow = ['png','jpg','jpeg'];

            if(!in_array($extension,$arrAllow)){
                $isCheck = false;
                $errHinhAnh ="Cần nhập hình ảnh";
            }
        }

        if($isCheck){
            // thêm vào cơ sở dữ liệu
            $filename = time().$filename;
            $uploads = 'uploads/'.$filename;

            if(move_uploaded_file($image["tmp_name"],$uploads)){
                $sql ="INSERT INTO xe(tenLoaiXe,xuatXu,	idDanhMuc,mauSac,hinhAnh)
                        VALUES ('$tenLoaiXe','$xuatXu','$idDanhMuc','$mauSac','$filename')";
                
                $result = $conn->query($sql);
                if($result){
                    header('Location: index.php');
                }else{
                    echo "lỗi khi thêm";
                }
            }

        }

    }

    


    


?>

<form action="add.php" method="post" enctype="multipart/form-data">
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
                        $options .= '<option '.($value["id"] == $idDanhMuc ? 'selected':'').' value="'.$value["id"].'">'.$value["tenHangXe"].'</option>';
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
    <img src="" alt="" id="preViewImg" style ="width:200px"> <br>

    <input type="submit" name="submit" value="Gửi">



</form>

<script>
    const input = document.getElementById('inputImg');
    const img = document.getElementById('preViewImg');

    input.addEventListener('change',function(event){
        const file = event.target.files[0];
        // console.log(file);

        //validate

        const name = file.name;

        const arr = name.split('.')
        const extension = arr[arr.length-1];

        const arrAllow = ['png','jpg','jpeg'];

        if(arrAllow.includes(extension)){
            img.src = URL.createObjectURL(file);
        }
    })


</script>