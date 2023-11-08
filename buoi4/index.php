<?php
    # while
    $a = 1;
    while($a <= 10){ //nếu thỏa mãn điều kiện
        // thực hiện đoạn code trong ngoặc
        echo $a.'<br>';
        //phải có sự tăng của biến kiểm tra
        $a++;
    }


    # do... while
    $tong = 0;
    $i = 1;
    do{
        $tong += $i; //$tong= $tong + $i //3
        $i++;
    }while($i <= 10);// nếu thoải mãn điều kiện thì sẽ quay trở về do
    echo "Tổng: $tong <br>";

    # For

    $arr = [1,2,3,4,5,6];
    $tich = 1;
    $tongChan = 0;
    $tongLe = 0;
    for($i=0;$i<count($arr);$i++){
        //tính tích các phần tử
        $tich = $tich * $arr[$i];// $tich *= $arr[$i];

        //tính tổng các phần tử chẵn
        if($arr[$i] % 2 ==0){
            $tongChan += $arr[$i];
        }
        //tính tổng các phần tử lẻ
        else{
            $tongLe += $arr[$i];
        }

    }

    echo "tích: $tich <br>";
    echo "tổng chẵn: $tongChan <br>";
    echo "tổng lẻ: $tongLe <br>";


    $array1 = [
        "name" => "Phí Đức Chính",
        "age" => 20,
        "khoa" => "Công nghệ thông tin",
        "gt" => true,
        "result" => [6,7.5,8.5,9]
    ];
    $thongTin = 'Họ và tên: ' .$array1['name'].'<br> Tuổi: '.$array1['age'];
    $tong=0;
    foreach($array1["result"] as $value){// sử dụng foreach để tích tổng
        echo $value.'<br>';
        $tong+= $value;
    }
    echo $thongTin."<br> Tổng điểm= $tong";
    /*
    foreach($tenArray as $key => $value){
        // $tenArray tên biến array mà chúng ta cần lặp
        // $key các key của từng phần tử trong array
        // $value là giá trị của các phần tử
        // key và value sẽ sẽ đi theo từng cặp
    }
    */

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';

?>