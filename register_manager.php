<?php
include('header.php');
 ?>
 <div class="pd-20 card-box mb-30">
            <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Manager Register Forms</h4>
           </div>
           <div class="pull-right">
             <a href="manager" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
           </div>
         </div>
         </div>
					<form action="add_manager.php" method="post" enctype="multipart/form-data">
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="name" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="email" name="email" required>
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Password</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="password" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="tel" name="phone" required>
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="text" name="address" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
							<div class="col-sm-12 col-md-10">
				                  <input type="radio" id="rgoMale" name="gender" value="Male" checked>
				                  <label for="rgoMale">Male</label>
				                  <input type="radio" id="rgoFemale" name="gender" value="Female">
				                  <label for="rgoFemale">Female</label>
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Photo</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" type="file" name="photo" required>
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
