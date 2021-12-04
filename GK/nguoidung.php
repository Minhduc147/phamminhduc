<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bán Sách</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<style>
    td{
        text-align:center;
        height:20px;
        width: 70px;
        border: 1px solid red;
        
        }
    a{
        text-decoration: none;
        
    }
    table{
        margin-left:70px;
        height: 100px;
        width: 1300px;
    }
    h2{
        text-align:center;
    }
</style>
<body>

    <?php
    include('menuad.php');
    ?>

    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Bán Sách</h1>
                <h4 class="display-8 fw-bolder">Online</h4>
            </div>
        </div>
    </header>
    
    <section class='py-5'>
        <h2>Danh sách người dùng</h2>
            <table style="border: 2px solid black;">
                <tr>
                    <td style='border: 2px solid black;'>STT</td>
                    <td style='border: 2px solid black;'>Tên tài khoản </td>
                    <td style='border: 2px solid black;'>email</td>
                    <td style='border: 2px solid black;'>mật khẩu</td>
                    <td style='border: 2px solid black;'>quyền</td>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost","root","","gk");
                    $sql = "SELECT * FROM user ";
                    $ketqua = mysqli_query($conn, $sql);  
                    while ($row = mysqli_fetch_array($ketqua)) {
                        echo "<tr style='border: 2px solid black;'>";
                        echo '<td >'.$row['id'].'</td>';
                        echo '<td>'.$row['username'].'</td>';
                        echo '<td>'.$row['email'].'</td>';
                        echo '<td>'.$row['password'].'</td>';
                        echo '<td>'.$row['level'].'</td>';
                        echo '<td>
                            <a  href ="xoauser.php?id='.$row['id'].'">
                                <div class="fa fa-trash"></div>    
                            
                            
                            </td>';
                        echo "</tr>";
                    }
                ?>
            </table>
            
    </section>
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"> Your Website 2021</p>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <script src="js/scripts.js"></script>
</body>

</html>