<?php
session_start();
?>
<?php 
    $conn2 =mysqli_connect("localhost","root","","gk");
    $sql2 ="SELECT * FROM sp WHERE id=".$_GET['id'];
    $ketqua=mysqli_query($conn2, $sql2);
    $thongtin = mysqli_fetch_array($ketqua); 

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
    
</head>
<body style="font-size:13px;">
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
        <h2>Cập nhật Sản phẩm</h2>
        <div id="wrapping" class="clearfix">
            <form action="" method="POST" id="ttw-form">
                <?php
                    if ($_SERVER["REQUEST_METHOD"]=="POST") {
                        $id =$_GET['id'];
                        $t =$_POST['tensp'];
                        $g =$_POST['gia'];
                        $img =$_POST['img'];
                        $soluong =$_POST['soluong'];
                        $mota =$_POST['mota'];
                        $danhmuc =$_POST['danhmuc'];
                        $conn = mysqli_connect("localhost","root","","gk");
                        $sql = "UPDATE sp SET tensp = '$t', gia = '$g', img = '$img',soluong ='$soluong', mota = '$mota', danhmuc = '$danhmuc' WHERE id = $id;";
                        $ketqua = mysqli_query($conn, $sql);
                        //header("location:index.php");
                      
                        
                    }       
                ?>
                <section id="aligned">
                    <input  name="id"  placeholder="ID"  class="txtinput" value="<?php echo $thongtin['id'];?>">
                
                    <input type="text" name="tensp"  placeholder="Tên sản phẩm"  class="txtinput" value="<?php echo $thongtin['tensp'];?>">
                    
                    <input type="text" name="gia"  placeholder="Giá"  class="txtinput" value="<?php echo $thongtin['gia'];?>">
                    
                    <input type="text" name="img"  placeholder="Hình ảnh"  class="txtinput" value="<?php echo $thongtin['img'];?>">
                    
                    <input type="text" name="soluong"  placeholder="Số lượng"  class="txtinput" value="<?php echo $thongtin['soluong'];?>">
                    
                    <input style="height:150px;" type="text" name="mota" placeholder="Mô tả" class="txtinput" value="<?php echo $thongtin['mota'];?>">
                </section>
                <section id="aside" class="clearfix">
                    <section id="recipientcase">
                        <h3>Danh mục:</h3>
                        <select  name="danhmuc"  class="selmenu">
                            <?php
                                $conn2 = mysqli_connect("localhost","root","","gk");
                                $sql2="SELECT * FROM danhmuc ";
                                $ketqua=mysqli_query($conn2,$sql2);
                                while($row= mysqli_fetch_array($ketqua))
                                {

                                    echo '<option value = "'.$row['id'].'"';
                                    if($thongtin['danhmuc']==$row['id']) echo 'selected';
                                    echo'>'.$row['tendanhmuc'] . '</option>';
                                }
                            ?>
                        </select></br></br></br>
                        <input type="submit" name="submit" value="Sửa">
                    </section>
                </section>
                </form>    
        </div>
    </section>
        
    
    <footer class="py-5 bg-dark">
        <div class="container1">
            <p class="m-0 text-center text-white"> Your Website 2021</p>
        </div>
    </footer>
</body>

</html>
