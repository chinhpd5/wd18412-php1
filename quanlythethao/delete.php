<?php
    include_once('connect.php');

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        // echo $id;
        if($id){
            $sql = "SELECT * FROM thethao WHERE id_TheThao = $id";
            $result = $conn->query($sql);
            if($result){
                $theThao = $result->fetch(PDO::FETCH_ASSOC);
                if($theThao){
                    $sql = "DELETE FROM thethao WHERE id_TheThao = ".$theThao["id_TheThao"];
                    $result =$conn->query($sql);
                    if($result){
                        header("Location: index.php");
                    }
                }
            }
        }
    }
?>