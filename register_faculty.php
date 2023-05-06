<?php 
include('header.php');
 ?>
 <div class="pd-20 card-box mb-30">
            <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Faculties Register Forms</h4>
           </div>
           <div class="pull-right">
             <a href="faculties" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
           </div>
         </div>
         </div>
					<form action="add_faculty.php" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="faculty" required>
							</div>
						</div>
            <div class="form-group row">
							<div class="col-sm-12 col-md-10">
								<button type="submit" name="btnRegister" class="btn btn-primary">
                  Register
                </button>
							</div>
						</div>
          </form>
 <?php
include('footer.php');
  ?>
