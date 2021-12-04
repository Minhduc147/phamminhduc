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
    <link href="cart.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>

<body>

    <?php
    include('menu.php');
    ?>
    <header class="bg-info py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Bán Sách</h1>
                <h4 class="display-8 fw-bolder">Online</h4>
                <p class="lead fw-normal text-white-50 mb-0">Bán Sách</p>
            </div>
        </div>
    </header>
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                    <?php
                    echo "<thead>
                    <tr>
                        <th scope='col'> </th>
                        <th scope='col'>Sản phẩm</th>
                        <th scope='col'>Trạng thái</th>
                        <th scope='col' class='text-center'>Số lượng</th>
                        <th scope='col' class='text-right'>Giá</th>
                        <th> </th>
                    </tr>
                </thead>";
                    ?>
            
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
                            echo"<tbody>";
                            while($row=mysqli_fetch_array($query)){
                                $total+=$_SESSION['cart'][$row['id']]*$row['gia'];
                                
                                        echo "<tr>
                                            <td><img style='height: 150px;width: 200px;' src=".$row['img']." /> </td>
                                            <td><h5>$row[tensp]</h5></td>
                                            <td>In stock</td>
                                            <td> <input class='form-control' type='text'
                                            name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'></td>
                                            <input name='gia' type='hidden'  value='".$_SESSION['cart'][$row['id']]*$row['gia']."'>
                                            <td class='text-right'>".number_format($row['gia'])."
                                            $<br /></td>
                                            <td class='text-right'><button class='btn btn-sm btn-danger '>
                                            <a style='text-decoration: none;' class='fa fa-trash' href='delcart.php?id=$row[id]'></a> </button> </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><b>Thành tiền</td>
                                            <input name='tong' type='hidden'  value='".number_format($total)."'>
                                            <td class='text-right'>".number_format($_SESSION['cart'][$row['id']]*$row['gia'])."$</td>
                                        </tr>  ";   
                                    }
                                    echo "<tr>
                                        
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><strong>Tổng tiền</strong></td>
                                            <td class='text-right'><strong>".
                                            number_format($total)." $</strong></td>
                                            
                                        </tr>
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
                    <?php
                    echo 
                            "<div style='display:flex; margin-left: 170px;text-decoration: none;'>
                                <div class='col-sm-4 col-md-2 text-right'>
                                <button class='btn btn-outline-dark'><a style='text-decoration: none;' href='home.php'>Quay lại của hàng</a></button>
                                </div>
                                <div class='col-sm-6 col-md-4 text-right'>
                                <button class='btn btn-outline-dark'><a style='text-decoration: none;' href='delcart.php?id=0'>Xóa toàn bộ giỏ hàng</a></button>
                                </div>
                                <div class='col-sm-4 col-md-2 text-right'>
                                        <input class='btn btn-outline-primary'  type='submit' name='submit' value='Cập nhật giỏ hàng'>
                                </div>
                                <div class='col-sm-6 col-md-4 text-right'>
                                <button class='btn btn-outline-primary'><a style='text-decoration: none;' href='check.php'>Kiểm Tra</a></button>
                                </div>
                            </div> ";
                                    
                    ?>
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
                            <a style='text-decoration: none; font-size:25px;' href="#">Back to top</a>
                        </p>
                        <i class="fa fa-heart"></i> 
                    </div>
                </div>
            </div>
    </footer>
</body>
</html>
