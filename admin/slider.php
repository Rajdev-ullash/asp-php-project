<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM slider ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){
if ($row["status"] == "1") {
$a='<option value="">---Select Status---</option><option value="1" selected>Active</option><option value="0" >Inactive</option>';
}else if ($row["status"] == "0") {
$a='<option value="">---Select Status---</option><option value="1">Active</option><option value="0" selected>Inactive</option>';
}
$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td id="caption'.$row["id"].'" contenteditable>'.$row["caption"].'</td>';
  $output1.='<td id="image'.$row["id"].'"><img src="'.$row["image"].'" height="140" width="320"></td>';
    $output1.='<td>';
    $output1.='<select  id="status'.$row["id"].'" name="status" style="width:70px;">';
      $output1.=$a;
    $output1.='</select>';
  $output1.='</td>';
  $output1.='<td><button type="button" onclick="editItem('.$row["id"].')" class="btn btn-info" style="font-size:20px;padding:2px;"><i class="icon-edit"></i></button><button type="button" onclick="deletem('.$row["id"].')" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>';
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
                <h3>SLIDER SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">slide Id</th>
                      <th width="10%">Slide Caption</th>
                      <th width="6%">Image</th>
                      <th width="10%">Status</th>
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
        <div id="modal-item" class="modal fade text-xs-left in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel1"> 
          <div class="modal-dialog" role="document">
            <!-- Modal content-->
             <form method="post" class="form" id="frm_slider_setup" name="frm_slider_setup" enctype="multipart/form-data" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Slider Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">Slider Caption</label>
                      <input type="text" class="form-control square" id="caption" name="caption" placeholder="Enter Slider Caption">
                      </div>
                    <!--end form group -->
                    
                      
                        <div class="form-group">
                        <label for="menu_title">Slider Image</label>
                        <input type="file" id="img" class="form-control square" name="img">
                        </div>
                      <!--end form group -->
                       
                          
                        <div class="form-group ">
                            <label  for="menu_status">Slider Status</label>
                            <select class="form-control square" id="status" name="status">
                              <option value="">---Select Status---</option>
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                       </div>
                        
                        </div>
                      
                          <!--end form group -->
                          
                       
                        
                        <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Save</button>
                          <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal">Reset</button>
                          <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Cancel</button>
                        
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
    
    var caption = $("#caption").val();
    var img = $("#img").val();
    var status = $("#status").val();
   
    //var form1 = document.forms.namedItem("frm_slider_setup");
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
    } else if (status ==""){
      alert("status cannot be empty");
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
    var form1 = document.forms.namedItem("frm_slider_setup");   
    var data = new FormData(form1);

 
  request.open('POST', 'slider_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
    alertify.success('slider Saved');
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

      function editItem(id){
      var id = id;
      //  alert($('istock'+id).text());
      var caption = $('#caption'+id).text();
      var status = $('#status'+id).val();
      
      
      
      function sentDataForEdit(){
      xmlhttp = new XMLHttpRequest();
      var url = "slider_edit.php?id="+id+"&caption="+caption+"&status="+status+"";
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
             url: "slider_delete.php",
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