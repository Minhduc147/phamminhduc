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
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warm" style="background-image: linear-gradient(to bottom, rgb(248, 165, 150), white)">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Bán Sách</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link" href="nguoidung.php">Danh sách người dùng</a></li>
                        <li class="nav-item"><a class="nav-link" href="danhmuc.php">Danh sách danh mục</a></li>
                        <li class="nav-item"><a class="nav-link" href="donhang.php">Danh sách đơn hàng</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Chức năng</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="them.php">Thêm sản phẩm</a></li>
                                <li><a class="dropdown-item" href="themdm.php">Thêm danh mục</a></li>
                                <li><a class="dropdown-item" href="binhluan1.php">Bình luận</a></li>
                                <li><a class="dropdown-item" href="#!">Thống kê</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo '<a class="nav-link" href="dangxuat.php">Đăng xuất</a></br>';
                            echo  '<h5> Xin chào ' .$_SESSION['username'].'</h5>';                           
                        } 
                        ?>
                        </li>
                    </ul>    
                </div>
            </div>
        </nav>
    </body>
</html>
