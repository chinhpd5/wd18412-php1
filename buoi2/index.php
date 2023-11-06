<?php
    /*
        Toán tử:
        1. Toán tử số học: +,-,*,/,**,%,...
        2. Toán tử so sánh: >, <, ==,!=, >= ,<=, ===,...
        3. Toán tử gán: =, +=, -=,....
        4. Toán tử logic: && , ||, !

    */

    #So sánh giá trị và kiểu dữ liệu
    var_dump(1 === '1');// false 
    echo "<br>";
    #Toán tử 3 ngôi

    $check = false;

    $result = $check == true ? "Đúng" : "Sai";

    // if($check== true){
    //     $result = "Đúng";
    // }else{
    //     $result ="Sai";
    // }

    echo $result;
    echo "<br>";
        //lấy giá trị của biến $a gán cho tên biến của $$a
    $b = "abc";
    $$b ="đẹp trai";

    echo $abc.'<br>';

    # Ép kiểu

    $a = '123';
    $b = (int) $a; // ép về kiểu số nguyên
    var_dump($b); // kiểu tra kiểu dữ liệu
    echo "<br>";
    $c= (float) $a ;// kiểu về kiểu số thực

    $d= (boolean) $a;// ép về kiểu bool

    $f= (string) $d; //ép về kiểu chuỗi

    

    #Array

    $arr = array(1,2,3,4);
    $arr1 = ['a','b','c','d']; // nên sử dụng các này
    

    //echo $arr1[2];

    //Thêm phần tử vào mảng
    $arr1[] = 'e';
    array_push($arr1,'f'); // có thêm 1 phần tử vào cuối mảng
    array_push($arr1,'g','h'); // có thể thêm nhiều phần tử vào cuối mảng
    array_unshift($arr1,'0'); // thêm 1 phần tử vào đầu mảng
    array_splice($arr1,0,0,"chính"); // thêm phần tử "chính" vào sau vị trí số 3
    

    // Xóa phần tử trong mảng
    unset($arr1[1]);// xóa đi phần tử ở vị trí chỉ định
    array_pop($arr1); // xóa đi phần tử cuối cùng
    array_shift($arr1);// xóa đi phần tử đầu tiên
    $start =1;
    $length= 2;
    array_splice($arr1,$start,$length,'w'); // xóa đi phần tử ở vị trí start và xóa đi length phần tử
    // tìm hiểu array_slice()


    echo "<pre>";
    print_r($arr1);
    echo "</pre>";

?>