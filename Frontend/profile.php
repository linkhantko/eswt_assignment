<?php session_start();
error_reporting(E_ERROR | E_PARSE);
//var_dump($id);
include('../connect.php');
if(!isset($_SESSION['loginStudent']))
    {
      echo "<script>location='login'</script>";
    }
    $id=$_SESSION['loginStudent']['id'];


    $sql="SELECT * FROM students WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt ->bindParam(':id', $id);
    $stmt ->execute();

    $students = $stmt->fetch(PDO::FETCH_ASSOC);


    $sql1="SELECT * FROM articles WHERE student_id=:id";
    $stmt1 = $conn->prepare($sql1);
    $stmt1 ->bindParam(':id', $id);
    $stmt1 ->execute();

    $posts = $stmt1->fetchAll(PDO::FETCH_ASSOC);

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

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="section-title">
              <span class="caption d-block small">My</span>
              <h2>Articles</h2>
            </div>
            <?php
              foreach($posts as $post)
              {
                $title=$post['title'];
                $photo=$post['photo'];
                $message=$post['Description'];
                $date=$post['uploadDate'];
             ?>
            <div class="post-entry-2 d-flex">
              <div class="thumbnail order-md-2" style="background-image: url('<?php echo $photo ?>'); height:180px; width:180px;"></div>
              <div class="contents order-md-1 pl-0">
                <h2><a href=""><?php echo $title ?></a></h2>
                <p class="mb-3"><?php echo $message ?></p>
                <div class="post-meta">
                  <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>
                  <span class="date-read"><?php echo $date ?><span class="mx-1">&bullet;</span></span>
                </div>
              </div>
            </div>
          <?php } ?>

          </div>
<!-- =========================================================================== -->
          <div class="col-lg-3">
            <div class="section-title">
              <h2>Profile Detail</h2>
            </div>

            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">01</div> -->
              <div class="trend-contents">
                <h2><img src="<?= $students['photo'] ?>" width="280"></h2>
              </div>
            </div>

            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">03</div> -->
              <div class="trend-contents">
                <div class="post-meta">
                  <span class="d-block"><a href="#">Name...</a></span>
                </div>
                <h2><a href=""><?= $students['name'] ?></a></h2>
              </div>
            </div>

            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">03</div> -->
              <div class="trend-contents">
                <div class="post-meta">
                  <span class="d-block"><a href="#">Email...</a></span>
                </div>
                <h2><a href=""><?= $students['email'] ?></a></h2>
              </div>
            </div>
            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">03</div> -->
              <div class="trend-contents">
                <div class="post-meta">
                  <span class="d-block"><a href="#">Phone...</a></span>
                </div>
                <h2><a href=""><?= $students['phone'] ?></a></h2>
              </div>
            </div>
            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">03</div> -->
              <div class="trend-contents">
                <div class="post-meta">
                  <span class="d-block"><a href="#">Gender...</a></span>
                </div>
                <h2><a href=""><?= $students['gender'] ?></a></h2>
              </div>
            </div>
            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">03</div> -->
              <div class="trend-contents">
                <div class="post-meta">
                  <span class="d-block"><a href="#">Address...</a></span>
                </div>
                <h2><a href=""><?= $students['address'] ?></a></h2>
              </div>
            </div>
            <div class="trend-entry d-flex">
              <!-- <div class="number align-self-start">03</div> -->
              <div class="trend-contents">
                <div class="post-meta">
                  <span class="d-block"><a href="#">Date of Birth...</a></span>
                </div>
                <h2><a href=""><?= $students['dob'] ?></a></h2>
              </div>
            </div>

            <div class="trend-entry d-flex">
              <?php
              $sid = $_SESSION['loginStudent']['id'];
               ?>
              <a href="edit.php?id=<?=$id?>" class="btn btn-primary">Update</a>
              <a href="logout" class="btn btn-danger">Logout</a>
            </div>
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
