<?php 
    include_once "inc/header.php";
?>
    <main class="homepage">
        <div class="container">
            <div class="row homepage-content">
                <!-- Cột bên trái gồm: danh mục sách, best seller -->
                <div class="col-3">
                    <!-- Danh mục sách -->
                    <div class="category">
                        <div class="category-box">
                            <ul>
                                <p>Danh mục</p>
                                <?php
                                    foreach($categories as $item){
                                        extract($item);
                                ?>
                                    <li>
                                        <a href="?page=search&category=<?=$idTL?>" class="nav-link"><?=$tenTL?></a>
                                    </li>
                                <?php  
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- Danh sách sách best seller -->
                    <div class="best-seller">
                        <div class="best-seller-box">
                            <ul>
                                <p>Best Seller</p>
                                <?php
                                    foreach($bestSellers as $item){
                                        extract($item);
                                ?>
                                    <li>
                                        <a href="" class="nav-link book-card">
                                            <div class="image-book">
                                                <img src="asset/img/<?=$hinhanh?>" alt="">
                                            </div>
                                            <div class="info-book">
                                                <span class="book-title">
                                                    <?=$tuasach?>
                                                </span>
                                                <span class="units-sold-text"><span class="units-sold"><?=$luotban?></span> lượt bán</span>
                                                <span class="price-text"> <span class="price"><?=number_format($giaban,0,"",".")?></span> đ</span> 
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                    }
                                ?>
                                
                            </ul>
                            <div class="see-more">
                                <a href="?page=searchBestSeller" class="nav-link">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Cột bên phải gồm: banner, hiển thị sách theo danh mục -->
                <div class="col-9">
                    <!-- banner -->
                    <div class="banner b-shadow">
                        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <div class="banner-content">
                                    <div class="image-book">
                                        <img src="asset/img/example-book2.jpg" class="d-block" alt="...">
                                    </div>
                                    <div class="info-book">
                                        <div class="title">
                                            <h4>Không Sợ Thất Bại, Chỉ Sợ Bạn Nuông Chiều Bản Thân Chưa Nỗ Lực Hết Mình</h4>
                                        </div>
                                        <div class="description">
                                            <p>
                                                Ai cũng thở dài nói cố gắng thế đủ rồi, những thành tựu to lớn dù sao cũng chẳng đến lượt mình. Thế nhưng, khi còn say sưa với giấc mộng hão huyền thì sao có thể tỉnh táo nói chuyện về ngày mai. Nếu bạn chỉ biết nghĩ quá nhiều và làm quá ít, một cái lắc đầu cũng sẽ dập tắt bao khát khao sục sôi.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <div class="banner-content" style="background-color: #eecbb7;">
                                    <div class="image-book">
                                        <img src="asset/img/example-book3.jpg" class="d-block" alt="...">
                                    </div>
                                    <div class="info-book">
                                        <div class="title">
                                            <h4>Đập Chắn Thái Bình Dương
                                            </h4>
                                        </div>
                                        <div class="description">
                                            <p>
                                                Bối cảnh của Đập chắn Thái Bình Dương là những năm 1930 của thế kỷ 20. Dufresne, một giáo viên người Pháp, góa chồng, quyết định tới Đông Dương lập nghiệp cùng hai đứa con. Bà khó nhọc xoay xở, chơi đàn piano suốt 10 năm ở rạp hát, dành dụm tiền mua một khu đất lập đồn điền. Không tiền lót tay cho quan chức chính quyền thực dân, bà chỉ nhận được một miếng đất xấu, ngập lụt mỗi lần lũ triều tháng 7 tràn về, không trồng cấy gì được.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <?php
                        foreach($category_books as $item){
                    ?>
                        <div class="category-book">
                            <div class="title">
                                <h3>
                                    <?=$item['tenTL']?>
                                </h3>
                            </div>
                            <div class="category-book-box b-shadow">
                            <div class="category-book-content">
                    <?php
                            foreach($item['tusach'] as $tuasach){
                    ?>
                            <div class="book-card">
                                    <a href="" class="nav-link">
                                        <div class="image-book">
                                            <img src="../asset/img/" alt="">
                                        </div>
                                        <div class="info-book">
                                            <div class="title">
                                                <h6>
                                                    Điện Biên Phủ - Những Trang Vàng Lịch Sử
                                                </h6>
                                            </div>
                                            <div class="units-sold-text"><span class="units-sold">100</span> lượt bán</div>
                                            <div class="price-text"> <span class="price">125,000</span> đ</div> 
                                        </div>
                                    </a>
                                </div>
                    <?php
                            }
                        }
                    ?>
                    
                        
                                
                                <div class="book-card">
                                    <a href="" class="nav-link">
                                        <div class="image-book">
                                            <img src="../asset/img/example-book5.jpg" alt="">
                                        </div>
                                        <div class="info-book">
                                            <div class="title">
                                                <h6>
                                                    Điện Biên Phủ - Những Trang Vàng Lịch Sử
                                                </h6>
                                            </div>
                                            <div class="units-sold-text"><span class="units-sold">100</span> lượt bán</div>
                                            <div class="price-text"> <span class="price">125,000</span> đ</div> 
                                        </div>
                                    </a>
                                </div>
                                <div class="book-card">
                                    <a href="" class="nav-link">
                                        <div class="image-book">
                                            <img src="../asset/img/example-book5.jpg" alt="">
                                        </div>
                                        <div class="info-book">
                                            <div class="title">
                                                <h6>
                                                    Điện Biên Phủ - Những Trang Vàng Lịch Sử
                                                </h6>
                                            </div>
                                            <div class="units-sold-text"><span class="units-sold">100</span> lượt bán</div>
                                            <div class="price-text"> <span class="price">125,000</span> đ</div> 
                                        </div>
                                    </a>
                                </div>
                                <div class="book-card">
                                    <a href="" class="nav-link">
                                        <div class="image-book">
                                            <img src="../asset/img/example-book5.jpg" alt="">
                                        </div>
                                        <div class="info-book">
                                            <div class="title">
                                                <h6>
                                                    Điện Biên Phủ - Những Trang Vàng Lịch Sử
                                                </h6>
                                            </div>
                                            <div class="units-sold-text"><span class="units-sold">100</span> lượt bán</div>
                                            <div class="price-text"> <span class="price">125,000</span> đ</div> 
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="see-more">
                                <a href="" class="btn nav-link">Xem thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php 
        include_once "inc/footer.php"
    ?>
