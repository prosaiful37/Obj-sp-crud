<?php require_once "vendor/autoload.php"; ?>

<?php 
	

	//class use
	use App\Controller\Student;

	//class instance
	$student = new Student;

	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$single_student = $student -> singleStudent($id);
	}






 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>



	<div style="width: 450px;" class="wrap-table">
		<a class="btn btn-warning btn-sm" href="data.php">Back</a>
		<div class="card shadow bg-info">
			<div class="card-header"><h3 class="text-light text-center">Single Data Of :<?php echo $single_student['name']; ?></h3></div>
			<div class="card-body">
				<img style="width: 250px; height: 250px; border: 7px solid white; border-radius: 50%;>" class="d-block mx-auto shadow" src="media/img/student/<?php echo $single_student['photo']; ?>" alt="">
				<br>
				<h1 style="text-align: center; font-family: Inconsolata; color: #FFC107;"><?php echo $single_student['name']; ?></h1>
				<table class="table">
					<tr style="background-color: #CFD5EA;">
						<td>Name</td>
						<td><?php echo $single_student['name']; ?></td>
					</tr>
					<tr style="background-color: #E9EBF5;">
						<td>E-mail </td>
						<td><?php echo $single_student['email']; ?></td>
					</tr>
					<tr style="background-color: #CFD5EA;">
						<td>Cell </td>
						<td><?php echo $single_student['cell']; ?></td>
					</tr>
				</table>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>