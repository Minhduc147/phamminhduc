<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Bán Sách</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warm" style="background-image: linear-gradient(to bottom, rgb(248, 165, 150), white)">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="home.php">Book</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="home.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Chúng tôi</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cửa hàng</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Sản phẩm mới nhất</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!"> </a></li>
                                <li><a class="dropdown-item" href=""></a></li>
                            </ul>
                        </li>
                        <?php
                        if (!isset($_SESSION['username'])) {
                            echo '<a class="nav-link" href="dn.php">Đăng nhập</a></br>';
                        }else{
                            echo '<a class="nav-link" href="dangxuat.php">Đăng xuất</a></br>';
                            echo  '<h5> Xin chào ' .$_SESSION['username'].'</h5>';
                            
                        }  
                        ?></li>
                        
 

                    </ul>  
                    
                             
                    <form class="d-flex">
                    <div id='cart'>
                        <?php
                            $ok=1;
                            if(isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $k=>$v)
                                {
                                    if(isset($v))
                                    {
                                    $ok=2;
                                    }
                                }
                            }
                            if ($ok != 2)
                            {

                                echo '<button class="btn btn-outline-info" type="submit">
                                <i class="bi-cart-fill me-1"></i><span><a href="cart.php">0</a></span></button>';
                                
                                
                            }
                            else
                            {   
                                $items = $_SESSION['cart'];
                            
                                echo '<button class="btn btn-outline-info" type="submit">
                                <i class="bi-cart-fill me-1"></i> <a href="cart.php">'.count($items).'</a></button>';
                            
                            }
                        ?>
                    </div>
                    </form>
                </div>
                <form style="margin-left:80px;" method="GET" action="search.php" >
                    <div>       
                        <div class="input-group"> 
                            <input type="text" class="form-control" name="s" onfocus="this.value=''" placeholder="Tìm kiếm">
                            <button style="width:40px; margin-left:10px;"  class="btn btn-outline-dark " type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                            
                            
                        </div> 
                    </div> 
            </form>
            </div>
            
        </nav>
    </body>
</html>