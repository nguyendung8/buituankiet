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
  <?php
    $maSP = $_REQUEST["maSP"];
    $sql_chitiet ="SELECT * FROM sanpham s,loaiSP l,thuonghieu t WHERE s.maSP=$maSP and s.maloaiSP = s.maloaiSP and s.maTH = t.maTH LIMIT 1";
    $query_chitiet=mysqli_query($connect,$sql_chitiet);
    while ($row_chitiet=mysqli_fetch_array($query_chitiet)){
 ?>
    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $row_chitiet['tenSP'] ?></strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="images/<?php echo $row_chitiet['anhSP'] ?>" alt="Image" class="img-fluid">
          </div>
          <form class="col-md-6">
            <h2 class="text-black"><?php echo $row_chitiet['tenSP'] ?></h2>
            <p><?php echo $row_chitiet['motaSP'] ?></p>
            <p class="mb-4"><?php echo $row_chitiet['chitietSP'] ?></p>

            <p class="mb-4">Loại sản phẩm: <?php echo $row_chitiet['tenloaiSP'] ?></p>
            <p class="mb-4">Thương hiệu: <?php echo $row_chitiet['tenTH'] ?></p>
            <p class="mb-4">Số lượng: <?php echo $row_chitiet['soluongSP'] ?></p>
            
            <p><strong class="text-primary h4"><?php echo number_format($row_chitiet['giaSP'],0,',','.').'vnd' ?></strong></p>
         
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="number" class="form-control text-center" value="1" name=quantity placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>

            </div>
            <p><a href="cart.html" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

          </form>
        </div>
      </div>
    </div>

    <?php
    }
 ?>

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