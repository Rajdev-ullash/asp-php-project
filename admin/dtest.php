<?php
include_once('header.php');
require_once('databases.php');
include('checkLogin.php');
$i=1;
$output1='';
$query = "SELECT services.sname, tests.* FROM tests INNER JOIN services ON services.sid = tests.servicehead ORDER BY tests.tdes DESC";
$result = mysqli_query($connection, $query);
while($row = mysqli_fetch_array($result))
{
 $output1 .= '
    
    <tr>
    <td>'.$i.'</td>
    <td>'.$row["tname"].'</td>
    <td>'.$row["sname"].'</td>
    <td>'.$row["tdes"].'</td>
    <td><button type="button" name="edit" value="Edit" id="'.$row["testid"].'" class="btn btn-warning btn-xs edit">Edit</button>
    <button type="button" name="delete" value="Delete" id="'.$row["testid"].'" class="btn btn-danger btn-xs delete">Delete</button>
    </td>
    
    </tr>
 
 ';
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
                <h3>DEPARTMENT SETUP</h3>
              </div>
              <div class="col-sm-4">
                <button type="button" class="btn btn-success pull-right mb" id="btnaddnew" data-toggle="modal" data-target="#modal-item">Add new</button>
              </div>
              <div class="col-lg-12 col-md-12">
                <table id="example" class="table table-striped table-bordered dt-responsive"  style="width:100%">
                  <thead>
                    <tr>
                        <th>SL</th>
                        <th>Service Name</th>
                        <th>Test Name</th>
                        <th>Test Order</th>
                        <th>Action</th>
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
                <h4 class="modal-title">ADD DEPARTMENT</h4>
              </div>
              
               <div class="modal-body">
                      <div class="form-group">
                        <label  for="menu_head">Test Name</label>
                        <input type="text" class="form-control" id="test_name" name="test_name" placeholder="Enter Test Name">
                      </div>
                    
                      <div class="form-group">
                      <label  for="menu_head">Select your service</label>

                      <select class="form-control" name="service_id" id="service_id">
                        <option value="">Select Service</option>
                        <?php
                        $query = "SELECT * FROM services ORDER BY ord DESC";
                        $result = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_array($result))
                        {
                            echo '<option value="'.$row["sid"].'">'.$row["sname"].'</option>';
                        }
                        ?>
                      </select>
                      
                      </div>
                      <div class="form-group">
                        <label for="">Test Order</label>
                       <input type="number" class="form-control" name="test_order" id="test_order" >
                      </div>
                      
                      
                      
                      
                    <!--end form group -->
                  
                       
                        </div>
                      
                          <!--end form group -->
                          
                       
                        
                        <div class="modal-footer">
                          
                          <button type="button" onclick="addRecord()" name="submit" class="btn btn-success btn-lg">Save</button>
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

        var test_name = $("#test_name").val();

        var service_id = $("#service_id").val();


        var test_order = $("#test_order").val();

        console.log(typeof test_order );
     
        // if(test_name == "" || service_id == "" || test_description == ""){
        //   alertify.error('Please fill all the fields');
        // }else{

            var form = $('#frm_slider_setup')[0];
            var data = new FormData(form);
            data.append("test_name", test_name);
            data.append("service_id", service_id);
            data.append("test_order", test_order);
            $.ajax({
                type: "POST",
                url: "dtest_insert.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 600000,
                success: function (data) {
                    alertify.success('Added');
                    setTimeout(function() {
                      window.location.reload();
                    }, 1000);
                },
                error: function (e) {
                    alertify.error('Error');
                }
            });

        // }
    
   
    
  }

      function editItem(id){
      var id = id;
      //  alert($('istock'+id).text());
      var caption = $('#caption'+id).text();
      
      
      
      
      function sentDataForEdit(){
      xmlhttp = new XMLHttpRequest();
      var url = "department_edit.php?id="+id+"&caption="+caption+"";
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