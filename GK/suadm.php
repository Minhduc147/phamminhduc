<?php
    session_start();
    $conn2 =mysqli_connect("localhost","root","","gk");
    $sql2 ="SELECT * FROM danhmuc WHERE id=".$_GET['id'];
    $ketqua=mysqli_query($conn2, $sql2);
    $dm = mysqli_fetch_array($ketqua); 
   

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
    
    
    <section  id="container">
        <h2>Cập nhật danh mục</h2>
        <div id="wrapping" class="clearfix">
            <form action="" method="POST" id="ttw-form" style="margin-left:190px;">
                <?php
                 
                    if ($_SERVER["REQUEST_METHOD"]=="POST") {
                        $id =$_GET['id'];
                        $tendanhmuc =$_POST['tendanhmuc'];
                        $a=$_POST['anh'];
                        $soluong =$_POST['soluong'];
                        $conn = mysqli_connect("localhost","root","","gk");
                        $sql = "UPDATE danhmuc SET tendanhmuc = '$tendanhmuc',anh='$a', soluong = '$soluong' WHERE id = $id;";
                        
                        $ketqua = mysqli_query($conn, $sql);
                        header("location:danhmuc.php");
                    }
                        
                        
                
                          
                ?>
                <section id="aligned">
                    <input  name="id"  placeholder="ID"  class="txtinput" 
                    value="<?php echo $dm['id'];?>">
                    
                    <input type="text" name="tendanhmuc"  placeholder="Tên danh mục"  class="txtinput" 
                    value="<?php echo $dm['tendanhmuc'];?>">
                    <input type="text" name="anh"  placeholder="Icon"  class="txtinput" 
                    value="<?php echo $dm['anh'];?>">
                    
                    <input type="text" name="soluong"  placeholder="số lượng"  class="txtinput" 
                    value="<?php echo $dm['soluong'];?>"></br>
                    <input style="width:100px; height:50px; background-color: rgb(187, 246, 159);" type="submit" name="submit"  
                    value="Submit">
                    
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
