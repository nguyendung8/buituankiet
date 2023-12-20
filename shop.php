<?php
    session_start();
    require_once("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>BADMINTON SHOP &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body>
  
    <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <?php
        include("pages/header.php");
        ?>
  </header>


  
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Sản Phẩm</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row mb-5">

            <?php
              if(isset($_GET['trang'])){
                $page = $_GET['trang'];
              }else{
                $page = 1;
              }
                if($page == '' || $page == 1){
                $begin = 0;
              }else{
                $begin = ($page*6)-6;
              }
               
                $sql_show ="SELECT * FROM sanpham ORDER BY sanpham.maSP DESC LIMIT $begin,6";
                $query_show =mysqli_query($connect,$sql_show);
            ?>
  
					<?php
              if(mysqli_num_rows($query_show)>0){
    					while ($row=mysqli_fetch_array($query_show)){
					?>
							<div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
							<figure class="block-4-image">
								<a href="shop-single.php?maSP=<?php echo $row['maSP'] ?>">
                <img src="images/<?php echo $row['anhSP'] ?>" alt="Image placeholder" class="img-fluid"></a>
							</figure>
							<div class="block-4-text p-4">
								<h3><a href="shop-single.php?maSP=<?php echo $row['maSP'] ?>"><?php echo $row['tenSP'] ?></a></h3>
								<p class="mb-0"><?php echo $row['motaSP'] ?></p>
								<p class="text-primary font-weight-bold"><?php echo number_format($row['giaSP'],0,',','.').'vnd' ?></p>
							</div>
            </div> 
          </div>  
					  
					<?php
    					}
            }
            else{
             ?>
              <h2 style="text-align: center;">KHÔNG TÌM THẤY SẢN PHẨM NÀO PHÙ HỢP VỚI LỰA CHỌN CỦA BẠN</h2>
          <?php	
            }
					?>	
           
 			 
      </div>
            <div class="row" data-aos="fade-up">
              <div class="col-md-12 text-center">
                <div class="site-block-27">
                <?php
                     if(mysqli_num_rows($query_show)>0){
				          $sql_trang = mysqli_query($connect,"SELECT * FROM sanpham");
				          $row_count = mysqli_num_rows($sql_trang);  
				          $trang = ceil($row_count/6);
				        ?>
                
                  <ul>
                  <?php
					
					        for($i=1;$i<=$trang;$i++){ 
					        ?>
					        <?php if($i==$page){ ?>
					            <li class ="active"><a href="shop.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
					        <?php } else { ?>
						          <li><a href="shop.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
					        <?php
					        } 
					        ?>
				<?php
					} }
					?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                <div id="slider-range" class="border-primary"></div>
                <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Loại sản phẩm</h3>

                <?php
                        $sql_loaiSP="SELECT * FROM loaiSP ORDER BY maloaiSP DESC";
                        $query_loaiSP=mysqli_query($connect,$sql_loaiSP);
                        
                                    while($row_loaiSP=mysqli_fetch_array($query_loaiSP)){

                                ?>
                                <label for="s_sm" class="d-flex">
                                  <a href="category.php?maloaiSP=<?php echo $row_loaiSP['maloaiSP'] ?>"><?php echo $row_loaiSP['tenloaiSP']?></a>
                                </label>
                                <?php
                                    }
                                ?>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Thương hiệu</h3>
                <?php
                        $sql_thuonghieu="SELECT * FROM thuonghieu ORDER BY maTH DESC";
                        $query_thuonghieu=mysqli_query($connect,$sql_thuonghieu);
                        
                                    while($row_thuonghieu=mysqli_fetch_array($query_thuonghieu)){

                                ?>
                                <label for="s_sm" class="d-flex">
                                    <a href="brand.php?maTH=<?php echo $row_thuonghieu['maTH'] ?>"><?php echo $row_thuonghieu['tenTH']?></a>
                                </label>
                                <?php
                                    }
                                    
                                ?>
              </div>


              
            </div>
          </div>
        </div>
        
      </div>
    </div>

   <footer class="site-footer border-top">
   <?php
        include("pages/footer.php");
        ?>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
    
  </body>
</html>