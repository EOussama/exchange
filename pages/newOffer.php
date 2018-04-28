<?php
	session_start();

	if($_SESSION['logged-in'] == false)
		echo "<script>window.location = '/exchange/index.php';</script>";

	include "../includes/header.php";
?>
       	<main class="container mt-5 mb-5">
       		<h3><i class="fa fa-plus"></i> Make a new offer</h3>
       		<hr>
       		
			<form action="\exchange\includes\addOffer.php" method="post">
				<div class="row mb-3">
					<div class="col-2">
						<label>Wants:</label>
					</div>
					<div class="col-10">
						<input type="text" name="wants" class="form-control" placeholder="Enter your wants here, separated by commas..." required>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-2">
						<label>Offers:</label>
					</div>
					<div class="col-10">
						<input type="text" name="offers" class="form-control" placeholder="Enter your needs here, separated by commas..." required>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col">
						<input type="submit" value="Submit" class="btn-block btn btn-primary">
					</div>
					<div class="col">
						<input type="reset" value="Clear" class="btn-block btn btn-secondary">
					</div>
				</div>
			</form>	
		</main>
<?php
	include "../includes/footer.php";
?>