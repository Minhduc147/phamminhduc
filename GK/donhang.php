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
        margin-left:20px;
        height: 200px;
        width: 1400px;
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
        <h2>Danh sách đơn hàng</h2>
            <table style="border: 2px solid black;">
                <tr style="border: 2px solid black;color:red;">
                    <td style="border: 2px solid black;">Đơn hàng</td>
                    <td style="border: 2px solid black;">ID User</td>
                    <td style="border: 2px solid black;">Thời gian đặt hàng</td>
                    <td style="border: 2px solid black;">Tên</td>
                    <td style="border: 2px solid black;">email</td>
                    <td style="border: 2px solid black;">Số điện thoại</td>
                    <td style="border: 2px solid black;">Địa chỉ</td>
                    <td style="border: 2px solid black;">Ghi chú</td>
                    <td style="border: 2px solid black;">Tổng</td>
                    <td style="border: 2px solid black;">Trạng thái</td>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost","root","","gk");
                    $sql = "SELECT * FROM donhang ";
                    $ketqua = mysqli_query($conn, $sql);  
                    while ($row = mysqli_fetch_array($ketqua)) {
                        echo "<tr style='border: 2px solid black;'>";
                        echo '<td style="border: 2px solid black;">'.$row['iddh'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['iduser'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['thoidiemdh'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['ten'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['email'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['sdt'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['diachi'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['ghichukh'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['tong'].'</td>';
                        echo '<td style="color:red;border: 2px solid black;">'.$row['trangthai'].'</td>';
                        
                        echo '<td>
                            <a  href ="xoadh.php?id='.$row['iddh'].'">
                                <div class="fa fa-trash"></div>___________________
                                <a  href ="suadh.php?id='.$row['iddh'].'">
                                <div class="fa fa-trash"></div>     
                            
                            </td>';
                        echo "</tr>";
                    }
                ?>
            </table>
            
    </section>
    <section class='py-5'>
        <h2>Đơn hàng chi tiết</h2>
            <table style="border: 2px solid black;">
                <tr style="border: 2px solid black;color:red;">
                    <td style="border: 2px solid black;">STT</td>
                    <td style="border: 2px solid black;">Mã đơn hàng</td>
                    <td style="border: 2px solid black;">ID User</td>
                    <td style="border: 2px solid black;">Mã sản phẩm</td>
                    <td style="border: 2px solid black;">Số lượng</td>
                    <td style="border: 2px solid black;">Giá</td>
                    <td style="border: 2px solid black;"></td>
                </tr>
                <?php
                    $conn = mysqli_connect("localhost","root","","gk");
                    $sql = "SELECT * FROM chitietdonhang ";
                    $ketqua = mysqli_query($conn, $sql);  
                    while ($row = mysqli_fetch_array($ketqua)) {
                        echo "<tr style='border: 2px solid black;'>";
                        echo '<td style="border: 2px solid black;">'.$row['id'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['iddh'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['iduser'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['idsp'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['soluong'].'</td>';
                        echo '<td style="border: 2px solid black;">'.$row['gia'].'</td>';
                        echo '<td>
                            <a  href ="xoactdh.php?id='.$row['id'].'">
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