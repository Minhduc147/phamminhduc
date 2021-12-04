<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Shop</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="" />
		<meta name="keywords" content=" responsive" />
		<meta name="author" content="gettemplates.co" />
	
		<link href="css/styles.css" rel="stylesheet" />
		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />
		<!-- Animate.css -->
		<link rel="stylesheet" href="code/css/animate.css">
		<link rel="stylesheet" href="code/css/owl.carousel.min.css">
		<link rel="stylesheet" href="code/css/style.css">
		<!-- Modernizr JS -->
		<script src="code/js/modernizr-2.6.2.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
        $("#btngui").click(function(){
            $.post("thembinhluan.php",
            {
            username: $("#user").val(),
            noidung: $("#noidung").val(),
            idsp:$("#idsp").val(),
            date:$("#date").val()
            },
            function(data,status){
            //alert("Data: " + data + "\nStatus: " + status);
            $("#danhsachbinhluan").append("<p>" + $("#user").val()+" : "+ $("#noidung").val()+"  "+$("#date").val()+"</p>");
                $("#noidung").val('');
            });
        });
        });
</script>
	
		</head>
		
	<body>
	<?php
    include('menu.php');
    ?>
	<?php
	 if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$connect = mysqli_connect("localhost", "root", "", "gk");
		$sql = "SELECT * FROM sp  where id= $id limit 1 ";
		$query = mysqli_query($connect, $sql);
		$query=mysqli_fetch_array($query);
       echo '
	   <section class="py-5">
	   <div class="container px-4 px-lg-5 my-5">
		   <div class="row gx-4 gx-lg-5 align-items-center">
			   <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="'.$query['img'].'" alt="..." /></div>
			   <div class="col-md-6">
				   
				   <h1 class="display-5 fw-bolder">'.$query['tensp'].'</h1>
				   <div class="fs-5 mb-5">
					   <h3>$ '.$query['gia'].'</h3>
				   </div>
				   <p > '.$query['mota'].'</p>
				   <div class="text-center">
				   		<a style="text-decoration: none;font-size:25px; " 
                        href="addcart.php?item=$row[id]"><i class="fa fa-shopping-cart" ></i></a>
                    </div>
			   </div>
		   </div>
	   </div>
   </section>	  
	   ';
	 }
	?>
		
	<div id="page">
	<div id="fh5co-product">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="owl-carousel owl-carousel-fullwidth product-carousel">
						
						<div class="item">
						<?php
						$connect = mysqli_connect("localhost", "root", "", "gk");
						$sql2 = "SELECT * FROM sp  order by id desc ";
						$query = mysqli_query($connect, $sql2);
						if (mysqli_num_rows($query) > 0) {
							while ($row = mysqli_fetch_array($query)) {
								echo "<div class='col-md-4 mb-5'>
										<div class='card h-100'>
											
											<img class='card-img-top' src=" . $row['img'] . " />
													<div class='card-body p-4'>
														<div class='text-center'>
															<h5 class='fw-bolder'>$row[tensp]</h5>
															<h6 class='fw-bolder'>$row[gia] $</h6>
															<p class='fw-bolder'>$row[mota]</p>
														</div>
													</div>
												<div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
												<div class='text-center'> <p align='right'><a style='text-decoration: none; ' 
												href=''>Add to cart</a></p>
												</div>
										</div>
											</div>
										</div>";
							}
						}
                		?>
						</div>
						
					</div>
				</div>
			</div>
			<div style="margin-left:150px;" class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="fh5co-tabs animate-box">
						<ul class="fh5co-tab-nav">
							<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Sản Phẩm</span></a></li>
							<li><a href="#" data-tab="2"><span class="icon visible-xs"><i class="icon-bar-graph"></i></span><span class="hidden-xs">An Toàn</span></a></li>
							<li><a href="#" data-tab="3"><span class="icon visible-xs"><i class="icon-star"></i></span><span class="hidden-xs">Phản Hồi &amp;Xếp Hạng</span></a></li>
						</ul>

						<!-- Tabs -->
						<div class="fh5co-tab-content-wrap">

							<div class="fh5co-tab-content tab-content active" data-tab-content="1">
							<h3 style="color:red;">Sản phẩm cuối cùng tại cửa hàng</h3>
                            <?php
                                $conn = mysqli_connect("localhost", "root", "", "gk");
                                $sql=" SELECT * FROM sp where soluong=1";
                                $ketqua = mysqli_query($conn, $sql);  
                                $row =mysqli_fetch_array($ketqua);
                                echo "<div class='col-md-8 col-md-offset-1'>
                                        <h3>$row[tensp]</h3>
                                        <img style='width:300px; height: 150px:' src='$row[img]' >
                                        <span class='price'>$row[gia] $</span>
                                        <p>$row[mota]</p> 
                                    </div>" ;
                            ?>
							</div>

							<div class="fh5co-tab-content tab-content" data-tab-content="2">
								<div class="col-md-10 col-md-offset-1">
									<h3>Đảm bảo </h3>
									<ul>
										<li>Sản phẩm chính hãng auth</li>
										<li>Được lựa chọn, yêu thích nhiều</li>
										<li>Giá cả hợp Lý</li>
										
										
									</ul>
								</div>
							</div>

							<div class="fh5co-tab-content tab-content" data-tab-content="3">
								<div class="col-md-10 col-md-offset-1">
									<h3>Đánh giá</h3>
									<div class="feed">
										<div>
                                        <form  method="post">
                                            <div id="danhsachbinhluan">
                                                <?php
												  $id=$_GET['id'];
                                                    $conn1 = mysqli_connect("localhost", "root", "", "gk");
                                                    $sql1="SELECT * FROM binh where idsp=$id";
                                                    $ketqua=mysqli_query($conn1,$sql1);
														while($row1 = mysqli_fetch_array($ketqua)){
															echo '<h5 style="color: blue;">'.$row1['user'].':'.$row1['noidung']."  <br> ". $row1['date'].'</h5>';
														}
													
                                               
                                                ?>
                                            </div>
                                            <div id="binhluan">
                                            	<input type="hidden" id="user" value="<?=$_SESSION['username']?>"><br>
                                                <input type="hidden" id="idsp" value="<?php $id=$_GET['id']; echo $id?>">
                                                <textarea  id="noidung" cols="60" rows="6" placeholder="viết binh luận tại đây"></textarea><br>
                                                <input type="text" id="date" value="<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); echo date('y-m-d h:i:sa');?>"hidden>
                                                <input style="margin-top:20px;height:50px" type="button" id="btngui"  value="Bình Luận">
                                            </div>
                                        </form>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white"> Your Website 2021</p>
        </div>
    </footer>	
	<!-- jQuery -->
	<script src="code/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="code/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="code/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="code/js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="code/js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="code/js/jquery.countTo.js"></script>
	<!-- Flexslider -->
	<script src="code/js/jquery.flexslider-min.js"></script>
	<!-- Main -->
	<script src="code/js/main.js"></script>
     <!-- ajax -->
	 <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	 <!-- <script >
		 $('#btngui').click(function () {
			$.ajax({
               url:'thembinhluan.php',
               method:'post',
               data:{
				   username:$("#user").val(),
				   idsp:$("#idsp").val(),
				   noidung:$("#noidung").val(),
				   date:$("#date").val()},
               success:function(data){
               }
           });
		 });
	 </script> -->
	</body>
</html>

 
    

