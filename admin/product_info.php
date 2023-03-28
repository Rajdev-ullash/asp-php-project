<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$id=$_GET['product_id'];
$b[]='';
$k=1;
$j=1;
$query = "SELECT * FROM product WHERE id='$id'";
$select_result = mysqli_query($connection, $query);
$categoryquery = "SELECT * FROM product_category ORDER BY id DESC";

$category_result = mysqli_query($connection, $categoryquery);
while($row1 = mysqli_fetch_array($category_result)){

$b[$k]=$row1['category'];
$k++;
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
            <div class="row">
              <div class="col-xs-12">
              <ul class="nav nav-tabs">
            <li id="li_new" class="active"><a href="javascript:void(0)" onclick="anew()">Product Edit</a></li>
            <li id="li_onprocess"><a href="javascript:void(0)" onclick="aonpross()">Sub Image Add</a></li>
          </ul>
          <br>
        </div>
            </div>
            <div class="row " id="edit" style="display: block;">
              <div class="col-sm-8">
                <h3>PRODUCT SETUP</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <div class="col-lg-12 col-md-12">
                <form method="post" class="form" id="frm_product_setup" name="frm_product_setup" >
                <?php
                while($row = mysqli_fetch_array($select_result,MYSQLI_ASSOC)){
                  ?>
                  <div class="row">
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label  for="menu_head">Product Title</label>
                      <input type="text" class="form-control square" id="title" name="title" value="<?php echo $row['title'] ;?>">
                      <input type="hidden" id="pro_id1" class="form-control square" name="pro_id1" value="<?php echo $id;?>">
                      </div>
                    </div>
                    <!--end form group -->
                   
                    <div class="col-sm-6">
                    <div class="form-group">
                      <label  for="menu_head">Short Description</label>
                      <input type="text" class="form-control square" id="short_des" name="short_des" value="<?php echo $row['short_des']; ?>">
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                      <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="art" ><?php echo $row['details'] ;?></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label  for="menu_head">Image : </label>
                        <?php
                        if ($row['main_image']=='null') {
                         echo "<p>No Image Found</p>";
                        } else {
                          echo '<img src="'.$row['main_image'].'" style="height: 150px;">';
                        }
                        
                        
                        ?>
                        
                      </div>
                    </div>
                    
                  </div>
                        <div class="form-group">
                        <div class="row">
                        <div class="col-sm-4">
                        <label for="menu_title">Product status</label>
                        <select id="status" class="form-control square" name="status">
                          <option value="">--select status--</option>
                          <option value="Active"<?php echo (($row['status'])=='Active')? 'selected':''; ?>>Active</option>
                          <option value="Inactive" <?php echo (($row['status'])=='Inactive')? 'selected':''; ?>>Inactive</option>
                        </select>
                        </div>
                        <div class="col-sm-4">
                        <label for="menu_title">Product Image</label>
                        <input type="file" id="img" class="form-control square" name="img">
                        </div>
                        <div class="col-sm-4">
                        <label for="menu_title">Product category</label>
                        <select id="category" class="form-control square" name="category">
                          <option value="">--select category--</option>
                          <?php 
                                for($j=1;$j<count($b);$j++){
                                if ($row["category"]==$b[$j])
                                {
                                echo '<option value="'.$b[$j].'" selected>'.$b[$j].'</option>';
                                }else if ($row["category"]!=$b[$j]){
                                echo '<option value="'.$b[$j].'">'.$b[$j].'</option>';
                                
                                }
                                
                                }
                          ?>
                        </select>
                        </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-4">
                        <label for="menu_title">Made By</label>
                        <input type="text" id="made" class="form-control square" name="made" value="<?php echo $row['made_by']; ?>">
                        </div>
                        <div class="col-sm-4">
                        <label for="menu_title">Product Latest</label>
                        <select id="latest" class="form-control square" name="latest">
                          <option value="">--select Latest--</option>
                          <option value="Yes" <?php echo (($row['latest'])=='Yes')? 'selected': '' ;?>>Yes</option>
                          <option value="No" <?php echo (($row['latest'])=='No')? 'selected': '';?>>No</option>
                        </select>
                        </div>
                        <div class="col-sm-4">
                        <label for="menu_title">Product fetured</label>
                        <select id="featured" class="form-control square" name="featured">
                          <option value="">--select Latest--</option>
                          <option value="Yes" <?php echo (($row['featured'])=='Yes')? 'selected': '' ;?>>Yes</option>
                          <option value="No" <?php echo (($row['featured'])=='No')? 'selected': '';?>>No</option>
                        </select>
                        </div>
                        </div>
                      <!--end form group -->
                       
                      </div>
                      <?php
                      }
                      ?>
                      <div class="form-group">
                      <button type="button" onclick="addRecord()" class="btn btn-success btn-lg">Edit</button>
                    </div>
                      </form>
              </div>
            
            </div>
          
            
              <div class="row" id="psi" style="display: none;">
                <div class="col-sm-8">
                <h3>PRODUCT SUB IMAGE</h3>
              </div>
              <div class="col-sm-4">
              </div>
              <br>
                <form method="post" class="form" id="frm_img" name="frm_img" >
                   <div class="col-sm-6">
                      <label for="menu_title">Product Sub Image</label>
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
                $query="SELECT * FROM product_image where product_id='$id'";
                $select_result=mysqli_query($connection, $query);
                while($row1 = mysqli_fetch_array($select_result)){
                  ?>
                  <tr>
                    <td><img src="<?php echo $row1['sub_image']; ?>" style="height: 150px;width:300px"></td>
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
      <script>tinymce.init({selector: '#art'});</script>
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
 
  request.open('POST', 'product_edit.php', true);
  request.onload = function () {
  if(request.status !== 200){
  return;
  }
  var return_data = request.responseText;
 
  var output1='';
  if(return_data=="1"){
  alertify.success('Product Updated');
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
        window.location.href='product_info.php?product_id='+id;
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
    
 
  request.open('POST', 'product_img_insert.php', true);
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
             url: "product_si_delete.php",
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