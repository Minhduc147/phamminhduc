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
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
<style>
    table{
        width:200px;
        height: 350px;
        border: 1px solid black;
        margin-left:50px;
        margin-top:50px;
        margin-bottom:50px;
    }
</style>
<body>

    <?php
    include('menu.php');
    ?>

    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Bán Sách</h1>
                <h4 class="display-8 fw-bolder">Online</h4>
            </div>
        </div>
    </header>
<div style="display:flex;">
    <table>
        <tr >
            
            <td style="border: 1px solid black;">
            <img style="width:50px;height:50px;" src="https://i.pinimg.com/originals/34/13/2a/34132a415d5cd8486929ad5762612976.png" alt="">
            <a style="text-decoration: none;margin-left:20px;color:rgba(92, 122, 255, 0.89);" href="home.php">Danh mục </a>
            </td>
        </tr>
        
        <?php
        $conn1 = mysqli_connect("localhost","root","","gk");
        $sql1 = "SELECT * FROM danhmuc ";
        $ketqua1 = mysqli_query($conn1, $sql1);
        while ($row = mysqli_fetch_array($ketqua1)) {
            echo "<tr>
            <td style='border: 1px solid black;'>
            <a style='text-decoration: none;margin-left:20px;color:rgba(92, 122, 255, 0.89);' href ='home1.php?danhmuc=$row[id]'>$row[tendanhmuc]</a>
            </td>
            </tr>";
        }
        ?>
    </table>
    <section class='py-5'>
        <div class='container px-4 px-lg-5 mt-5'>
            <div class='row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 '>
                <?php
                    if(isset($_GET['s'])){
                        $s =$_GET['s'];
                    $conn = mysqli_connect("localhost","root","","gk");
                    $sql="SELECT *FROM sp WHERE tensp LIKE '%$s%'";
                    echo "<table>";
                    $ketqua = mysqli_query($conn,$sql);
                        while ($row = mysqli_fetch_array($ketqua))  {
                            echo "<div class='col-md-4 mb-5'>
                                    <div class='card h-100'>
                                        
                                        <img class='card-img-top' src=" . $row['img'] . " />
                                                <div class='card-body p-4'>
                                                    <div class='text-center'>
                                                        <h5 class='fw-bolder'><a style='text-decoration: none;' href ='binhluan1.php?id=$row[id]'>$row[tensp]</a></h5>
                                                        <h6 class='fw-bolder'>$row[gia] $</h6>
                                                        <p class='fw-bolder'>$row[mota]</p>
                                                    </div>
                                                </div>
                                            <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                            <div class='text-center'> <a style='text-decoration: none;font-size:25px; color: black; ' 
                                            href='addcart.php?item=$row[id]'><i class='fa fa-shopping-cart' aria-hidden='true'></i></a>
                                            </div>
                                    </div>
                                        </div>
                                    </div>";
                        }
                    }
                ?>
            </div>
        </div>
    </section>
</div>  
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <script src="js/scripts.js"></script>
</body>

</html>


