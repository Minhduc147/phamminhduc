<?php
    session_start();
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
     $ten =$_POST['ten'];
     $email =$_POST['email'];
     $sdt =$_POST['sdt'];
     $diachi =$_POST['diachi'];
     $ghichu =$_POST['ghichukh'];
     //$tensp =$_POST['tensp'];
     $gia =$_POST['gia'];
     $tong =$_POST['tong'];
     $time= date("F j, Y, H:i:s");
     $date = new DateTime($time,new DateTimeZone('GMT'));
     $date->setTimezone(new DateTimeZone('Etc/GMT-5'));
     $date=$date->format('Y-m-d H:i:s');
}
?>

<?php

     
     $conn = mysqli_connect("localhost","root","","gk");
     $iduser=$_SESSION['id'];
     $sql="INSERT INTO `donhang`(`iduser`, `thoidiemdh`, `ten`, `email`, `sdt`, `diachi`, `ghichukh`, `tong`, `trangthai`) 
     VALUES ('$iduser','$date','$ten','$email','$sdt','$diachi','$ghichu','$tong','Products are being prepared')";
     $ketqua = mysqli_query($conn, $sql);
     $id=mysqli_insert_id($conn);

     foreach($_SESSION['cart'] as $key=>$value) 
     { 
          $sql="INSERT INTO `chitietdonhang`(`iddh`, `iduser`, `idsp`, `soluong`, `gia`) 
          VALUES ('$id','$iduser','$key','$value','$gia')";
          mysqli_query($conn,$sql);
         
     }
     if ($sql) {
          
          header("location:home.php");
     }

?>