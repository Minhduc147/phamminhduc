<?php
session_start();
if(isset($_POST['submit']))
{
    foreach($_POST['qty'] as $key=>$value)
    {
        if( ($value == 0) and (is_numeric($value)))
        {
            unset ($_SESSION['cart'][$key]);
        }
        else if(($value > 0) and (is_numeric($value)))
        {
            $_SESSION['cart'][$key]=$value;
        }
 }
 header("location:cart.php");
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <title>Bán Sách</title>
    <link href="st.css">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
</head>
    <body>
    <?php
    include('menu.php');
    ?>

        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Bán Sách</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Online</p>
                </div>
            </div>
        </header>
        <div class="container mb-4">
            <div class="row">
                <div class="col-12">
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col"> </th>
                                    <th scope="col">Sản phẩm</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col" class="text-center">Số lượng</th>
                                    <th scope="col" class="text-right">Giá</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <?php
                                $ok=1;
                                if(isset($_SESSION['cart']))
                                {
                                    foreach($_SESSION['cart'] as $k => $v)
                                {
                                        if(isset($k)){
                                            $ok=2;
                                        }
                                }
                                }
                                if($ok == 2){
                                    echo "<form action='cart.php' method='post'>";
                                    foreach($_SESSION['cart'] as $key=>$value) {
                                        $item[]=$key;
                                    }
                                    $str=implode(",",$item);
                                    $connect=mysqli_connect("localhost","root","","gk");
                                    $sql="select * from sp where id in ($str)";
                                    $query=mysqli_query($connect,$sql);
                                    $total= 0;
                                    while($row=mysqli_fetch_array($query)){
                                        echo"<tbody>
                                        <tr>
                                            <td><img style='height: 150px;width: 200px;' src=".$row['img']." /> </td>
                                            <td><h3>$row[tensp]</h3></td>
                                            <td>In stock</td>
                                            <td>Số lượng: <input class='form-control' type='text'
                                            name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'></td>
                                            <td class='text-right'>".number_format($row['gia'])."
                                            $<br /></td>
                                            <td class='text-right'><button class='btn btn-sm btn-danger'><i class='fa fa-trash'>
                                            <a href='delcart.php?id=$row[id]'>Xóa</a></i> </button> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Sub-Total</td>
                                            <td class='text-right'>".number_format($_SESSION['cart'][$row['id']]*$row['gia'])."$</td>
                                        </tr>
                                        $total+=$_SESSION[cart][$row[id]]*$row[gia];
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Total</strong></td>
                                            <td class='text-right'><strong>".
                                            number_format($total)." $</strong></td>
                                        </tr>
                                    </tbody>";            
                                    }


                                    echo "<tbody>
                                        <td>
                                            <a href='home.php'>Quay lại của hàng</a>
                                            <a href='delcart.php?id=0'>Xóa toàn bộ giỏ hàng</a>
                                            <input class='pro'  type='submit' name='submit' value='Cập nhật giỏ hàng'>
                                            <button class='btn btn-lg btn-block btn-success text-uppercase'>Checkout</button>
                                        </td>   
                                        </tbody>";
                                }
                                else{
                                    echo "<div class='pro'>";
                                    echo "<h4 align='center'>Bạn không có món hàng nào trong giỏ hàng hàng<br /><a class='nav-link active'
                                    href='home.php'>Quay lại cửa hàng</a></h4>";
                                    echo "</div>";
                                }
                            ?>
                            
                        </table>
                    </div>
                </div>
                
            </div>
        </div>


        <footer class="text-light">
            <div class="container">
                <div class="row">
                <div class="container">
                    <p class="m-0 text-center text-white"> Your Website 2021</p>
                </div>

                    <div class="col-12 copyright mt-3">
                        <p class="float-left">
                            <a href="#">Back to top</a>
                        </p>
                        <i class="fa fa-heart"></i> 
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
                                echo "<div class='pro'>";
                                echo "<h3>$row[tensp]</h3>";
                                echo " Giá: ".number_format($row['gia'])."
                                $<br />";
                                echo "<img style='height: 150px;width: 200px;' src=".$row['img']." />";
                                echo "<p align='right'>Số lượng: <input type='text'
                                        name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'> - ";
                                echo "<a href='delcart.php?id=$row[id]'>Xóa</a></p>";
                                echo "<p align='right'> Giá tiền cho món hàng: ".
                                number_format($_SESSION['cart'][$row['id']]*$row['gia']) ." $</p>";
                                echo "</div>";
                                $total+=$_SESSION['cart'][$row['id']]*$row['gia'];
                            }

                            echo "<div class='pro' align='right'>";
                            echo "<b>Tổng tiền cho các món hàng: <font color='red'>".
                            number_format($total)." $</font></b>";
                            echo "</div>";
                            
                            echo "<input class='pro'  type='submit' name='submit' value='Cập nhật giỏ hàng'>";
                            echo "<div class='pro' align='center'>";
                            echo "<b><a href='home.php'>Quay lại của hàng</a> </b>";
                            echo "</div>";
                            echo "<div class='pro' align='center'>";
                            echo "<b><a href='delcart.php?id=0'>Xóa toàn bộ giỏ hàng</a></b>";
                            echo "</div>";
                            
                        }
                        else{
                            echo "<div class='pro'>";
                            echo "<h4 align='center'>Bạn không có món hàng nào trong giỏ hàng hàng<br /><a class='nav-link active'
                            href='home.php'>Quay lại cửa hàng</a></h4>";
                            echo "</div>";
                        }
                        <li class="nav-item">
                            <?php
                            echo '<a class="nav-link" href="dangxuat.php">Đăng xuất</a></br>';
                            ?></li>
                        
                    </ul>
                        <?php

                                echo  '<h5> Xin chào ' .$_SESSION['username'].'</h5>';
                        ?>
        in sản phẩm
        <?php
                $connect = mysqli_connect("localhost", "root", "", "gk");
                $sql = "SELECT * FROM sp order by id desc";
                $query = mysqli_query($connect, $sql);
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_array($query)) {
                        echo "<div class='col-md-4 mb-5'>
                                 <div class='card h-100'>
                                    
                                    <img class='card-img-top' src=" . $row['img'] . " />
                                            <div class='card-body p-4'>
                                                <div class='text-center'>
                                                    <h5 class='fw-bolder'><a style='text-decoration: none;' href ='binluan.php?id=$row[id]'>$row[tensp]</h5>
                                                    <h6 class='fw-bolder'>$row[gia] $</h6>
                                                    <p class='fw-bolder'>$row[mota]</p>
                                                </div>
                                            </div>
                                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                                        <div class='text-center'> <p align='right'><a style='text-decoration: none; ' 
                                        href='addcart.php?item=$row[id]'>Add to cart</a></p>
                                        </div>
                                </div>
                                    </div>
                                </div>";
                    }
                }
                ?>