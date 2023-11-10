<?php
    function checkSNT($number){
        for($i = 2; $i <= sqrt($number) ;$i++){
            if($number % $i ==0)
                return false;
        }
        return true;
    }
    // $arr= [1,2,3,4,5,6,7,8,9,10];

    // foreach($arr as $value){
    //    if(checkSNT($value)){
    //         echo $value."<br>";
    //    }
    // }

    # date
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date = date('Y-m-d H:i:s');
    echo $date;
    echo "<br>";
    //echo "<br>".time(); //1/1/1970
    $dateString = '2023-11-10 17:03:29';//lấy từ csdl
    // print_r($day);
    echo "<pre>";
    //echo $array_date['day'];
    $day = new DateTime($dateString);//trả về đối 1 tượng ngày
    //nên sử dụng date_create()
    $day2 = date_create($dateString);//trả về 1 đối tượng ngày

    // echo date_format($day,'d-m-Y');// trả về kiểu ngày - tháng -năm
    // echo date_format($day2,'H:i:s d-m-Y');// trả về kiểu h phút giây
    // ngày - tháng -năm


    echo "<br>";
    $array_date= date_parse($dateString);//trả về 1 array các thông tin ngày 
    //tháng năm ,...
    //print_r($array_date);

    $array_select =[
        "run" =>"chạy",
        "swim" => "bơi",
        "football" => "đá bóng",
        "fly" => "bar"
    ];//csdl
    $options ='';
    foreach($array_select as $key => $value){
        $options .= '<option value="'.$key.'">'.$value.'</option>';
    }
   // echo $options;

?>

    <form action="index.php" method="post">
        <label for="">UserName</label>
        <input type="text" name ="user">

        <label for="">Password</label>
        <input type="password" name ="pass">

        <select name="subject" id="">
            <option value="math">Toán</option>
            <option value="english">Tiếng Anh</option>
            <option value="code">PHP</option>
        </select>
        <select name="doing" id="">
            <?php
                echo $options;
            ?>
        </select>
        
        <input name="submit" type="submit" value="Gửi">
    </form>

<?php
    if(isset($_POST["submit"])){//isset để kiểm tra 1 biến có tồn tại hay k
        $username = $_POST["user"];
        echo $username.'<br>';
        $password = $_POST["pass"];
        echo $password.'<br>';
        $select = $_POST["subject"];
        echo $select;
    }
    



    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
?>