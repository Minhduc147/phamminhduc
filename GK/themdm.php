<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
    $t =$_POST['tendanhmuc'];
    $a =$_POST['anh'];
    $soluong =$_POST['soluong'];
    $conn = mysqli_connect("localhost","root","","gk");
    $sql = "INSERT INTO danhmuc( tendanhmuc, anh, soluong) 
            values ('$t ','$a','$soluong')";
    $ketqua = mysqli_query($conn, $sql);
    header("location:danhmuc.php");
    mysqli_close($conn);
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
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="form.css">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
</head>
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
    <section id="container">
        <h2>Thêm Danh Mục Sản phẩm</h2>
        <form  id="ttw-form" method="POST" action="">
            <div id="wrapping" class="clearfix">
                <section style="margin-left:190px;" id="aligned">
                    <input  name="tendanhmuc"  placeholder="Tên danh mục"  class="txtinput"></br>
                    <input  name="anh"  placeholder="ICon"  class="txtinput"></br>
                    <input type="text" name="soluong"  placeholder="Số lượng"  class="txtinput"></br></br>
                    <input style="width:100px; height:50px; background-color: rgb(187, 246, 159);" type="submit" name="submit"   value="Submit">
                </section>
                    
            </div>
        </form>
    </section>
    <footer class="py-5 bg-dark">
        <div class="container1">
            <p class="m-0 text-center text-white"> Your Website 2021</p>
        </div>
    </footer>

</body>
</html>