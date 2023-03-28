<?php
session_start();
require_once('databases.php');

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?php echo file_get_contents('title.txt');?></title>

      <!-- Bootstrap CSS CDN -->
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <link rel="stylesheet" href="assets/css/main.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
        
        
    </head>
    <body>

        <div class="wrapper">
            <!-- Sidebar Holder -->
             <?php 
            include('nab.php');
            ?>

            <!-- Page Content Holder -->
            <div id="content">

                <nav class="navbar navbar-default">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn btn-info navbar-btn">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                           <ul class="nav navbar-nav navbar-left">
                                <li id="navbar-logo"><?php echo file_get_contents('title.txt');?></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Inventory</a></li>
                                <li><a href="#">Sales order</a></li>
                                <li><a href="#">Invoice</a></li>
                                <li><a href="#">Challan</a></li>
                                <li><a href="#" data-toggle="popover" data-placement="bottom" data-trigger="click" data-html="true" data-content="<a href='logout.php'>Logout</a><br><hr><a href='password.php'>Change password</a>"><?php echo 'User: '.$_SESSION['user']; ?></a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <br>
                 <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Your Access is Denied</h2>
                    </div>
                </div>

              </div>
            </div>
        </div>



        <div class="overlay"></div>


          <!-- jQuery CDN -->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="assets/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
       

        <script type="text/javascript">
        $(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#dismiss, .overlay').on('click', function () {
                    $('#sidebar').removeClass('active');
                    $('.overlay').fadeOut();
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar').addClass('active');
                    $('.overlay').fadeIn();
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });
            });

         function login() {
            event.preventDefault()
            var name = $("#name").val();
            var pass = $("#password").val();


            if(name == ""){
              alert("Please enter username");
              return;
            } else if (pass == ""){
              alert("Please enter password");
              return;
            }
            // get values
            $.ajax({
                     
                     method: "post",
                     url: "login.php",
                     datatype: "html",
                     data: $('#loginform').serialize(),
                     success: function(data){
                         if(data == "login"){
                         window.location.replace("dashboard.php");
                         }

                     }
            });
  
}
        </script>
    </body>
</html>
