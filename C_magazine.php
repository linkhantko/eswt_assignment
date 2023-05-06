<?php include('C_header.php');
error_reporting(E_ERROR | E_PARSE);

$sql_cid="SELECT magazines.id as magazineID, articles.id as articlesID, articles.title, articles.uploadDate, articles.student_name, articles.article FROM magazines, articles WHERE magazines.article_id=articles.id";
$stmt_cid=$conn->prepare($sql_cid);
$stmt_cid ->bindParam(':id', $id);
$stmt_cid->execute();

$magazines=$stmt_cid->fetchAll();
?>
<body>
  <div class="card-box mb-30">
         <div class="pd-20">
           <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Magazine List</h4>
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
                 <!-- <th>Action</th> -->
               </tr>
             </thead>
             <tbody>
               <?php
                 $i=1;
                 foreach($magazines as $magazine){
                   $id=$magazine['magazineID'];
                   $title=$magazine['title'];
                   $student_name=$magazine['student_name'];
                   $doc=$magazine['article'];
                   $upddate=$magazine['uploadDate'];
                ?>
               <tr>
                 <td><?php echo $i++ ?></td>
                 <td><?php echo $title ?></td>
                 <td><?php echo $student_name ?></td>
                 <td><a href="<?php echo 'Frontend/'.$doc ?>"><?php echo $doc ?></a></td>
                 <td><?php echo $upddate ?></td>
                 <td>
                   <!-- <a class="btn btn-outline-info" href="C_view_comment.php?id=<?=$id?>" data-toggle="tooltip" data-placement="top" title="To view the Comment"><i class="icon-copy ion-chatboxes"></i></a> -->
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
