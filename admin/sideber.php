	<?php 
						
                         $oldheader = "";
                         $thisheader = "";
                         $level=$_SESSION['ulevel'];
                         $output='';
                         
                         if ($level=='1') {
                           $menuquery = "SELECT * FROM menu WHERE status='1' ORDER BY menuorder";  

                         } else if($level=='2') {
                           $menuquery = "SELECT * FROM menu WHERE status='1' AND access='2' OR access='0' ORDER BY menuorder";  
                         }
                         
                         
                         $menuresult = mysqli_query($connection, $menuquery); 
                         $i = 1;
                          $output='<ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main"><li class=" nav-item"><a href="home.php"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
							</li>';
                         while($row = mysqli_fetch_array($menuresult)){
                         
                         $thisheader=$row["head"];

                        if(strcmp($oldheader, $thisheader)!=0){
                        if ($i>1){
                       	$output.='</ul></li>';
                        
                        }
                        $output.='<li class=" nav-item">';
                        $output.='<a href="#"><i class="icon-stack-2"></i><span data-i18n="nav.page_layouts.main" class="menu-title">'.ucwords($thisheader).'</span></a>';
                        $output.= '<ul class="menu-content">';
                        
                        $oldheader = $thisheader;
                        }
                          $link = $row["link"];
                          $text = $row["menutext"];
                          $filename=$link.".php";
                          if(strcmp(basename($_SERVER['PHP_SELF']),$filename)!=0){
                           $output.='<li><a href="'.$filename.'" data-i18n="nav.page_layouts.1_column" class="menu-item">'.$text.'</a></li>';
                          }else{
                          $output.='<li><a href="#" data-i18n="nav.page_layouts.1_column" class="menu-item">'.$text.'</a></li>';
                          }
                         
                           $i++;
                           
                       } 
                       $output.='</ul>';
                       ?> 
<div class="main-menu-content">
	
        <?php echo $output;?>


</div>
<!-- /main menu content-->
<!-- main menu footer-->
<!-- include includes/menu-footer-->
<!-- main menu footer-->
</div>
  