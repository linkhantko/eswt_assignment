<?php include('C_header.php');
$id =$_GET['id'];

$sql="SELECT A.title,R.name,C.comment FROM comments c JOIN articles A ON A.id = C.article_id JOIN coordinators R ON R.id = C.coordinator_id WHERE C.article_id =:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
 ?>
 <body>
   <div class="card-box mb-30">
          <div class="pd-20">
            <div class="pd-20 card-box mb-30">
          <div class="clearfix">
            <div class="pull-left">
              <h4 class="text-blue h4">View Comment Forms</h4>
            </div>
            <div class="pull-right">
              <a href="C_article" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
            </div>
          </div>
          </div>
          <div class="pb-20">
            <table class="table stripe hover nowrap">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Article</th>
                  <th>Coordinator</th>
                  <th>Comments</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i=1;
                  foreach ($comments as $comment){

                      $title=$comment['title'];
                      $name=$comment['name'];
                      $comment=$comment['comment'];
                 ?>
                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $title; ?></td>
                  <td><?php echo $name; ?></td>
                  <td><?php echo $comment; ?></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </body>
<?php include('C_footer.php'); ?>
