<?php include('header.php');
$sql="SELECT * FROM faculties";
$stmt=$conn->prepare($sql);
$stmt->execute();

$faculties = $stmt->fetchAll();
?>
<body>
  <div class="card-box mb-30">
         <div class="pd-20">
           <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Faculties List</h4>
           </div>
           <div class="pull-right">
             <a href="register_faculty" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-plus-circled"></i></a>
           </div>
         </div>
         </div>
         <div class="pb-20">
           <table class="table stripe hover nowrap">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Faculties</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               <?php
                 $i=1;
                 foreach($faculties as $faculty){
                   $id=$faculty['id'];
                   $name=$faculty['faculty'];
                ?>
               <tr>
                 <td><?php echo $i++ ?></td>
                 <td><?php echo $name ?></td>
                 <td>
                   <div class="dropdown">
                     <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                       <i class="dw dw-more"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                       <!-- <a class="dropdown-item" href="#"><i class="dw dw-eye"></i> View</a> -->
                       <a class="dropdown-item" href="edit_faculty.php?id=<?=$id?>"><i class="dw dw-edit2"></i> Edit</a>
                       <a class="dropdown-item" href="delete_faculty.php?id=<?=$id?>"><i class="dw dw-delete-3"></i> Delete</a>
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
<?php include('footer.php'); ?>
