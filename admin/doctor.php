<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT id,name,details,dept,image,keywords,status,department FROM doctor,department WHERE dept=did ORDER BY id DESC";
$select_result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($select_result)){

$output1.='<tr>';
  $output1.='<td>'.$i.'</td>';
  $output1.='<td>'.$row["name"].'</td>';
  $output1.='<td>'.$row["details"].'</td>';
  $output1.='<td>'.$row["department"].'</td>';
  $output1.='<td>'.$row["image"].'</td>';
  $output1.='<td>'.$row["keywords"].'</td>';
  $output1.='<td>'.$row["status"].'</td>';
  $output1.='<td><a class="btn btn-warning btn-sm" href="doctor_edit.php?id='.$row["id"].'"><i class="icon-edit"></i></a></td>';
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
                <h3>DOCTOR SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                      <th width="5%">Sl#</th>
                      <th width="20%">Name</th>
                      <th width="20%">Detail</th>
                      <th width="10%">Department</th>
                       <th width="10%">Image</th>
                        <th width="15%">Keywords</th>
                         <th width="10%">Status</th>
                          <th width="5%">Action</th>
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
             <form method="post" class="form" id="frm_slider_setup" name="frm_slider_setup" enctype="multipart/form-data">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Doctor Setup</h4>
              </div>
              
               <div class="modal-body">
                    
                      <div class="form-group">
                       <input type="text" class="form-control square" id="name" name="name" placeholder="Doctor name">
                      </div>
                    <!--end form group -->
                      <div class="form-group">
                     <input type="text" class="form-control square" id="detail" name="detail" placeholder="Doctor details">
                      </div>
                    <!--end form group -->
                      <div class="form-group">
                      <select class="form-control rounded" id="dept" name="dept">
                         <option value="x"> -- Select a department-- </option>
                            <?php
                                $query = "SELECT * FROM department ORDER BY department ASC";  
                                $select_result = mysqli_query($connection, $query);  
                                while($row = mysqli_fetch_array($select_result)){
                        ?>
                         <option value<?php echo "='".$row['did']."'"?>><?php echo $row['department']?></option>
                        <?php
                          }
                          ?>
                          </select>
                      </div>
                    <!--end form group -->
                     <div class="form-group">
                         <label  for="menu_head">Details</label>
                      <textarea rows="6" cols="50" class="form-control square" id="history" name="history"></textarea>
                    </div>
                       <!--end form group -->
                        <div class="form-group">
                        <input type="text" class="form-control square" id="keywords" name="keywords" placeholder="Keywords (for search)">
                        </div>
                    
                      
                        <div class="form-group">
                         <input type="file" id="img" class="form-control square" name="img">
                        </div>
                      <!--end form group -->
                                                <!--end form group -->
                        <div class="form-group">   
                        <select class="form-control square" id="status" name="status">
                           <option>Active</option>
                            <option>Homepage</option>
                           <option>Inactive</option>

                        </select>              
                        </div>
                       
                        </div>
                      

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
   tinymce.get('history').save();
    var name = $("#name").val();
    var detail = $("#details").val();
     var dept = $("#dept").val();
    var img = $("#img").val();
    
   
    //var form1 = document.forms.namedItem("frm_slider_setup");
    //var data=new FormData(form1);
    



    if(name == ""){
      alert("Name cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
   }else if (img ==""){
      alert("image cannot be empty");
       console.log('success');
       console.log('failure');
       return false;
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

 
  request.open('POST', 'doctor_insert.php', true);
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