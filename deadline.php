<?php include("header.php");

if (isset( $_SESSION['alex']))
    echo "<script>alert('Deadlines for academicyear have already exist!!')</script>";
    unset($_SESSION['alex']);
$sql="SELECT * FROM deadlines";
$stmt=$conn->prepare($sql);
$stmt->execute();

$deadlines = $stmt->fetchAll();

  if (isset( $_SESSION['dtg'])){
      echo "<script>alert('Closure Date must be come first!!')</script>";
      unset($_SESSION['dtg']);
  }
?>
<body>
  <div class="card-box mb-30">
         <div class="pd-20">
           <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4">Deadline</h4>
           </div>
           <div class="pull-right">
             <a href="register_date" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-plus-circled"></i></a>
           </div>
         </div>
         </div>
         <div class="pb-20">
           <table class="table stripe hover nowrap">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Closure End Date</th>
                 <th>Final Closure End Date</th>
                 <th>Academic Year</th>
                 <th>Action</th>
               </tr>
             </thead>
             <tbody>
               <?php
                 $i=1;
                 foreach($deadlines as $deadline){
                   $id=$deadline['id'];
                   $fstDate=$deadline['first_date'];
                   $finalDate=$deadline['final_date'];
                   $academicr_yr=$deadline['academicyear'];

                ?>
               <tr>
                 <td><?php echo $i++ ?></td>
                 <td><?php echo $fstDate ?></td>
                 <td><?php echo $finalDate ?></td>
                 <td><?php echo $academicr_yr ?></td>
                 <td>
                       <a class="btn btn-primary" href="edit_deadline.php?id=<?=$id?>"><i class="dw dw-edit2"></i></a> |
                       <a class="btn btn-danger" href="delete_date.php?id=<?=$id?>"><i class="dw dw-delete-3"></i></a>
                 </td>
               </tr>
             <?php } ?>
             </tbody>
           </table>
           </div>
       </div>
     </div>
   </body>
<?php include("footer.php"); ?>
