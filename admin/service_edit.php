<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$sr = $_GET['id'];
$query = "SELECT * FROM product WHERE id=$sr";
$select_result = mysqli_query($connection, $query);
$drow = mysqli_fetch_array($select_result);
?>

<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <!-- main menu header-->
  <div class="main-menu-header">
    <input type="text" placeholder="Search" class="menu-search form-control round"/>
  </div>
  <!-- / main menu header-->
  <!-- main menu content-->
  <?php
  include('sideber.php');
  ?>
  <!-- /main menu content-->
  <!-- main menu footer-->
  <!-- include includes/menu-footer-->
  <!-- main menu footer-->
</div>
<div class="app-content content container-fluid">
  <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
      <div class="container">
        
        <div class="card">
          <div class="card-body">
            <div class="row ">
              <div class="col-sm-8">
                <h3>SERVICE EDIT</h3>
              </div>
              <div class="col-sm-4">
               
              </div>
              </div>
               <div class="row ">
              <div class="col-lg-8 col-md-8">
                             <form method="post" class="form" id="frm_slider_setup" name="frm_slider_setup" enctype="multipart/form-data" action="service_update.php">
                                      <div class="form-group">
                       <input type="text" class="form-control square" id="name" name="name" placeholder="Service name" value="<?php echo $drow['pname'] ?>">
                        <input type="hidden" class="form-control square" id="idd" name="idd" placeholder="Doctor name" value="<?php echo $drow['id'] ?>">
                      </div>
                    <!--end form group -->
                      <div class="form-group">
                     <input type="text" class="form-control square" id="detail" name="detail" placeholder="Service details" value="<?php echo $drow['des'] ?>">
                      </div>
                    <!--end form group -->
                      <div class="form-group">
                      <select class="form-control rounded" id="dept" name="dept">
                        
                            <?php
                                $query = "SELECT * FROM product_category ORDER BY category ASC";  
                                $select_result = mysqli_query($connection, $query);  
                                while($xrow = mysqli_fetch_array($select_result)){
                                   if( $drow['category'] ==  $xrow['id']){
                                            $sel = "selected";
                                        }  else{
                                            $sel = "";
                                    }
                        ?>
                         <option value<?php echo "='".$xrow['id']."' ".$sel;?>><?php echo $xrow['category']?></option>
                        <?php
                          }
                          ?>
                          </select>
                      </div>
                    <!--end form group -->
                                          
                        <div class="form-group">
                         <input type="file" id="img" class="form-control square" name="img">
                        </div>
                      <!--end form group -->
                       <div class="form-group">
                     <input type="text" class="form-control square" id="ord" name="ord" placeholder="Service details" value="<?php echo $drow['ord'] ?>">
                      </div>
                                                <!--end form group -->
                        <div class="form-group">   
                          <?php 
                          if($drow['status']=="Active"){
                            $a="selected";$h="";$i="";
                          }else if ($drow['status']=="Inactive") {
                            $a="";$i="selected";
                          }
                          ?>
                        <select class="form-control square" id="status" name="status">
                           <option <?php echo $a; ?>>Active</option>
                           <option <?php echo $i; ?>>Inactive</option>

                        </select>              
                        </div>
                        <button type="button" class="btn btn-warning" onclick="addRecord();">Update</button>&nbsp;&nbsp;<button type="submit" class="btn btn-danger">Delete</button>

              </div>
                <div class="col-sm-4">
                  <div class="row">
                  <img class="img-responsive" src="<?php echo $drow['image'] ?>" style="width:250px;">
                </div>
                </div>
             </div> 
            </div>
          </div>
        </div>

            </div>
          </div>
        </div>
      </div>
      <div class="overlay"></div>
      <!-- jQuery CDN -->
      <?php
      include('footer.php');
      ?>
      
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );

    function addRecord() {
    
    var name = $("#name").val();
    var detail = $("#detail").val();
     var dept = $("#dept").val();
    var img = $("#img").val();
    
   if(name == ""){
      alert("Name cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (img ==""){
      alert("No image added. Updating without image");
      
    } else if (detail ==""){
      alert("Please input details");
       console.log('success');
       console.log('failure');
       return false;
    } else if (dept =="x"){
      alert("Please select a department");
       console.log('success');
       console.log('failure');
       return false;
   } 
   $( "#frm_slider_setup" ).submit();
}

      function editItem(id){
      var id = id;
      //  alert($('istock'+id).text());
      var caption = $('#caption'+id).text();
      
      
      
      
      function sentDataForEdit(){
      xmlhttp = new XMLHttpRequest();
      var url = "solution_edit.php?id="+id+"&caption="+caption+"";
      xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      alertify.success('Edited');
      setTimeout(function() {
      
      window.location.reload();
      }, 1000);
      }
      }
      xmlhttp.open("GET",url, true);
      xmlhttp.send();
      }
      sentDataForEdit();
      }
  
        function deletem(id){
          var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "solution_delete.php",
             data: data,
             success: function(data){
                 if(data == "1"){
                  alertify.success('deleted');
                  //setTimeout(function(){location.reload()},1000);
                 }

             }
    });
        }

      </script>
    </body>
  </html>