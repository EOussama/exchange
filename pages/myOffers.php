<?php
	session_start();

	if($_SESSION['logged-in'] == false)
		echo "<script>window.location = '/exchange/index.php';</script>";

	require "../includes/database.php";
	include "../includes/header.php";
	
	$query = "SELECT * FROM `matches` WHERE `userid` = ".$_SESSION['userid'].";";
	$results = $con->query($query);
	$offers = $results->fetch_all(MYSQLI_ASSOC);

	$con->close();
?>
       	<main class="container mt-5 mb-5">
       		<h3><i class="fa fa-list-alt"></i> My offers (<?php echo sizeof($offers); ?>)</h3>
       		<hr>
       		
       		<div class="row">
				<?php foreach($offers as $offer): ?>
					<div class="card mr-1" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><?php echo $_SESSION['username']; ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-at"></i> <?php echo $_SESSION['email']; ?></h6>
							<hr>
							<p class="card-text">
								<b>Wants</b>: <?php echo $offer['wants']; ?>
							</p>
							<p class="card-text">
								<b>Offers</b>: <?php echo $offer['offers']; ?>
							</p>
							<p class="card-text"><small class="text-muted">Offer posted on <?php echo $offer['postDate']; ?></small></p>
						</div>
					</div>
				<?php endforeach; ?>
       		</div>
		</main>
<?php
	include "../includes/footer.php";
?>