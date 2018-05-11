<?php
	session_start();

	$_SESSION['logged-in'] = !isset($_SESSION['logged-in']) ? false : $_SESSION['logged-in'];
	$_SESSION['userid'] = !isset($_SESSION['userid']) ? 0 : $_SESSION['userid'];
	$_SESSION['username'] = !isset($_SESSION['username']) ? '' : $_SESSION['username'];
	$_SESSION['email'] = !isset($_SESSION['email']) ? '' : $_SESSION['email'];
	$_SESSION['city'] = !isset($_SESSION['city']) ? '' : $_SESSION['city'];
	$_SESSION['state'] = !isset($_SESSION['state']) ? '' : $_SESSION['state'];
	$_SESSION['needs'] = !isset($_SESSION['needs']) ? '' : $_SESSION['needs'];
	$_SESSION['offers'] = !isset($_SESSION['offers']) ? '' : $_SESSION['offers'];
		
	require "../includes/database.php";
	include "../includes/header.php";
	
	$query = "SELECT * FROM `matches` INNER JOIN `users` ON `users`.`userid` = `matches`.`userid` WHERE `users`.`userid` <> ".$_SESSION['userid'].";";
	$results = $con->query($query);
	$all_offers = $results->fetch_all(MYSQLI_ASSOC);
	
	$_SESSION['loc'] = (isset($_POST['loc']) === true) ? $_POST['loc'] : false;
	$wants_array = explode(", ", $_SESSION['needs']);
	$offers_array = explode(", ", $_SESSION['offers']);
	$wants_str = 'AND (';
	$offers_str = 'AND (';
	$i = 0;
	$j = 0;

	foreach($wants_array as $want) {
		$wants_str .= "`offers` LIKE '%$want%'";
		$wants_str .= (++$i !== sizeof($wants_array)) ? ' OR ' : '';
	}
	echo $_SESSION['loc'];
	foreach($offers_array as $offer) {
		$offers_str .= "`wants` LIKE '%$offer%'";
		$offers_str .= (++$j !== sizeof($offers_array)) ? ' OR ' : '';
	}

	$wants_str .= ") ";
	$offers_str .= ") ";

	$query = "SELECT * FROM `matches` INNER JOIN `users` ON `users`.`userid` = `matches`.`userid` WHERE `users`.`userid` <> ".$_SESSION['userid']." AND `users`.`city` = '".$_SESSION['city']."' AND `users`.`state` = '".$_SESSION['state']."' $wants_str $offers_str;";
	$results = $con->query($query);
	$offers = $results->fetch_all(MYSQLI_ASSOC);

	$con->close();
?>
       	<main class="container mt-5 mb-5">
       		<h3><i class="fa fa-list-alt"></i> Matching Offers (<?php echo sizeof($offers); ?>)</h3>
       		<hr>
       		
       		<div class="row mb-5 text-center">
       			<?php if(sizeof($offers) !== 0): ?>
					<?php foreach($offers as $offer): ?>
						<div class="card mr-1" style="width: 18rem;">
							<div class="card-body">
								<h5 class="card-title"><?php echo $offer['username']; ?></h5>
								<h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-at"></i> <?php echo $offer['email']; ?></h6>
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
       			<?php else: ?>
       				<?php if($_SESSION['offers'] !== '' AND $_SESSION['needs'] !== ''): ?>
						<div class="alert alert-danger" role="alert">
							<h4 class="alert-heading"><i class="fa fa-exclamation-triangle"></i> Notice!</h4>
							<p>No matching results for (needs: <b><?php echo $_SESSION['needs']; ?></b>) and (offers: <b><?php echo $_SESSION['offers']; ?></b>) in “city: <b><?php echo $_SESSION['city']; ?></b>” and “state: <b><?php echo $_SESSION['state']; ?></b>” were found on your database.</p>
							<hr>
							<p class="mb-0">Better luck next time.</p>
						</div>
     				<?php endif; ?>
      			<?php endif; ?>
       		</div>
       		
       		<h3><i class="fa fa-list-alt"></i> All Offers (<?php echo sizeof($all_offers); ?>)</h3>
       		<hr>
       		
       		<div class="row">
				<?php foreach($all_offers as $offer): ?>
					<div class="card mr-1 mb-1" style="width: 18rem;">
						<div class="card-body">
							<h5 class="card-title"><?php echo $offer['username']; ?></h5>
							<h6 class="card-subtitle mb-2 text-muted"><i class="fa fa-at"></i> <?php echo $offer['email']; ?></h6>
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