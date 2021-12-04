<?php
    session_start();
?>

<?php
        
   //if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $u =$_POST['username'];
        $password =md5($_POST['password']);

        $conn = mysqli_connect("localhost","root","","gk");
        $sql = "SELECT * FROM  user where username = '$u' AND password ='$password'";
        $ketqua = mysqli_query($conn, $sql); 
        if (mysqli_num_rows($ketqua) >0) {
            $row= mysqli_fetch_array($ketqua);
            $_SESSION['username']=$row['username'];
            $_SESSION['id']=$row['id'];
            if ($row['level']==1) {
                $_SESSION['username']=$row['username'];
                header("location:index.php");
            } 
            else{
                header("location:home.php");
            }
            
             
        }
        else echo "error";
    //}
    
?>