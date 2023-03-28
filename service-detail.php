<?php
require_once('admin/databases.php');
include 'header.php';
$id = $_GET['i'];
$c = $_GET['n'];
?>
        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(assets/images/backgrounds/page-header-bg2.jpg)">
            </div>
            <div class="page-header-shape-1"><img src="assets/images/shapes/page-header-shape-1.png" alt=""></div>
            <div class="container">
                <div class="page-header__inner">
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><span>/</span></li>
                        <li>Specialities</li>
                    </ul>
                    <h2><?php echo $c;?></h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

       <!--Feature Four Start-->
        <section class="feature-four">
            <div class="container">

                <div class="feature-four__bottom">
                    <div class="row">
                         <?php
                            
                            $query = "SELECT * FROM product WHERE category=$id ORDER BY ord";
                           
                            $select_result = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_array($select_result)){
                            ?>
                        <div class="col-xl-6 col-lg-6">
                            <div class="feature-four__single">
                                <div class="feature-four__single-top">
                                    <div class="feature-four__icon">
                                       <img class="img-srv" src="admin/<?php echo $row["image"]?>">
                                    </div>
                                    <h4 class="feature-four__title"><?php echo $row["pname"]?></h4>
                                </div>
                                <p class="feature-four__text"><?php echo $row["des"]?></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                      

                    </div>
                </div>
            </div>
        </section>
        <!--Feature Four End-->

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