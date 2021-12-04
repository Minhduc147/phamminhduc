<?php
    session_start();
?>

<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $username =$_POST['username'];
        $email =$_POST['email'];
        $password =$_POST['password'];
        $password=md5($password);
        $conn = mysqli_connect("localhost","root","","gk");
        mysqli_set_charset($conn,"utf8");
        $sql = "INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES (NULL, '$username', '$password', '$email')";
        $ketqua = mysqli_query($conn, $sql) ;
        header("location:dn.php");
    }
        
?>