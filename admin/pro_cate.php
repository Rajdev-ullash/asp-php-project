<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM product_category ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){

$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td >'.$row["category"].'</td>';
   $output1.='<td >'.$row["des"].'</td>';
  $output1.='<td><button type="button" onclick="deletem('.$row["id"].')" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>';
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
      <div class="container">
        
        <div class="card">
          <div class="card-body">
            <div class="row ">
              <div class="col-sm-8">
                <h3>CATEGORY SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">Category Id</th>
                      <th width="10%">Category</th>
                       <th width="10%">Description</th>
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
                <h4 class="modal-title">Category Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">Category Title</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Project Title">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="short_des" name="short_des" placeholder="Enter short description">
                    </div>

                       <div class="form-group">
                      <label  for="menu_head">Display order</label>
                      <input type="text" class="form-control square" id="ord" name="ord" placeholder="Display order">
                      </div>
                        <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                        <label for="menu_title">Image</label>
                        <input type="file" id="img" class="form-control square" name="img">
                        </div>
                          <div class="col-sm-6">
                        <label for="menu_title">Icon</label>
                        <input type="file" id="icn" class="form-control square" name="icn">
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
         // alert(1);
    var caption = $("#title").val();
    var img = $("#img").val();
    var status = $("#icn").val();

    //var form1 = document.forms.namedItem("frm_product_setup");
    //var data=new FormData(form1);
    
    if(caption == ""){
      alert("caption cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (img ==""){
      alert("imgage cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (icn ==""){
      alert("status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }
    // get values
    function save() {

      //alert(2);
  if(window.XMLHttpRequest){
  request = new XMLHttpRequest();
  }
  else
  {
  request = new ActiveXObject("Microsoft.XMLHTTP");
  }
    var form1 = document.forms.namedItem("frm_product_setup");   
    var data = new FormData(form1);
   // data.append('art',art);
 
  request.open('POST', 'category_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 //alert(return_data);
  var output1='';
  if(return_data=="1"){

 // alertify.success('Product Added');
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