<?php
include("header.php");

$id =$_GET['id'];

$sql="SELECT * FROM users WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();

$manager = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
 <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Manager Edit Form</h4>
							<!-- <p class="mb-30">All bootstrap element classies</p> -->
						</div>
            <div class="pull-right">
							<a href="manager" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
						</div>
					</div>
          <br>
					<form action="update_manager.php" method="post" enctype="multipart/form-data">

            <input type="text" name="OldPhoto" value="<?= $manager['photo'] ?>" hidden>
            <input type="text" name="id" value="<?= $manager['id'] ?>" hidden>

						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Photo</label>
							<div class="col-sm-12 col-md-10">
								<!-- <input class="form-control" type="text" placeholder="Johnny Brown"> -->
                <div class="pd-20 card-box">
                							<h5 class="h4 text-blue mb-20">Custom vertical Tab</h5>
                							<div class="tab">
                								<div class="row clearfix">
                									<div class="col-md-3 col-sm-12">
                										<ul class="nav flex-column vtabs nav-tabs customtab" role="tablist">
                											<li class="nav-item">
                												<a class="nav-link active" data-toggle="tab" href="#home4" role="tab" aria-selected="true">OldPhoto</a>
                											</li>
                											<li class="nav-item">
                												<a class="nav-link" data-toggle="tab" href="#profile4" role="tab" aria-selected="false">NewPhoto</a>
                											</li>
                										</ul>
                									</div>
                									<div class="col-md-9 col-sm-12">
                										<div class="tab-content">
                											<div class="tab-pane fade show active" id="home4" role="tabpanel">
                												<div class="pd-20">
                                          <img src="<?php echo $manager['photo']; ?>" width="80px" alt="" width="200px">
                												</div>
                											</div>
                											<div class="tab-pane fade" id="profile4" role="tabpanel">
                												<div class="pd-20">
                													<input type="file" name="photo" class="form-control-file" id="profile">
                												</div>
                											</div>
                										</div>
                									</div>
                								</div>
                							</div>
                						</div>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Name</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required name="name" value="<?= $manager['name'] ?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Gender</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" name="gender" type="text" value="<?= $manager['gender'] ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Email</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control"  value="<?= $manager['email'] ?>" type="email" name="email" disabled>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Phone</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required value="<?= $manager['phone'] ?>" type="text" name="phone">
							</div>
						</div>
            <div class="form-group row">
							<label class="col-sm-12 col-md-2 col-form-label">Address</label>
							<div class="col-sm-12 col-md-10">
								<input class="form-control" required value="<?= $manager['address'] ?>" type="text" name="address">
							</div>
						</div>
            <div class="form-group row">
							<div class="col-sm-12 col-md-10">
								<button type="submit" name="btnUpdate" class="btn btn-primary">
                  Update
                </button>
							</div>
						</div>
					</form>
 <?php
include("footer.php");
  ?>
