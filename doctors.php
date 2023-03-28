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
                        <li>Doctors</li>
                    </ul>
                    <h2>Doctors</h2>
                </div>

            </div>
        </section>
        <!--Page Header End-->

         <!--Team Page Start-->
        <section class="team-page">
            <div class="container">
                <div class="row search-bar">
                    <div class="col-lg-12">
                        <div class="comment-form__input-box" style="display:inline-block;">
                        <input type="text" placeholder="Search by doctor's name" name="sstr" id="sstr">
                        </div>
                        <div class="comment-form__input-box" style="display:inline-block;">
                        <select class="form-select my-select" name="dept" id="dept">
                        <option value="x">Filter by department</option>
                         <?php
                            
                            $query = "SELECT * FROM department ORDER BY department";
                            $result = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_array($result)){
                            ?>
                        <option value="<?php echo $row['did'];?>"><?php echo $row['department'];?></option>
                        <?php
                        }
                        ?>
                        </select>
                        </div>
                    
                         <div class="comment-form__btn-box" style="display:inline-block;">
                            <button type="button" class="thm-btn comment-form__btn" onclick="searchdoc();">Search</button>
                         </div>
                    </div>
                </div>
                <div class="row" id="docgrid">
                      <?php
                            
                            $dcquery = "SELECT * FROM doctor WHERE status<>'Inactive'";
                            $dcresult = mysqli_query($connection, $dcquery);
                            while($dcrow = mysqli_fetch_array($dcresult)){
                      ?>
                    <!--Team One Single Start-->
                    <div class="col-xl-3 col-lg-3 col-md-6  wow fadeInUp" data-wow-delay="100ms">
                        <div class="team-one__single">
                            <div class="team-one__img">
                                <div class="team-one__img-box">
                                  <img src="admin/<?php echo $dcrow['image'] ?>" alt="">
                                </div>
                               
                            </div>
                            <div class="team-one__content">
                                <h3 class="team-one__name"><a href="doctor-profile.php?id=<?php echo $dcrow['id'] ?>"><?php echo $dcrow['name'] ?></a></h3>
                                <p class="team-one__sub-title"><?php echo $dcrow['details'] ?></p>
                             
                            </div>
                        </div>
                    </div>
                    <!--Team One Single End-->
                    <?php
                    }
                    ?>

                </div>
            </div>
        </section>
        <!--Team Page End-->

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