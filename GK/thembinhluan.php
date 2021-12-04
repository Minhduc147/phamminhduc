<?php
    $noidung =$_POST['noidung'];
    $username =$_POST['username'];
    $idsp =$_POST['idsp'];
    $date=$_POST['date'];
    $conn1 = mysqli_connect("localhost", "root", "", "gk");
    $sql1="INSERT INTO `binh` (`id`, `idsp`, `user`, `noidung`, `date`) VALUES (NULL, '$idsp', '$username', '$noidung', '$date')";
    $ketqua1= mysqli_query($conn1,$sql1);
?>