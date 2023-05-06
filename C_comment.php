<?php include('C_header.php');
$id =$_GET['id'];

$cid=$_SESSION['loginUser']['id'];

$sql="SELECT * FROM articles WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt ->bindParam(':id', $id);
$stmt ->execute();
$articles = $stmt->fetch(PDO::FETCH_ASSOC);
 ?>
          <div class="pd-20 card-box mb-30">
					<form action="add_comment.php" method="post" enctype="multipart/form-data">
            <input class="form-control" type="text" value="<?= $articles['id'] ?>" name="articleid" hidden>
            <input class="form-control" type="text" value="<?= $cid ?>" name="coordinator_id" hidden>
						<div class="form-group">
							<label>Title</label>
							<input class="form-control" type="text" value="<?= $articles['title'] ?>" readonly>
						</div>
            <div class="form-group">
							<label>Student Name</label>
							<input class="form-control" type="text" value="<?= $articles['student_name'] ?>" readonly>
						</div>
            <div class="form-group">
							<label>View Articles</label>
              <a href="Frontend/<?= $articles['article'] ?>" class="form-control" type="text" readonly><?= $articles['article'] ?></a>
						</div>
            <div class="form-group">
							<label>Description</label>
							<!-- <input class="form-control" type="text"> -->
              <textarea name="description" class="form-control" rows="8" cols="80" readonly><?= $articles['Description'] ?></textarea>
						</div>

            <hr>

            <div class="form-group">
							<label>Comment</label>
              <textarea class="form-control" rows="8" cols="80" name="comment"></textarea>
						</div>


            <div class="form-group">
              <button type="submit" class="btn btn-success"><i class="icon-copy dw dw-cursor-1"></i>Send</button>
              <a href="C_article" class="btn btn-danger">Cancel</a>
						</div>
					</form>
        </div>
<?php include('C_footer.php'); ?>
