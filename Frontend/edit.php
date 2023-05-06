<?php
  include('../connect.php');
$id =$_GET['id'];

$sql="SELECT * FROM students WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();

$students = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Article for Magazine</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <link rel="stylesheet" href="css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <link rel="stylesheet" href="css/aos.css">
  <link href="css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="css/style.css">



</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    <div class="header-top">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-12 col-lg-6 d-flex">
            <a href="index" class="site-logo">
              Auroro
            </a>

            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>

          </div>
          </div>
          <div class="col-6 d-block d-lg-none text-right">

          </div>
        </div>
      </div>
    </div>

    </div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="section-title mb-5">
              <h2>Student Information Update</h2>
            </div>
            <form action="update.php" method="post" enctype="multipart/form-data">
              <input type="text" name="OldPhoto" value="<?= $students['photo'] ?>" hidden>
              <input type="text" name="id" value="<?= $students['id'] ?>" hidden>
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label for="fname">Name</label>
                          <input type="text" id="fname" class="form-control form-control-lg" name="name" value="<?= $students['name'] ?>" required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 form-group">
                          <label for="eaddress">Email Address</label>
                          <input type="text" id="eaddress" class="form-control form-control-lg" name="email" value="<?= $students['email'] ?>" disabled>
                      </div>
                      <div class="col-md-6 form-group">
                          <label for="tel">Tel. Number</label>
                          <input type="text" id="tel" class="form-control form-control-lg" name="phone" value="<?= $students['phone'] ?>" required>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6 form-group">

                            <label for="eaddress">Photo</label>
                            <input type="file" id="eaddress" class="form-control form-control-lg" name="photo"  accept="image/x-png,image/gif,image/jpeg" required>
                      </div>
                      <div class="col-md-6 form-group">
                          <label for="tel">Gender</label>
                          <input type="text" id="tel" class="form-control form-control-lg" name="gender" readonly="" value="<?= $students['gender'] ?>">
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                        <label for="eaddress">Address</label>
                        <input type="text" id="eaddress" class="form-control form-control-lg" name="address" value="<?= $students['address'] ?>" required>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col">
                          <input type="submit" value="Update" class="btn btn-primary py-3 px-5">
                          <a href="profile" class="btn btn-primary py-3 px-5">Back</a>
                      </div>
                  </div>

            </form>
          </div>

        </div>


      </div>
    </div>
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="copyright">
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
  <!-- .site-wrap -->


  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#ff5e15"/></svg></div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.mb.YTPlayer.min.js"></script>




  <script src="js/main.js"></script>

</body>

</html>
