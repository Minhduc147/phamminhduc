<?php 
    $i =$_GET['id'];
    $conn = mysqli_connect("localhost","root","","gk");
    $sql = "DELETE from donhang WHERE id='$i'";
    $ketqua = mysqli_query($conn, $sql);
    if($sql){
        header("location:donhang.php");
    }
?>