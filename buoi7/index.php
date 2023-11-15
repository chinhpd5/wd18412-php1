<?php
    include_once("connect.php");
    //print_r($conn);
    $hang='';
    $sql = "SELECT sinhvien.id, hoVaTen,khoa,ngaySinh,lopId,lop.tenLop 
    FROM sinhvien INNER JOIN lop ON sinhvien.lopId = lop.id";

    $result = $conn->query($sql);

    if($result){
        //gán danh sách sinh viên vào biến
        //trả về 1 array danh sách
        $listSinhVien = $result->fetchAll(PDO::FETCH_ASSOC);

        if($listSinhVien){
            echo "<pre>";
            print_r($listSinhVien);

            foreach($listSinhVien as $key => $item){
                $hang .= '
                <tr>
                    <td>'.($key+1).'</td>
                    <td>'.$item["hoVaTen"].'</td>
                    <td>'.$item["khoa"].'</td>
                    <td>'.$item["ngaySinh"].'</td>
                    <td>'.$item["tenLop"].'</td>
                </tr>';
            }
        }
    }
?>

<table border>
    <thead>
        <th>STT</th>
        <th>Họ và tên</th>
        <th>Khoa</th>
        <th>Ngày sinh</th>
        <th>Tên lớp</th>
    </thead>
    <tbody>
        <?= $hang ?>
    </tbody>
</table>
