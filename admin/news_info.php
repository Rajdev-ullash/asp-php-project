<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$id=$_GET['nid'];
$b[]='';
$k=1;
$j=1;
$query = "SELECT * FROM news WHERE id='$id'";
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
            <div class="row">
              <div class="col-xs-12">
              <ul class="nav nav-tabs">
            <li id="li_new" class="active"><a href="javascript:void(0)" onclick="anew()">Details Edit</a></li>
            <li id="li_onprocess"><a href="javascript:void(0)" onclick="aonpross()">Sub Image Add</a></li>
          </ul>
          <br>
        </div>
            </div>
            <div class="row " id="edit" style="display: block;">
              <div class="col-sm-8">
                <h3>News SETUP</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-lg-12 col-md-12">
                <?php
              $i=1;
                $row = mysqli_fetch_array($select_result)
              ?>
                <h3>News: <?php echo $i?></h3>
                <form method="post" class="form" id="frm_edit<?php echo $row['id']?>" name="frm_edit<?php echo $row['id']?>" enctype="multipart/form-data" >
                  <div class="row">
                  
                <div class="form-group  col-sm-12">
                      <label  for="menu_head">News Title</label>
                      <input type="text" class="form-control square" id="title<?php echo $row['id']?>" name="title<?php echo $row['id']?>" value="<?php echo $row['title']?>">
                      </div>
                    <!--end form group -->
                    
                  <div class="col-lg-6 col-md-6">
                  <div class="form-group">
                      <label  for="menu_head">Summary</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art2" ><?php echo $row['summery']?></textarea>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="form-group">
                        <label for="menu_title">News Image</label>
                        <input type="file" id="img<?php echo $row['id']?>" class="form-control square" name="img<?php echo $row['id']?>">
                        </div>
                    
                      <div class="form-group">
                        <label  for="menu_head">Image : </label>
                        <?php
                        if ($row['img']=='null') {
                         echo "<p>No Image Found</p>";
                        } else {
                          echo '<img src="'.$row['img'].'" style="height: 150px;width:80%">';
                        }
                        
                        
                        ?>
                        
                      </div>
                    </div>
                      <div class="form-group col-sm-12">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art<?php echo $row['id']?>" ><?php echo $row['details']?></textarea>
                      </div>
                        <div class="form-group col-sm-12">
                        <button type="button" onclick="editItem(<?php echo $row['id']?>)" class="btn btn-success btn-lg"><i class="icon-edit"></i></button>
                        <button type="button" onclick="deletem(<?php echo $row['id']?>)" class="btn btn-danger btn-lg" ><i class="icon-trash"></i></button>
                      </div>
                    </form>
                  </div></div>
              <script>tinymce.init({selector: '#art<?php echo $row['id']?>'});tinymce.init({selector: '#art2'});</script>
            </form></div>
              <div class="row" id="psi" style="display: none;">
                <div class="col-sm-8">
                <h3>NEWS SUB IMAGE</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <br>
                <form method="post" class="form" id="frm_img" name="frm_img" >
                   <div class="col-sm-6">
                      <label for="menu_title">News Sub Image</label>
                      <input type="file" id="subimg" class="form-control square" name="subimg">
                      <input type="hidden" id="pro_id" class="form-control square" name="pro_id" value="<?php echo $id;?>">
                   </div>
                   <div class="col-sm-6">
                    <br>
                     <button type="button" onclick="addimg()" class="btn btn-success btn-lg" style="margin-top: 5px;">Save</button>
                   </div>
                  </form>
              </div>
              <br><br>
              <div class="row" id="psl" style="display: none;">
                <div class="col-sm-8">
                <h3>IMAGE LIST</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                <thead>
                  <tr>
                    <th style="width:50%;">Picture</th>
                    <th style="width:50%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                $query="SELECT * FROM news_image where nid='$id'";
                
                $select_result=mysqli_query($connection, $query);
                while($row1 = mysqli_fetch_array($select_result)){
                  ?>
                  <tr>
                    <td><img src="<?php echo $row1['image']; ?>" style="height: 150px;width:300px"></td>
                    <td><button type="button" onclick="deletesm(<?php echo $row1['id'];?>)" class="btn btn-danger" style="margin-left:10px;font-size:20px;padding:2px;"><i class="icon-trash"></i></button></td>                         
                </tr>
                <?php
                  }
                  ?>
                </tbody>
              </table>
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
      <script>tinymce.init({selector: '#art'});tinymce.init({selector: '#art2'});</script>
      <script type="text/javascript">
      // ----------------- my functions ---------------------
      
      function openmodal(){
      $("#modal-item").modal();
      }
      $(document).ready(function() {
      $('#example').DataTable();
      } );


   function anew(){
      document.getElementById("li_new").classList.add('active');
      document.getElementById("li_onprocess").classList.remove('active');
      document.getElementById("edit").style.display="block";
      document.getElementById("psi").style.display="none";
      document.getElementById("psl").style.display="none";
    }
    function aonpross(){
     document.getElementById("li_new").classList.remove('active');
      document.getElementById("li_onprocess").classList.add('active');
      document.getElementById("edit").style.display="none";
      document.getElementById("psi").style.display="block";
      document.getElementById("psl").style.display="block";
    }

    function addRecord() {
    
    var caption = $("#caption").val();
    
    var status = $("#status").val();
   var art = tinymce.get("art").getContent();
   var art1 = tinymce.get("art1").getContent();
   var made = $("#made").val();
   var latest = $("#latest").val();
    var featured = $("#featured").val();
    //var form1 = document.forms.namedItem("frm_product_setup");
    //var data=new FormData(form1);
    



    if(caption == ""){
      alert("caption cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   } else if (status ==""){
      alert("status cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (made ==""){
      alert("made cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    } else if (latest ==""){
      alert("latest cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }else if (featured ==""){
      alert("featured cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
    }
    // get values
    function save1() {
  if(window.XMLHttpRequest){
  request = new XMLHttpRequest();
  }
  else
  {
  request = new ActiveXObject("Microsoft.XMLHTTP");
  }
    var form1 = document.forms.namedItem("frm_product_setup");   
    var data = new FormData(form1);
    data.append('art',art);
    data.append('art1',art1);
 
  request.open('POST', 'news_edit.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('News Updated');
    setTimeout(function(){location.reload()},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save1();
  
    
}

          function editItem(id){
       
      var title = $("#title"+id).val();
 
    var art = tinymce.get("art"+id).getContent();
   var art2 = tinymce.get("art2").getContent();
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
    data.append('art2',art2);
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

        function addimg() {
    
    var subimg = $("#subimg").val();
    




    if(subimg == ""){
      alert("subimg cannot be empty");
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
    var form1 = document.forms.namedItem("frm_img");   
    var data = new FormData(form1);
    
 
  request.open('POST', 'news_img_insert.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('Picture Added');
    setTimeout(function(){location.reload()},1000);
  }else{
  //document.getElementById('n').style.display="block";
  }
  };
  request.send(data);
  }
    save();
  
    
}
function deletesm(id){
  var data={"id":id}
          $.ajax({
             
             method: "post",
             url: "news_si_delete.php",
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