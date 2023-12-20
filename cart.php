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
          <div class="col-md-12 mb-0"><a href="index.php">Trang chủ</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Giỏ hàng</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <tr>
                  <th>ID</th>
                  <th>Mã :</th>
                  <th>Tên</th>
                  <th>Hình</th>
                  <th>Số lượng</th>
                  <th>Giá :</th>
                  <th></th>
              </tr>
              <?php
              if(isset($_SESSION['cart'])){
                  $i=0;
                  $tongtien=0;
                  foreach($_SESSION['cart'] as $cart_item){
                      $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                      $tongtien+=$thanhtien;
                      $i++;
          ?>
              <tr>
                  <td><?php echo $i ?></td>
                  <!-- ở đây lấy dữ liêu cart_item['masp'] từ themgiohang.php -->
                  <td><?php echo $cart_item['maSP']?></td>
                  <td><?php echo $cart_item['tenSP'] ?></td>
                  <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['anhSP'] ?>" width="100%" style="height:200px"></td>
      
                  <td>
                      <a href="pages/main/giohang/suasoluong.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                      <?php echo $cart_item['soluong'] ?>
                      <a href="pages/main/giohang/suasoluong.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                  </td>
      
                  <td><?php echo number_format($cart_item['giasanpham'],0,',','.') . ' VNĐ'?></td>
                  <td><?php  echo number_format($thanhtien,0,',','.') . ' VNĐ' ?></td>
                  <td><a href="pages/main/giohang/xoasanpham.php?xoa=<?php echo $cart_item['id'] ?>">XÓA</a></td>
              </tr>
      
      
          <?php 
                  }
          ?>
      
              <tr>
                  <td colspan="8">
                      <p style="float: left;"> Tổng tiền : <?php echo number_format($tongtien,0,',','.') . ' VNĐ'  ?></p>
                      <p style="float: right;"><a href="pages/main/giohang/xoahetgiohang.php?xoatatca=xoahet">Xóa Hêt</a></p>
                      <div style="clear:both;"> </div>
      
                          <?php
                                  if(isset($_SESSION['dangky'])){
                                      
                          ?>
                                  <p><a href="pages/main/thanhtoan/index.php?quanly=vanchuyen">Đặt hàng</a></p>
                          <?php
                          }else{
                          
                          ?>
                               <p><a href="index.php?quanly=dangnhap">Đăng nhập đặt hàng</a></p>
                          <?php
                           }
      
                          ?>
                     
                      
                  </td>
              
              </tr>
      
          <?php
                  
              }else{
      
              
          ?>
      
      
      
              <tr>
                  <td colspan="6">Hiện tại giỏ hàng trông</td>
              </tr>
      
      
      
          <?php
              }
          ?>
      
              </table>
            </div>
          </form>
        </div>

       
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Tổng đơn hàng</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6 text-right">
                    <strong class="text-black">
                    <?php 
                     if(isset($_SESSION['cart']))
                    echo number_format($tongtien,0,',','.') . ' VNĐ'  
                    ?>
                  </strong>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='checkout.php'">Thanh toán</button>
                  </div>
                </div>
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