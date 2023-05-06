<?php
include("header.php");
$urID=$_SESSION['loginUser']['id'];

$sql="SELECT * FROM users WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $urID);
$stmt ->execute();

$users = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
      <div class="page-header">
        <div class="row">
          <div class="col-md-12 col-sm-12">
            <div class="title">
              <h4>Profile</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Profile</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
          <div class="pd-20 card-box height-100-p">
            <div class="profile-photo">
              <!-- <a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a> -->
              <img src="<?= $_SESSION['loginUser']['photo'] ?>" alt="" class="avatar-photo">
              <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body pd-5">
                      <div class="img-container">
                        <img id="image" src="<?= $_SESSION['loginUser']['photo'] ?>" alt="Picture">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" value="Update" class="btn btn-primary">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h5 class="text-center h5 mb-0"><?= $_SESSION['loginUser']['name'] ?></h5>
            <div class="profile-info">
              <h5 class="mb-20 h5 text-blue">Contact Information</h5>
              <ul>
                <li>
                  <span>Email Address:</span>
                  <?= $_SESSION['loginUser']['email'] ?>
                </li>
                <li>
                  <span>Phone Number:</span>
                  <?= $_SESSION['loginUser']['phone'] ?>
                </li>
                <li>
                  <span>Address:</span>
                  <?= $_SESSION['loginUser']['address'] ?>
                </li>
              </ul>
            </div>
            <div class="profile-social">
              <h5 class="mb-20 h5 text-blue">Social Links</h5>
              <ul class="clearfix">
                <li><a href="#" class="btn" data-bgcolor="#3b5998" data-color="#ffffff"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="btn" data-bgcolor="#1da1f2" data-color="#ffffff"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="btn" data-bgcolor="#007bb5" data-color="#ffffff"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="btn" data-bgcolor="#f46f30" data-color="#ffffff"><i class="fa fa-instagram"></i></a></li>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
          <div class="card-box height-100-p overflow-hidden">
            <div class="profile-tab height-100-p">
              <div class="tab height-100-p">
                <ul class="nav nav-tabs customtab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#setting" role="tab">Settings</a>
                  </li>
                </ul>
                <div class="tab-content">
                  <!-- Setting Tab start -->
                  <div class="tab-pane fade height-100-p show active" id="setting" role="tabpanel">
                    <div class="profile-setting">
                      <ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
                              <form class="" action="update_profile.php" method="post">
                                <input class="form-control form-control-lg" type="hidden" value="<?= $users['id']?>" name="id">
															<h4 class="text-blue h5 mb-20">Edit Your Personal Setting</h4>
															<div class="form-group">
																<label>Full Name</label>
																<input class="form-control form-control-lg" type="text" value="<?= $users['name']?>" name="name" required>
															</div>
															<div class="form-group">
																<label>Email</label>
																<input value="<?= $users['email']?>" name="email" class="form-control form-control-lg" type="email" disabled>
															</div>
                              <div class="form-group">
																<label>Phone</label>
																<input value="<?= $users['phone']?>" name="phone" class="form-control form-control-lg" type="text" required>
															</div>
                              <div class="form-group">
																<label>Address</label>
																<input value="<?= $users['address']?>" name="address" class="form-control form-control-lg" type="text" required>
															</div>
															<div class="form-group">
																<label>Gender</label>
																<select class="selectpicker form-control form-control-lg" name="gender" data-style="btn-outline-secondary btn-lg" title="<?= $users['gender']?>" required>
																	<option value="Male">Male</option>
																	<option value="Female">Female</option>
																</select>
															</div>
                              <div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Update Personal Info">
															</div>
                            </form>
														</li>
                            <!-- =====================SEC========================= -->
														<li class="weight-500 col-md-6">
                              <?php
                                if(isset($_SESSION['loginUser']))
                                {
                                  $sql_cid="SELECT password from users WHERE id=:id";
                                  $stmt_cid=$conn->prepare($sql_cid);
                                  $stmt_cid ->bindParam(':id', $urID);
                                  $stmt_cid->execute();
                                  $user=$stmt_cid->fetch(PDO::FETCH_ASSOC);

                                  $oldpassword=$user['password'];
                                }

                                if (isset($_POST['btnUpdate']))
                                {
                                  $confirmPassword=$_POST['currentPassword'];
                                  if($oldpassword == $confirmPassword)
                                  {

                                    $newPassword=$_POST['newPassword'];

                                    $sql= "UPDATE users SET password=:password where id=:id";
                                    $stmt =$conn->prepare($sql);
                                    $stmt->bindParam(':id',$urID);
                                    $stmt->bindParam(':password',$newPassword);
                                    $stmt->execute();

                                    echo "<script>alert('Successfully Update!!!')</script>";

                                  }else
                                  {
                                    echo "<script>alert('Current Password does not match.Try Again')</script>";
                                  }
                                }
                               ?>
                              <form class="" action="#" method="post">
															<h4 class="text-blue h5 mb-20">Updae Password</h4>
															<div class="form-group">
																<label>Current Password</label>
																<input class="form-control form-control-lg" name="currentPassword" type="text" required>
															</div>
															<div class="form-group">
																<label>New Password</label>
																<input class="form-control form-control-lg" name="newPassword" type="text" required>
															</div>
															<div class="form-group mb-0">
																<input type="submit" name="btnUpdate" class="btn btn-primary" value="Update Password">
															</div>
                            </form>
														</li>
													</ul>
          </div>
        </div>
        <!-- Setting Tab End -->
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
include("footer.php");
?>
