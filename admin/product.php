<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT product.id,product.category,product.pname,product.des,product.image,product.ord,product.status,product_category.category AS cname FROM product,product_category WHERE product.category=product_category.id ORDER BY category";
$select_result = mysqli_query($connection, $query); 
while($row = mysqli_fetch_array($select_result)){

$output1.='<tr>';
   $output1.='<td >'.$row["ord"].'</td>';
  $output1.='<td >'.$row["cname"].'</td>';
    $output1.='<td >'.$row["pname"].'</td>';
   $output1.='<td >'.$row["des"].'</td>';
   $output1.='<td><a class="btn btn-warning btn-sm" href="service_edit.php?id='.$row["id"].'"><i class="icon-edit"></i></a></td>';
$output1.='</tr>';
$i++;
}
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

        
        <div class="card">
          <div class="card-body">
            <div class="row ">
              <div class="col-sm-8">
                <h3>SERVICE SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">Order</th>
                      <th width="25%">Category</th>
                      <th width="25%">Name</th>
                       <th width="30%">Description</th>
                      <th width="15%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php echo $output1; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
        <div id="modal-item" class="modal fade text-xs-left in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel1"> 
          <div class="modal-dialog" role="document">
            <!-- Modal content-->
             <form method="post" class="form" id="frm_product_setup" name="frm_product_setup" enctype="multipart/form-data" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Service Setup</h4>
              </div>
              
               <div class="modal-body">
                                    <!--end form group -->
                      <div class="form-group">
                      <select class="form-control rounded" id="cat" name="cat">
                         <option value="x"> -- Select a category-- </option>
                            <?php
                                $cquery = "SELECT * FROM product_category ORDER BY category ASC";  
                                $cresult = mysqli_query($connection, $cquery);  
                                while($crow = mysqli_fetch_array($cresult)){
                        ?>
                         <option value<?php echo "='".$crow['id']."'"?>><?php echo $crow['category']?></option>
                        <?php
                          }
                          ?>
                          </select>
                      </div>
                    <!--end form group -->
                    
                      <div class="form-group">
                      <label  for="menu_head">Service name</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Project Title">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Description</label>
                      <input type="text" class="form-control square" id="des" name="des" placeholder="Enter short description">
                    </div>
                   
                    <div class="form-group">
                      <label  for="menu_head">Display order</label>
                      <input type="text" class="form-control square" id="ord" name="ord" placeholder="Display order" value="0">
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Image</label>
                        <input type="file" id="img" class="form-control square" name="img">
                        </div>
                       <div class="col-sm-6">
                        <label  for="menu_status">Status</label>
                            <select class="form-control square" id="status" name="status">
                              <option value="Active">Active</option>
                              <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                        </div>
                      </div>
                       
                        
                        
                        </div>
                      
                          <!--end form group -->
                          
                       
                        
                        <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-md">Save</button>
                          <button type="button" class="btn btn-warning btn-md" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Cancel</button>
                        
                        </div>
                        
                    </div>
                    </form>
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
       <script>
    tinymce.init({
      selector: 'textarea',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );

 function addRecord() {
    alert(1);
    var title = $("#title").val();
    var detail = $("#des").val();
     var cat = $("#cat").val();
    var img = $("#img").val();
 
    if(title == ""){
      alert("Title cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (img ==""){
      alert("image cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (des ==""){
      alert("Please input details");
       console.log('success');
       console.log('failure');
       return false;
    } else if (cat=="x"){
      alert("Please select a category");
       console.log('success');
       console.log('failure');
       return false;
    } 
    // get values
function save() {
  if(window.XMLHttpRequest){
  request = new XMLHttpRequest();
  }
  else
  {
  request = new ActiveXObject("Microsoft.XMLHTTP");
  }
    var form1 = document.forms.namedItem("frm_product_setup");   
    var data = new FormData(form1);

 
  request.open('POST', 'product_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 alert(return_data);
  var output1='';
  if(return_data=="1"){
    alertify.success('Solution Saved');
    setTimeout(function(){location.reload()},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save();
    $('#modal-item').modal('hide');
      return;
   
}




        function deletem(id){
          var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "pro_cate_delete.php",
             data: data,
             success: function(data){
                 if(data == "1"){
                  alertify.success('deleted');
                  setTimeout(function(){location.reload()},1000);
                 }

             }
    });
        }

      </script>
    </body>
  </html>