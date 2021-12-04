<?php
session_start();
?>
<?php
if(isset($_POST['submit'])){
    $t =$_POST['tensp'];
    $g =$_POST['gia'];
    $img =$_POST['img'];
    $soluong =$_POST['soluong'];
    $mota =$_POST['mota'];
    $danhmuc =$_POST['danhmuc'];
    $conn = mysqli_connect("localhost","root","","gk");
    $sql = "INSERT INTO sp( tensp, gia, img, soluong, mota,danhmuc) 
            values ('$t ','$g','$img','$soluong','$mota','$danhmuc')";
    $ketqua = mysqli_query($conn, $sql);
    header("location:index.php");
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <h2>Thêm Sản phẩm</h2>
        <form  id="ttw-form" method="POST" action="">
            <div id="wrapping" class="clearfix">
                <section id="aligned">
                    <input  name="tensp"  placeholder="Tên sản phẩm"  class="txtinput">
                    
                    <input type="text" name="gia"  placeholder="Giá"  class="txtinput">
                    
                    <input type="text" name="img"  placeholder="Hình ảnh"  class="txtinput">
                    
                    <input type="text" name="soluong"  placeholder="Số lượng"  class="txtinput">
                    <textarea name="mota"></textarea>
                    <script>
                            CKEDITOR.replace( 'mota' );
                    </script>
                    
                </section>
                <section id="aside" class="clearfix">
                    <section id="recipientcase">
                        <h3>Danh mục:</h3>
                        <select id="recipient" name="danhmuc" tabindex="6" class="selmenu">
                            <?php
                                    $conn2 = mysqli_connect("localhost","root","","gk");
                                    $sql2="SELECT * FROM danhmuc ";
                                    $ketqua=mysqli_query($conn2,$sql2);
                                    while($row= mysqli_fetch_array($ketqua)){
                                        echo '<option value = "'.$row['id'].'">'.$row['tendanhmuc'] . '</option>';
                                    }
                            ?>
                        </select></br></br></br>
                    </section>
                </section>
                
                <input style="width:100px; height:50px; background-color: rgb(187, 246, 159);" type="submit" name="submit"   value="Submit">
                
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