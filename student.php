<?php
include('header.php');

$sql="SELECT * FROM students";
$stmt=$conn->prepare($sql);
$stmt->execute();

$students = $stmt->fetchAll();
 ?>
 <body>
   <div class="card-box mb-30">
					<div class="pd-20">
            <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Student List</h4>
						</div>
						<!-- <div class="pull-right">
							<a href="student_register.php" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-plus-circled"></i></a>
						</div> -->
					</div>
					</div>
					<div class="pb-20">
						<table class="table stripe hover nowrap">
							<thead>
								<tr>
									<th>#</th>
									<th>Username</th>
                  <th>Gender</th>
									<th>Email</th>
									<th>Password</th>
                  <th>Phone</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                <?php
                  $i=1;
                  foreach ($students as $student) {

                    $id=$student['id'];
                    $name=$student['name'];
                    $gender=$student['gender'];
                    $email=$student['email'];
                    $password=$student['password'];
                    $phone=$student['phone'];
                    $status=$student['status'];
                    $photo=$student['photo'];
                ?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $name ?></td>
									<td><?php echo $gender ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $password ?></td>
									<td><?php echo $phone ?></td>
									<td>
                    <?php
                        if($status == "Active")
                        {
                    ?>
                    <a class="btn btn-outline-success"  href="user_statusPHP.php?id=<?=$id?>&status=<?=$status?>"   data-toggle="tooltip" data-placement="top"  title="Active"><i class="icon-copy fa fa-check" aria-hidden="true"></i></a> |
                    <?php
                  } else if ($status == "Inactive") {
                    ?>
                      <a class="btn btn-outline-danger"  href="user_statusPHP.php?id=<?=$id?>&status=<?=$status?>"  data-toggle="tooltip" data-placement="top"  title="Inactive"><i class="icon-copy fa fa-exclamation" aria-hidden="true"></i></i></a> |
                    <?php
                  }
                     ?>
										<a class="btn btn-outline-info" href="delete_student.php?id=<?=$id?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="dw dw-delete-3"></i></a>
									</td>
								</tr>
              <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
 </body>
 <?php
include('footer.php');
  ?>
