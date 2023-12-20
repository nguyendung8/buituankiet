<div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form method = "GET" action ="search.php" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input name ="keyword" type="search" class="form-control border-0" placeholder="Tìm kiếm">
              </form>
            </div>
                 
            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="index.php" class="js-logo-clone">BADMINTON SHOP</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li><a href="#"><span class="icon icon-heart-o"></span></a></li>
                  <li>
                    <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count">2</span>
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li>
              <a href="index.php">Trang chủ</a>
            </li>
            <li class="has-children">
            <a>Danh mục</a>
                <ul class="dropdown">
                        <?php
                        $sql_loaiSP="SELECT * FROM loaiSP ORDER BY maloaiSP DESC";
                        $query_loaiSP=mysqli_query($connect,$sql_loaiSP);
                        
                                    while($row_loaiSP=mysqli_fetch_array($query_loaiSP)){

                                ?>
                                <li> <a href="shop.php?maloaiSP=<?php echo $row_loaiSP['maloaiSP'] ?>"><?php echo $row_loaiSP['tenloaiSP']?></a></li>

                                <?php
                                    }

                                ?>
                        </ul>
            </li>
            <li class="has-children">
            <a>Thương hiệu</a>
                <ul class="dropdown">
                        <?php
                        $sql_thuonghieu="SELECT * FROM thuonghieu ORDER BY maTH DESC";
                        $query_thuonghieu=mysqli_query($connect,$sql_thuonghieu);
                        
                                    while($row_thuonghieu=mysqli_fetch_array($query_thuonghieu)){

                                ?>
                                <li> <a href="shop.php?maTH=<?php echo $row_thuonghieu['maTH'] ?>"><?php echo $row_thuonghieu['tenTH']?></a></li>

                                <?php
                                    }

                                ?>
                        </ul>
            </li>
            <li><a href="shop.php">Sản phẩm</a></li>
          </ul>
        </div>
      </nav>