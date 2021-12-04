<?php 
    $i =$_GET['id'];
    $conn = mysqli_connect("localhost","root","","gk");
    $sql = "DELETE from user WHERE id='$i'";
    $ketqua = mysqli_query($conn, $sql);
    if($sql){
        header("location:nguoidung.php");
    }
?>