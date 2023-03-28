<?php
require_once('admin/databases.php');
include 'header.php';
$dr = $_GET['id'];
$query = "SELECT id,name,details,dept,history,image,keywords,status,department FROM doctor,department WHERE dept=did AND id=$dr";
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
                        <li>Doctors</li>
                    </ul>
                    <h2>Profile</h2>
                </div>

            </div>
        </section>
        <!--Page Header End-->

             <!--Team Details Start-->
        <section class="team-details">
            <div class="container">
                <div class="team-details__top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__top-left">
                                <div class="team-details__top-img">
                                     <img src="admin/<?php echo $row['image'] ?>" alt="">
                                   <!--  <div class="team-details__big-text">jessica</div> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__top-right">
                                <div class="team-details__top-content">
                                    <h3 class="team-details__top-name"><?php echo $row['name']; ?></h3>
                                    <p class="team-details__top-title"><?php echo $row['details']; ?></p>
                                    <br>
                                    <hr>
                                   
                                    <div id="history">
                                    <?php echo $row['history']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="team-details__bottom">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__bottom-left">
                                <h4 class="team-details__bottom-left-title">Personal Experience</h4>
                                <p class="team-details__bottom-left-text">If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden.</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="team-details__bottom-right">
                                <div class="team-details__progress">
                                    <div class="team-details__progress-single">
                                        <h4 class="team-details__progress-title">Consultation</h4>
                                        <div class="bar">
                                            <div class="bar-inner count-bar" data-percent="90%">
                                                <div class="count-text">90%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-details__progress-single">
                                        <h4 class="team-details__progress-title">Insured</h4>
                                        <div class="bar">
                                            <div class="bar-inner count-bar" data-percent="46%">
                                                <div class="count-text">46%</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="team-details__progress-single">
                                        <h4 class="team-details__progress-title">Dealing</h4>
                                        <div class="bar marb-0">
                                            <div class="bar-inner count-bar" data-percent="60%">
                                                <div class="count-text">60%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Team Details End-->

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