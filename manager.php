<?php
include('header.php');

$sql="SELECT * FROM managers";
$stmt=$conn->prepare($sql);
$stmt->execute();

$managers = $stmt->fetchAll();
 ?>
 <body>
   <div class="card-box mb-30">
					<div class="pd-20">
            <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-blue h4">Marketing Manager List</h4>
						</div>
						<div class="pull-right">
							<a href="register_manager" class="btn btn-primary btn-sm scroll-click" role="button"><i class="icon-copy ion-plus-circled"></i></a>
						</div>
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
                  <th>Phone</th>
                  <th>Address</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
                <?php
                  $i=1;
                  foreach($managers as $manager){
                    $id=$manager['id'];
                    $name=$manager['name'];
                    $email=$manager['email'];
                    $phone=$manager['phone'];
                    $address=$manager['address'];
                    $gender=$manager['gender'];
                    //$name=$manager['photo'];

                 ?>
								<tr>
									<td><?php echo $i++ ?></td>
									<td><?php echo $name ?></td>
									<td><?php echo $gender ?></td>
									<td><?php echo $email ?></td>
									<td><?php echo $phone ?></td>
                  <td><?php echo $address ?></td>
									<td>
										<div class="dropdown">
											<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
												<i class="dw dw-more"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
												<a class="dropdown-item" href="edit_manager.php?id=<?=$id?>"><i class="dw dw-edit2"></i> Edit</a>
												<a class="dropdown-item" href="delete_manager.php?id=<?=$id?>"><i class="dw dw-delete-3"></i> Delete</a>
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
 <?php
 include('footer.php');
  ?>
