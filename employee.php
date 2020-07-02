<?php session_start();
if (!isset($_SESSION['admin_id'])) {
  header("location:itlogin.php");
}
?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">

    <?php include_once("./templates/sidebar.php"); ?>


    <div class="row">
      <div class="col-10">
        <h2 style="text-align: center; font-family: Montserrat-Light; font-size: 40px; font-weight: bold;">Manage Employees</h2>
      </div>
      <br>
      <br>
      <br>
      <div class="col-2">
        <a href="#" style="font-family: Montserrat-Light; font-size: 24px;" data-toggle="modal" data-target="#add_category_modal" class="btn btn-primary btn-sm">Add Employee</a>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm" style="font-family: Montserrat-Light; font-size: 24px;">
        <thead>
          <tr>
            <th>Employee Name</th>
            <th>Email Address</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="category_list" style="font-size: 22px;">
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="article_name" class="form-control" placeholder="Enter Employee Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="artiname" class="form-control" placeholder="Enter Email Address">
              </div>
            </div>
            <input type="hidden" name="add_category" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary add-category">Add Employee</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!--Edit category Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Yarn Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label>Employee Name</label>
                <input type="text" name="e_cat_title" class="form-control" placeholder="Enter Employee Name">
              </div>
            </div>
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label>Email Address</label>
                <input type="text" name="e_artiname" class="form-control" placeholder="Enter Email Address">
              </div>
            </div>
            <input type="hidden" name="edit_category" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-category-btn">Update Employee Details</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/employee.js"></script>