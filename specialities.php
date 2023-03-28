<?php
require_once('admin/databases.php');
include 'header.php';
?>
        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg3.jpg)">
            </div>
            <div class="page-header-shape-1"><img src="assets/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>/</span></li>
                        <li>Appointment</li>
                    </ul>
                    <h2>Appointment</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->
        <br><br><br>
                <!--Services One Start-->
        <section class="services-one">
            <div class="services-one__top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-6">
                            <div class="services-one__top-left">
                                <div class="section-title text-left">
                                    <div class="section-sub-title-box">
                                        <p class="section-sub-title">Our services</p>
                                        <div class="section-title-shape-1">
                                            <img src="assets/images/shapes/section-title-shape-1.png" alt="">
                                        </div>
                                        <div class="section-title-shape-2">
                                            <img src="assets/images/shapes/section-title-shape-2.png" alt="">
                                        </div>
                                    </div>
                                    <h2 class="section-title__title">Our super specialized services ...</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-6">
                            <div class="services-one__top-right">
                                <p class="services-one__top-text">Nullam eu nibh vitae est tempor molestie id sed ex.
                                    Quisque dignissim maximus ipsum, sed rutrum metus tincidunt et. Sed eget tincidunt
                                    ipsum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services-one__bottom">
                <div class="services-one__container">
                    <div class="row">
                            <?php
                            
                            $query = "SELECT * FROM product_category ORDER BY ord ASC LIMIT 4";
                            $select_result = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_array($select_result)){
                            ?>
                        <!--Services One Single Start-->
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                            <div class="services-one__single">
                                <div class="service-one__img">
                                    <img src="admin/<?php echo $row["image"]?>" alt="">
                                </div>
                                <div class="service-one__content">
                                    <div class="services-one__icon">
                                        <img class="img-responsive" src="admin/<?php echo $row["icon"]?>">
                                    </div>
                                    <h2 class="service-one__title"><a href="service-detail.php?i=<?php echo $row["id"]?>&amp;n=<?php echo $row["category"]?>"><?php echo $row["category"]?></a></h2>
                                    <p class="service-one__text"><?php echo $row["des"]?></p>
                                </div>
                            </div>
                        </div>
                        <!--Services One Single End-->
                        <?php
                        }
                        ?>
                       
                    </div>
                </div>
            </div>
        </section>
        <!--Services One End-->

        <!--CTA One Start-->
        <section class="cta-one cta-three">
            <div class="container">
                <div class="cta-one__content">
                    <div class="cta-one__inner">
                        <div class="cta-one__left">
                            <h3 class="cta-one__title">Make appointment instantly</h3>
                        </div>
                        <div class="cta-one__right">
                            <div class="cta-one__call">
                                <div class="cta-one__call-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="cta-one__call-number">
                                    <a href="tel:9200368090">+92 (003) 68-090</a>
                                    <p>Appointment Hotline</p>
                                </div>
                            </div>
                            <div class="cta-one__btn-box">
                                <a href="contact.html" class="thm-btn cta-one__btn">LIVE CHAT</a>
                            </div>
                        </div>
                        <div class="cta-one__img">
                            <img src="assets/images/resources/cta-one-img.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->
<?php
include 'footer.php';
?>