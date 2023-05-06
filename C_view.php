<?php include('C_header.php');
$id =$_GET['id'];

$sql="SELECT * FROM articles WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();
$articles = $stmt->fetch(PDO::FETCH_ASSOC);

$sql_date="SELECT * From deadlines";
$stmt_date=$conn->prepare($sql_date);
$stmt_date->execute();

$deadlines = $stmt_date->fetchAll();
 ?>
          <div class="pd-20 card-box mb-30">
					<form action="add_Cmagazine.php" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" value="<?= $articles['id'] ?>" name="articleid" hidden>
						<div class="form-group">
							<label>Title</label>
							<input class="form-control" type="text" value="<?= $articles['title'] ?>" name="title" disabled>
						</div>
            <div class="form-group">
							<label>Student Name</label>
							<input class="form-control" type="text" value="<?= $articles['student_name'] ?>" name="stu_name" disabled>
						</div>
            <div class="form-group">
							<label>Article</label>
							<a href="Frontend/<?= $articles['article'] ?>" name="article" class="form-control" type="text" readonly><?= $articles['article'] ?></a>
						</div>
            <div class="form-group">
							<label>Description</label>
							<!-- <input class="form-control" type="text"> -->
              <textarea name="description" class="form-control" rows="8" cols="80" readonly><?= $articles['Description'] ?></textarea>
						</div>
            <div class="form-group">
							<label>Academicyear</label>
							<!-- <input class="form-control" type="text"> -->
              <select class="selectpicker form-control" name="academicyear" required>
                <?php
                   foreach ($deadlines as $deadline)
                   {
                     $id=$deadline['id'];
                     $year=$deadline['academicyear'];
                 ?>
                 <option value="<?= $year; ?>"><?= $year; ?></option>
              <?php } ?>
              </select>
						</div>

            <div class="form-group">
              <button type="submit" class="btn btn-success">Accept</button>
              <a href="C_article" class="btn btn-danger">Cancel</a>
						</div>
					</form>
        </div>

<?php include('C_footer.php'); ?>
<script type="text/javascript">
      $(document).ready(function(){
         $("#header").addClass("active");
      });
</script>
