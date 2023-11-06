<?php
    # Array (Tiếp)
    // tự định nghĩa key cho các value
    $arr = [
        "name" => "Phí Đức Chính",
        "khoa" => "CNTT",
        "Sex" => "Nam"
    ];
    echo "<pre>";
    print_r($arr);
    echo "</pre>";

    echo $arr["khoa"];
    echo "<br>";

    // Mảng đa chiều
    $arr1 =[
        "a1"=>[1,2,3,4],
        "a2"=>[5,6,7,8],
        "a3"=>[9,10,11,12]
    ];
    echo "<pre>";
    print_r($arr1);
    echo "</pre>";
    echo $arr1["a3"][0];
    echo "<br>";

    # Hằng số - Const
    //c1
    const PI = 3.14;
    
    //echo PI;
    //c2
    define('NUMBER', [1,2,3]);
    //print_r(NUMBER);

    $check = 100;
    //Kiểm tra chẵn lẻ sử dụng if ... else

    if($check % 3 == 0){
        echo "Số chia hết cho 3";
    }else if($check % 3 == 1){
        echo "Dư 1";
    }else{
        echo "Dư 2";
    }

    
/*
    0 - 15: thiếu nhi
    15 - 23: thiếu niên
    23 - 40: thanh niên
    40-60: trung niên
    60: người già

    C1: sử dụng câu điều kiện có kết hợp && hoặc || /// 7
    C2: Không được sử dụng biểu thức điều kiện có kết hợp  ///10

*/
    $age = 15;
    if($age<0){
        echo "Sai tuổi";
    }else{
        if($age > 0 && $age <= 15){
            echo "thiếu nhi";
        }else if($age >15 && $age <=23){
            echo "thiếu niên";
        }else if($age >23 && $age <=40){
            echo "thanh niên";
        }else if($age >40 && $age <=60){
            echo "trung niên";
        }else{
            echo "người già";
        }
    }

    // c2
    $age = 30;
    if($age > 60){
        echo "người già";
    }else if($age >40){
        echo "trung niên";
    }else if($age > 23)
        echo "thanh niên";
    else if($age >15)
        echo "thiếu niên";
    else
        echo "thiếu nhi";


    // switch - case:

    echo "<br>";
    $thu = 5;
    switch($thu){
        case 2:
            echo "thứ 2";
            break;
        case 3:
            echo "thứ 3";
            break;
        case 4:
            echo "thứ 4";
            break;
        case 5:
            echo " thứ 5";
            break;
        case 6: 
            echo "thứ 6";
            break;
        default:
            echo "cuối tuần";
        
    }
    
    


    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";



?>