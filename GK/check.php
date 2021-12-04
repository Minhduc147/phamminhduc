<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <script src="ckeditor.js"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">
<?php
    include('menu.php');
  ?>
    
    <header class="bg-dark py-5">
        
        <div class="py-5 text-center">
            <h2 style="color: white;">Xác nhận đơn hàng</h2>
            <p style="color: white;"class="lead">Hãy điền thông tin nhận hàng và kiểm tra những món hàng cần mua đã chính xác chưa.</p>
        </div>
        
    </header>
        
    <div class="container">
    <form class="needs-validation" novalidate action="xldh.php" method="post">   
            <?php
                
                 echo "<div class='row'>";   
                    if($ok == 2){
                        foreach($_SESSION['cart'] as $key=>$value) {
                            $item[]=$key;
                        }
                        $str=implode(",",$item);
                        $connect=mysqli_connect("localhost","root","","gk");
                        $sql="select * from sp where id in ($str)";
                        
                        $query=mysqli_query($connect,$sql);
                        $total= 0;
                        
                        while($row=mysqli_fetch_array($query)){
                            $total+=$_SESSION['cart'][$row['id']]*$row['gia'];
                            echo"<ul class='list-group mb-3'>";
                                   echo "<li class='list-group-item d-flex justify-content-between lh-condensed'>
                                            <div>
                                            <input name='tensp' type='hidden'  value='".$row['tensp']."'>
                                            <h6 class='my-0'>".$row['tensp']."</h6>
                                            </div>
                                            <input name='gia' type='hidden'  value='".$_SESSION['cart'][$row['id']]*$row['gia']."'>
                                            <span >".$_SESSION['cart'][$row['id']]*$row['gia']."$</span>
                                            <input name='sluong' type='hidden'  value='".$_SESSION['cart'][$row['id']]."'>
                                            <span class='text-muted'> {$_SESSION['cart'][$row['id']]}</span>
                                            
                                            </li>
                                        <td class='text-right'><button class='btn btn-sm btn-danger '> </button> </td>";
                                }
                                        
                                       echo "<li class='list-group-item d-flex justify-content-between'>
                                            <span>Tổng tiền </span>
                                            <input name='tong' type='hidden'  value='".number_format($total)."'>
                                            <strong>".number_format($total)."$</strong>
                                        </li>
                                        </ul> ";
                         }
                         echo "</div>";      
                ?> 
                
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Thanh Toán</h4>
                
                    <div class="mb-3">
                        <label for="username">Họ Và Tên</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="ten" placeholder="Họ Và tên" required>
                            <div class="invalid-feedback" style="width: 100%;">
                                Bạn Cần Nhập Họ Tên Của Bạn.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                        <div class="invalid-feedback">
                            Bạn Cần Nhập Email Của Bạn.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address"> Số Điện Thoại</label>
                        <input type="text" class="form-control" name="sdt" placeholder="+84" required>
                        <div class="invalid-feedback">
                            Bạn Cần Nhập Số Điện Thoại Của Bạn.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Địa Chỉ</label>
                        <input type="text" class="form-control" name="diachi" placeholder="1234 Main St" required>
                        <div class="invalid-feedback">
                            Bạn Cần Nhập Địa Chỉ Nhập Hàng Của Bạn.
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="note">Ghi chú </label>
                        <textarea name="ghichukh"></textarea>
                    <script>
                            CKEDITOR.replace( 'ghichukh' );
                    </script>
                    </div>
                    
                    Thanh toán khi nhận hàng
                    <hr class="mb-4">
                    <div class="row">
                        <div class="col-12">
                            <input class="btn btn-primary btn-lg btn-block"  type="submit" value="Mua Hàng" >
                        </div>
                        

                    </div>
                
            </div>
            </form>
        </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">&copy; Shoes-Sport</p>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">shoessport@gmail.com</a></li>
                <li class="list-inline-item"><a href="#">470 Ngũ Hành Sơn-Đà Nẵng</a></li>
                
            </ul>
        </footer>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://getbootstrap.com/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o"
        crossorigin="anonymous"></script>
    <script src="https://getbootstrap.com/docs/4.3/examples/checkout/form-validation.js"></script>
</body>

</html>
