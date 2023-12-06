<?php
    include_once('connect.php');
    $hang='';
    $sql ="SELECT id_TheThao ,tenTheThao,hinhAnh,maTheThao,thethao.id_NoiDung,namRaDoi, noidung.tenNoiDung 
        FROM thethao INNER JOIN noidung on thethao.id_NoiDung = noidung.id_NoiDung";
    
    $result = $conn->query($sql);
    if($result){
        $listTheThao = $result->fetchAll(PDO::FETCH_ASSOC);
        if($listTheThao){
            // echo "<pre>";
            // print_r($listTheThao);
            // echo "</pre>";

            foreach($listTheThao as $key=>$item){
                //sử dụng .= để nối chuỗi
                $hang .= '
                    <tr>
                        <td>'.($key+1).'</td>
                        <td>'.$item["tenTheThao"].'</td>
                        <td>'.$item["maTheThao"].'</td>
                        <td>'.$item["tenNoiDung"].'</td>
                        <td><img src="uploads/'.$item["hinhAnh"].'" alt="" style="width:150px"></td>
                        <td>'.$item["namRaDoi"].'</td>
                        <td><button><a href="edit.php?id='.$item["id_TheThao"].'">Sửa</a></button></td>
                        <td><button><a onclick="return confirm(\'Bạn có chắc chắn muốn xóa\')" href="delete.php?id='.$item["id_TheThao"].'">Xóa</a></button></td>
                    </tr>
                ';
            }
        }
    }


?>

<button><a href="add.php">Thêm mới</a></button>

<table border>
    <thead>
        <th>STT</th>
        <th>Tên thể thao</th>
        <th>Mã thể thao</th>
        <th>Nội dung</th>
        <th>Hình ảnh</th>
        <th>Năm ra đời</th>
        <th></th>
    </thead>
    <tbody>
        <?= $hang;?>
    </tbody>
</table>