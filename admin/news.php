<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');

$output1='';
$query = "SELECT * FROM news ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
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
                <h3>NEWS SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-sm-12">
              <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">News Id</th>
                      <th width="10%">News Title</th>
                      <th width="15%">Short Description</th>
                      <th width="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
              <?php
              $i=1;
                while($row = mysqli_fetch_array($select_result)){
              ?>

             <tr>
 <td><?php echo $i?></td>
 <td id="title<?php echo $row["id"]?>" contenteditable><?php echo $row["title"]?></td>
 <td id="short_des<?php echo $row["id"]?>" contenteditable><?php echo $row["summery"]?></td>
   
 <td><button type="button" onclick="info(<?php echo $row["id"]?>)" class="btn btn-info" style="font-size:20px;padding:2px;"><i class="icon-info"></i></button><button type="button" onclick="deletem(<?php echo $row["id"]?>)" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>
</tr>
              <?php
              $i++;
            }
              ?>
            </tbody></table></div>

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
                <h4 class="modal-title">News Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">News Title</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Slider Caption">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Summary</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art2" ></textarea>
                      </div>

                      <div class="form-group">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art" ></textarea>
                      </div>

                        <div class="form-group">
                        <label for="menu_title">News Image</label>
                        <input type="file" id="img" class="form-control square" name="img">
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
       <script>tinymce.init({selector: '#art'});tinymce.init({selector: '#art2'});</script>
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );

    function addRecord() {
    
    var title = $("#title").val();
 
    var art = tinymce.get("art").getContent();
   var art2 = tinymce.get("art2").getContent();
    var img = $("#img").val();
    
   
    //var form1 = document.forms.namedItem("frm_slider_setup");
    //var data=new FormData(form1);
    



    if(title == ""){
      alert("title cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if(art == ""){
      alert("Detals cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if(art2 == ""){
      alert("summery cannot be empty");
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
    data.append('art',art);
    data.append('art2',art2);
 
  request.open('POST', 'news_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
    alertify.success('Article Updated');
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
       
      var title = $("#title"+id).val();
 
    var art = tinymce.get("art"+id).getContent();
   
    var img = $("#img"+id).val();
    

    if(title == ""){
      alert("title cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if(art == ""){
      alert("Detals cannot be empty");
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
    var form1 = document.forms.namedItem("frm_edit"+id);   
    var data = new FormData(form1);
    data.append('art'+id,art);
    data.append('id',id);
 
  request.open('POST', 'news_edit.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
    alertify.success('News Edited');
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
             url: "news_delete.php",
             data: data,
             success: function(data){
                 if(data == "1"){
                  alertify.success('deleted');
                  setTimeout(function(){location.reload()},1000);
                 }

             }
    });
        }
        function info(id){
          url="news_info.php?nid="+id+"";
          window.location.href=url;
        }

      </script>
    </body>
  </html>