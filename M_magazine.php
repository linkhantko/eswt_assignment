<?php include('M_header.php');
error_reporting(E_ERROR | E_PARSE);

$id =$_GET['year'];
$sql_cid="SELECT magazines.ID,articles.title,articles.student_name,articles.uploadDate,articles.article FROM magazines,articles WHERE magazines.article_id=articles.id AND magazines.academicyear=:academicyear";
$stmt_cid=$conn->prepare($sql_cid);
$stmt_cid ->bindParam(':academicyear', $id);
$stmt_cid->execute();

$magazines=$stmt_cid->fetchAll();

// Create ZIP file
if(isset($_POST['create'])){

    $zip = new ZipArchive();
    $filename = "./myzipfile.zip";

    if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
        exit("cannot open <$filename>\n");
    }

    $dir = 'Frontend/articles/';

    // Create zip
    createZip($zip,$dir);

    $zip->close();
}

// Create zip
function createZip($zip,$dir){
    if (is_dir($dir)){

        if ($dh = opendir($dir)){
            while (($file = readdir($dh)) !== false){

                // If file
                if (is_file($dir.$file)) {
                    if($file != '' && $file != '.' && $file != '..'){

                        $zip->addFile($dir.$file);
                    }
                }else{
                    // If directory
                    if(is_dir($dir.$file) ){

                        if($file != '' && $file != '.' && $file != '..'){

                            // Add empty directory
                            $zip->addEmptyDir($dir.$file);

                            $folder = $dir.$file.'/';

                            // Read data of the folder
                            createZip($zip,$folder);
                        }
                    }

                }

            }
            closedir($dh);
        }
    }
}

// Download Created Zip file
if(isset($_POST['download'])){

    $filename = "myzipfile.zip";

    if (file_exists($filename)) {
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
        header('Content-Length: ' . filesize($filename));

        flush();
        readfile($filename);
        // delete file
        unlink($filename);

    }
}

?>
<body>
  <div class="card-box mb-30">
         <div class="pd-20">
           <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Magazine List</h4>
           </div>
           <div class="pull-right">
             <form method="post">
               <button type="submit" data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-sm scroll-click" title="Create as Zip" name="create"><i class="icon-copy fa fa-file-zip-o" aria-hidden="true"></i></button>
               <button type="submit" data-toggle="tooltip" data-placement="top" class="btn btn-primary btn-sm scroll-click" title="Download as Zip" name="download"><i class="icon-copy fa fa-file-zip-o" aria-hidden="true"></i></button>
             </form>
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
<?php include('M_footer.php'); ?>
