<?php include('C_header.php');
error_reporting(E_ERROR | E_PARSE);

$id=$_SESSION['loginUser']['id'];
$sql_cid="SELECT * FROM coordinators WHERE id=:id";
$stmt_cid=$conn->prepare($sql_cid);
$stmt_cid ->bindParam(':id', $id);
$stmt_cid->execute();

$coordinators=$stmt_cid->fetch(PDO::FETCH_ASSOC);

$faculties_id=$coordinators['faculties_id'];


$sql="SELECT * FROM articles WHERE faculties_id=:faculties_id";
$stmt=$conn->prepare($sql);
$stmt ->bindParam(':faculties_id', $faculties_id);
$stmt->execute();

$articles = $stmt->fetchAll();

 ?>

<body>
  <div class="card-box mb-30">
         <div class="pd-20">
           <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Article Forms</h4>
           </div>
         </div>
         </div>
         <div class="pb-20">
           <table class="table stripe hover nowrap">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Title</th>
                 <th>Student Name</th>
                 <th>Article</th>
                 <th>Upload Date</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               <?php
                 $i=1;
                 foreach($articles as $article){
                   $id=$article['id'];
                   $title=$article['title'];
                   $student_name=$article['student_name'];
                   $doc=$article['article'];
                   $upddate=$article['uploadDate'];
                   $message=$article['Description'];
                ?>
               <tr>
                 <td><?php echo $i++ ?></td>
                 <td><?php echo $title ?></td>
                 <td><?php echo $student_name ?></td>
                 <td><a href="<?php echo 'Frontend/'.$doc ?>"><?php echo $title ?></a></td>
                 <td><?php echo $upddate ?></td>
                 <td>
                       <div class="dropdown">
                         <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                           <i class="dw dw-more"></i>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                           <a class="dropdown-item" href="C_view.php?id=<?=$id?>"><i class="dw dw-eye"></i> View</a>
                           <a class="dropdown-item" href="C_comment.php?id=<?=$id?>"><i class="icon-copy dw dw-chat-1"></i> Give Comment</a>
                           <a class="dropdown-item" href="C_view_comment.php?id=<?=$id?>"><i class="icon-copy ion-chatboxes"></i>View Comment</a>
                         </div>
                       </div>
                 </td>
               </tr>
             <?php } ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </body>

<?php include('C_footer.php'); ?>
