<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT * FROM article ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){

$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td >'.$row["title"].'</td>';
  $output1.='<td >'.$row["short_des"].'</td>';

  $output1.='<td><button type="button" onclick="itemGet('.$row["id"].')" class="btn btn-info" style="font-size:20px;padding:2px;" data-toggle="modal" data-target="#modal-item1"><i class="icon-info"></i></button><button type="button" onclick="deletem('.$row["id"].')" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>';
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
                <h3>ARTICLE SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">Article Id</th>
                      <th width="10%">Article Title</th>
                      <th width="6%">Short Description</th>
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
                <h4 class="modal-title">Article Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                      <label  for="menu_head">Article Title</label>
                      <input type="text" class="form-control square" id="title" name="title" placeholder="Enter Slider Caption">
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="short" name="short" placeholder="Enter Slider Caption">
                      </div>

                      <div class="form-group">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art" ></textarea>
                      </div>

                      


                      
                        <div class="form-group">
                        <label for="menu_title">Article Image</label>
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
              <div id="modal-item1" class="modal fade text-xs-left in" role="dialog" tabindex="-1" aria-labelledby="myModalLabel1"> 
          <div class="modal-dialog" role="document">
            <!-- Modal content-->
             <form method="post" class="form" id="frm_slider_setup1" name="frm_slider_setup1" enctype="multipart/form-data" >
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Article Edit</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                        <div id="im" >
                            
                          </div>
                      <label  for="menu_head">Article Title</label>
                      <input type="text" class="form-control square" id="title1" name="title1" placeholder="Enter Slider Caption">
                      <input type="hidden" class="form-control square" id="article_id" name="article_id" >
                      </div>
                    <!--end form group -->
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="short1" name="short1" placeholder="Enter Slider Caption">
                      </div>

                      <div class="form-group">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art1" ></textarea>
                      </div>

                      


                      
                        <div class="form-group">
                                                    
                        <label for="menu_title">Article Image</label>
                        <input type="file" id="img1" class="form-control square" name="img1">
                        
                        </div>
                       
                        </div>
                      
                        <div class="modal-footer">
                          
                          <button type="button" onclick="editItem()" class="btn btn-success btn-lg">Edit</button>
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
       <script>tinymce.init({selector: '#art'});tinymce.init({selector: '#art1'});</script>
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
    var short = $("#short").val();
    var art = tinymce.get("art").getContent();
   
    var img = $("#img").val();
    
   
    //var form1 = document.forms.namedItem("frm_slider_setup");
    //var data=new FormData(form1);
    



    if(title == ""){
      alert("title cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if(short == ""){
      alert("short description cannot be empty");
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
    var form1 = document.forms.namedItem("frm_slider_setup");   
    var data = new FormData(form1);
    data.append('art',art);
 
  request.open('POST', 'article_insert.php', true);
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

      function editItem(){
       
      var title = $("#title1").val();
    var short = $("#short1").val();
    var art = tinymce.get("art1").getContent();
   
    var img = $("#img1").val();
    
   
    //var form1 = document.forms.namedItem("frm_slider_setup");
    //var data=new FormData(form1);
    



    if(title == ""){
      alert("title cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if(short == ""){
      alert("short description cannot be empty");
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
    var form1 = document.forms.namedItem("frm_slider_setup1");   
    var data = new FormData(form1);
    data.append('art',art);
 
  request.open('POST', 'article_edit.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
    alertify.success('Article Edited');
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

      function itemGet(id){
      var id = id; 
       $("#article_id").val(id);
      
      function sentDataForEdit(){
      xmlhttp = new XMLHttpRequest();
      var url = "article_get.php?id="+id+"";
      xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      if(xmlhttp.responseText!==null){
        var item=JSON.parse(xmlhttp.responseText);
        $("#title1").val(item.title);
        $("#short1").val(item.short_des);
        tinymce.get("art1").setContent(item.details);
        
        if (item.img!="") {
          $("#im").html('<img class="rounded" src="'+item.img+'" style="margin-left: auto;margin-right: auto;display: block;height:150px;width:250px;">');
        }else{
          $("#im").html("<p>No image found</p>");
        }
        
      }else{
        console.log('test');
      }
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
             url: "article_delete.php",
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