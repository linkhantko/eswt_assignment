<?php
include('header.php');

$query = "SELECT * FROM managers";
$result = mysqli_query($connection, $query);
$row = mysqli_num_rows($result);

$query1 = "SELECT * FROM coordinators";
$result1 = mysqli_query($connection, $query1);
$row1 = mysqli_num_rows($result1);

$query2 = "SELECT * FROM students";
$result2 = mysqli_query($connection, $query2);
$row2 = mysqli_num_rows($result2);

$query3 = "SELECT * FROM articles";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_num_rows($result3);

 ?>
 <div class="row">
   <div class="col-xl-3 mb-30">
     <div class="card-box height-100-p widget-style1">
       <div class="d-flex flex-wrap align-items-center">
         <div class="progress-data">
           <div>
             <img src="src/images/icons8-manager-48.png" alt="">
           </div>
         </div>
         <div class="widget-data">
           <div class="weight-600 font-14">Manager</div>
           <div class="h4 mb-0"><?php echo $row ?></div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-xl-3 mb-30">
     <div class="card-box height-100-p widget-style1">
       <div class="d-flex flex-wrap align-items-center">
         <div class="progress-data">
           <div>
             <img src="src/images/icons8-people-48.png" alt="">
           </div>
         </div>
         <div class="widget-data">
           <div class="weight-600 font-14">Coordinator</div>
           <div class="h4 mb-0"><?php echo $row1 ?></div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-xl-3 mb-30">
     <div class="card-box height-100-p widget-style1">
       <div class="d-flex flex-wrap align-items-center">
         <div class="progress-data">
           <div>
             <img src="src/images/icons8-student-male-48.png" alt="">
           </div>
         </div>
         <div class="widget-data">
           <div class="weight-600 font-14">Students</div>
           <div class="h4 mb-0"><?php echo $row2 ?></div>
         </div>
       </div>
     </div>
   </div>
   <div class="col-xl-3 mb-30">
     <div class="card-box height-100-p widget-style1">
       <div class="d-flex flex-wrap align-items-center">
         <div class="progress-data">
           <div>
             <img src="src/images/icons8-magazine-48.png" alt="">
           </div>
         </div>
         <div class="widget-data">
           <div class="weight-600 font-14">Article</div>
           <div class="h4 mb-0"><?php echo $row3 ?></div>
         </div>
       </div>
     </div>
   </div>
 </div>
 <div class="row">
		<div class="col-md-6 mb-30">
			<div class="pd-20 card-box height-100-p">
				<h4 class="h4 text-blue">Faculties Pie Chart</h4>
				<div>
          <table>
            <thead>
              <td></td>
            </thead>
          </table>
        </div>
			</div>
		</div>
    <div class="col-md-6 mb-30">
      <div class="pd-20 card-box height-100-p">
        <h4 class="h4 text-blue">Gantt Chart</h4>
        <div></div>
      </div>
    </div>
	</div>
 <?php
include('footer.php');
  ?>
