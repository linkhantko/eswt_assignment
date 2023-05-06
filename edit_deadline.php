<?php include("header.php");

$id =$_GET['id'];
$sql="SELECT * FROM deadlines WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();

$deadline = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<body>
  <div class="card-box mb-30">
         <div class="pd-20">
           <div class="pd-20 card-box mb-30">
         <div class="clearfix">
           <div class="pull-left">
             <h4 class="text-blue h4"> Edit Deadline</h4>
           </div>
           <div class="pull-right">
             <a href="deadline" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ti-angle-double-left"></i></a>
           </div>
         </div>
         </div>
         <div class="pb-20">
           <form action="update_date.php" method="post" enctype="multipart/form-data">
             <div class="form-group row">
               <label class="col-sm-12 col-md-2 col-form-label">Closure End Date</label>
               <div class="col-sm-12 col-md-10">
                 <input type="hidden" name="id" value="<?=$deadline['id']?>">
                 <input class="form-control date-picker"name="first_date" type="text" value="<?=str_replace("-"," ",$deadline['first_date']);?>"  name="fstDate" required>
               </div>
             </div>
             <div class="form-group row">
               <label class="col-sm-12 col-md-2 col-form-label"> Final Closure End Date</label>
               <div class="col-sm-12 col-md-10">
                 <input class="form-control date-picker"name="final_date" value="<?=str_replace("-"," ",$deadline['final_date']);?>" type="text" name="finalDate" required>
               </div>
             </div>
             <div class="form-group row">
               <label class="col-sm-12 col-md-2 col-form-label">Academic Year</label>
               <div class="col-sm-12 col-md-10">
                 <input class="form-control" value="<?=$deadline['academicyear']?>" type="number" min="2000" max="2099" step="1" value="2020" name="academicyear" disabled>
               </div>
             </div>

             <div class="form-group row">
               <div class="col-sm-12 col-md-10">
                 <button type="submit" name="btnRegister" class="btn btn-primary">
                   Set End Date
                 </button>
               </div>
             </div>

           </form>
           </div>
       </div>
     </div>
   </body>
<?php include("footer.php"); ?>
