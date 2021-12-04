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
    <title>bán sách</title>
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
                <h1 class="display-4 fw-bolder">bán sách</h1>
                <h4 class="display-8 fw-bolder">Online</h4>
            </div>
        </div>
    </header>
    
    <section class='py-5'>
        <h2>Danh sách danh mục</h2>
            <table style="border: 2px solid black;">
                <tr>
                    <td style='border: 2px solid black;'>STT</td>
                    <td style='border: 2px solid black;'>Icon </td>
                    <td style='border: 2px solid black;'>Tên danh mục </td>
                    <td style='border: 2px solid black;'>Số lượng</td>
                    <td style='border: 2px solid black;'>Hành động </td>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost","root","","gk");
                    $sql = "SELECT * FROM danhmuc ";
                    $ketqua = mysqli_query($conn, $sql);  
                    while ($row = mysqli_fetch_array($ketqua)) {
                        echo "<tr style='border: 2px solid black;'>";
                        echo '<td style="border: 2px solid black;" >'.$row['id'].'</td>';
                        echo "<td ><img style='width:50px;height:50px;' src=" . $row['anh'] . " /></td>";
                        echo '<td style="border: 2px solid black;" >'.$row['tendanhmuc'].'</td>';
                        echo '<td style="border: 2px solid black;" >'.$row['soluong'].'</td>';
                        echo '<td>
                            <a  href ="xoadm.php?id='.$row['id'].'">
                                <div class="fa fa-trash"></div>______
                            <a  href ="suadm.php?id='.$row['id'].'">
                                <div class="fa fa-edit"></div>   
                            
                            
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