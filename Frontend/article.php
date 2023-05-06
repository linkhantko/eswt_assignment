<?php session_start();
include("../connect.php");
if(isset($_SESSION['up']))
{
  echo "<script>alert('Article Has Been Uploaded!')</script>";
  unset($_SESSION['up']);
}
if(!isset($_SESSION['loginStudent']))
    {
      echo "<script>location='index'</script>";
    }
    $date=date("d-F-Y");
    //echo "$date";

    $sql="SELECT * FROM faculties";
    $stmt=$conn->prepare($sql);
    $stmt->execute();

    $faculties = $stmt->fetchAll();

    $sql_dl="SELECT * FROM deadlines";
    $stmt_dl=$conn->prepare($sql_dl);
    $stmt_dl->execute();

    $deadlines = $stmt_dl->fetchAll();
    foreach ($deadlines as $deadline) {
         $deadline["final_date"];
    }


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
  <style type="text/css">
    .name
    {
      font-size: 13px;
      color: white;

    }
  </style>



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
            <a href="home" class="site-logo">
              Auroro
            </a>
            <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                class="icon-menu h3"></span></a>
          </div>
          <div class="col-12 col-lg-6 ml-auto d-flex">
            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
              <div class="container">
                  <div class="mr-5">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                      <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                        <li><a href="article" class="nav-link text-left">Upload Article</a></li>
                        <li><a href="profile"><span class="badge badge-secondary name"><?= $_SESSION['loginStudent']['name'] ?></span></a></li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <div class="col-6 d-block d-lg-none text-right">
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">

          <div class="col-lg-12">
            <div class="section-title mb-5">
              <h2>Upload it !</h2>
            </div>
            <form method="POST" action="add_article.php"id="articleUplode" enctype="multipart/form-data">
              <input type="text" name="stuId" value="<?= $_SESSION['loginStudent']['id'] ?>" hidden>
                  <div class="row">
                      <div class="col-md-6 form-group">
                          <label for="fname">Name</label>
                          <input type="text" id="fname" name="name" class="form-control form-control-lg" readonly value="<?= $_SESSION['loginStudent']['name'] ?>">
                      </div>
                      <div class="col-md-6 form-group">
                          <label for="lname">Date</label>
                          <input type="text" id="lname" name="tdyDate" class="form-control form-control-lg" readonly value="<?= $date ?>">
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-12 form-group">
                        <label for="eaddress">Title</label>
                          <input type="text" id="eaddress" name="title"  class="form-control form-control-lg"  required>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-md-6 form-group">
                          <label for="fname">Photo</label>
                          <input type="file" id="fname" name="photo" class="form-control form-control-lg"  accept="image/x-png,image/gif,image/jpeg" required>
                      </div>
                      <div class="col-md-6 form-group">
                          <label for="fname">Article</label>
                          <input type="file" id="fname" name="article" class="form-control form-control-lg"  accept="application/pdf" required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label for="fname">Faculties</label>
                          <!-- <input type="file" id="fname" name="photo" class="form-control form-control-lg"> -->
                          <select class="form-control form-control-lg" name="faculty" required>
                            <option value="">Choose Faculties</option>
                            <?php
                               foreach ($faculties as $faculty)
                               {
                                 $id=$faculty['id'];
                                 $name=$faculty['faculty'];
                             ?>
                             <option value="<?= $id ?>"><?= $name; ?></option>
                          <?php } ?>
                          </select>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-md-12 form-group">
                          <label for="message">Message(optional)</label>
                          <!-- <textarea name="" id="message" cols="30" rows="10" name="message" class="form-control"></textarea> -->
                          <input type="textarea" name="message" value="" class="form-control">
                      </div>
                  </div>
                  <div class="row">

                      <div class="col-md-1">
                          <input type="checkbox" class="form-control" required >
                      </div>
                      <div class="col-md-3">
                        <label style="font-size:20px;" for="">Accept Terms and Conditions </label>
                      </div>
                  </div>
                  <hr>
                  <div class="row">
                      <div class="col-12">
                          <button type="submit" name="button"class="btn btn-primary py-3 px-5">Upload</button>
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
  <script type="text/javascript">
  $(document).ready(function(){

    $('#articleUplode').submit(function(event){
      let deadline_date = "<?=$deadline["first_date"]?>";
      let today_date = "<?=$date?>" ;

      if (today_date == deadline_date )
      {
        alert('Can Not be upload!');
      }
      else {
        $('#articleUplode').submit();
      }

    })

  });
  </script>

</body>

</html>
