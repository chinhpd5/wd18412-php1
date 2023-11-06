<?php

    # Comment

    //echo "hello world <br>";

    /*
        echo "dòng 2"
        đây cũng là comment
    */


    # Hiển thị

    //echo
    echo "WD18412 <br>"; // thẻ <br> để xuống dòng
    //print
    print "xin chào <br>";

    # Cách khai báo biến

    $bien;
    $bien ="abc";
    $_bien2 =10;
    echo $bien.'<br>';// sử dụng dấu chấm để nối chuỗi với dấu nháy đơn
    //echo 'Biến 2: $_bien2 <br>'; //không sử dụng biến trong dấu nháy đơn
    echo "Biến 2: $_bien2 <br>";

    #Kiểu dữ liệu

    #Int - Số nguyên

    $soNguyen = -123243;
    $a = -100;

    echo $soNguyen.'<br>';

    //var_dump($soNguyen);

    var_dump(is_int($soNguyen)); //hoặc is_integer() 
    echo '<br>';


    # số thực -Float

    $soThuc = 1.2345;
    echo $soThuc."<br>";
    //var_dump($soThuc);
    is_float($soThuc);



    #Boolean
    // true- false
    $check = false;
    //var_dump($check);


    # string
    $chuoi = 'chuỗi bằng dấu nháy đơn \' '.$soNguyen.'<br>';// dùng dẫu chấm để nối chuỗi
    $chuoi2 = "chuỗi bằng dấu nháy kép \" $soNguyen <br>";// có thể sử dụng biến trong nháy kép
    echo $chuoi;
    echo $chuoi2;
    //echo strlen($chuoi); //lấy độ dài của chuỗi
    $newString = str_replace('bằng','=',$chuoi); // thay thế
    //echo $newString;
    echo $chuoi[2];

?>