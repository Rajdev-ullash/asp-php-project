<?php
require_once('admin/databases.php');
include 'header.php';
$dr = $_GET['id'];
$query = "SELECT * FROM package WHERE id=$dr";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_array($result);
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
                        <li>Packages</li>
                    </ul>
                    <h2>Package Details</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

                <!--News Details Start-->
        <section class="news-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="news-details__left">
                            
                            <div class="news-details__content">
                                <h3 class="news-details__title"><?php echo $row['category']; ?></h3>
                                <h4><?php echo $row['des']; ?></h4>
                                <br>
                               <?php echo $row['details']; ?>
                            </div>
                            

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            
                            <div class="sidebar__single sidebar__post">
                                <h2 class="sidebar__title">More packages</h2>
                                <ul class="sidebar__post-list list-unstyled">
                                    <?php
                                    $pquery = "SELECT * FROM package WHERE id=$dr";
                                    $presult = mysqli_query($connection, $pquery);
                                     while($prow = mysqli_fetch_array($presult)){
                                    ?>
                                    <li>
                                        <div class="sidebar__post-image">
                                             <img src="admin/<?php echo $prow['image'] ?>" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                
                                                <a href="news-details.html"><?php echo $prow['category']; ?></a>
                                            </h3>
                                        </div>
                                    </li>
                                    <?php
                                    }
                                    ?>
        
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--News Details End-->

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