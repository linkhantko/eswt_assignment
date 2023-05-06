<?php
  include("header.php");

  if (isset( $_SESSION['dtg']))
      echo "<script>alert('Closure Date must be come first!!')</script>";
      unset($_SESSION['dtg']);
?>
<div class="pd-20 card-box mb-30">
           <div class="pd-20 card-box mb-30">
        <div class="clearfix">
          <div class="pull-left">
            <h4 class="text-blue h4">Set Date</h4>
          </div>
          <div class="pull-right">
            <a href="deadline" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
          </div>
        </div>
        </div>
         <form action="add_date.php" method="post" enctype="multipart/form-data">
           <div class="form-group row">
             <label class="col-sm-12 col-md-2 col-form-label">Closure End Date</label>
             <div class="col-sm-12 col-md-10">
               <input class="form-control date-picker" type="text" name="fstDate" required autocomplete="off">
             </div>
           </div>
           <div class="form-group row">
             <label class="col-sm-12 col-md-2 col-form-label"> Final Closure End Date</label>
             <div class="col-sm-12 col-md-10">
               <input class="form-control date-picker" type="text" name="finalDate" required autocomplete="off">
             </div>
           </div>
           <div class="form-group row">
             <label class="col-sm-12 col-md-2 col-form-label">Academic Year</label>
             <div class="col-sm-12 col-md-10">
               <input class="form-control" type="number" min="2000" max="2099" step="1" value="2020" name="academicyear"= required>
             </div>
           </div>

           <div class="form-group row">
             <div class="col-sm-12 col-md-10">
               <button type="submit" name="btnRegister" class="btn btn-primary">
                 Set End Date
               </button>
             </div>
           </div>

         </form>
<?php
  include("footer.php");
  ?>
