<?php
	session_start();
	$errorMessage = '';

		if(isset($_POST['step2'])) {
			#echo "<script>alert('".$_SESSION['needs']." - ".$_SESSION['offers']." - ".$_SESSION['email']." - ".$_SESSION['city']." - ".$_SESSION['state']."');</script>";
			$email = $_POST['email'];
			$city = $_POST['city'];
			$state = $_POST['states'];

			if(!empty($email) && !empty($city) && !empty($state)) {
				$_SESSION['email'] = $email;
				$_SESSION['city'] = $city;
				$_SESSION['state'] = $state;
				
				header("Location: offers.php");
			}

			else
				$errorMessage = 'Please fill-in the whole form.';
		}
		include "../includes/header.php";
?>
       	<main class="container mt-5 mb-5">
  			<h1 class="text-center mb-5">Need Something? Someone might want to barter!</h1>
  			<h2 class="text-center mb-5"><strong>Great!</strong> One more step...</h2>
			<form action="" method="POST" class="form-group mt-5 main-form">
				<?php
					if($errorMessage != '') {
						echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">$errorMessage
						<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
						   	<span aria-hidden=\"true\">&times;</span>
					    </button>
						</div>";
						$errorMessage = '';
					}
				?>
				<div class="row mb-4">
					<div class="col">
						<div class="input-group mb-3 input-group-lg">
							<div class="input-group-prepend">
								<span class="input-group-text">@</span>
							</div>
							<input type="email" name="email" value="<?php echo $_SESSION['email']; ?>" class="form-control form-control-lg" placeholder="Email Address">
						</div>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col">
						<input type="text" name="city" value="<?php echo $_SESSION['city']; ?>" class="form-control form-control-lg" placeholder="City">
					</div>
					<div class="col">
						<select name="states" class="form-control form-control-lg">
							<option <?php echo ($_SESSION['state'] === 'TA' ? 'selected' : ''); ?> value="TA">Tanger-Tetouan-Al Hoceima</option>
							<option <?php echo ($_SESSION['state'] === 'OR' ? 'selected' : ''); ?> value="OR">Oriental</option>          
							<option <?php echo ($_SESSION['state'] === 'FE' ? 'selected' : ''); ?> value="FE">Fès-Meknès</option>
							<option <?php echo ($_SESSION['state'] === 'RA' ? 'selected' : ''); ?> value="RA">Rabat-Salé-Kénitra</option>
							<option <?php echo ($_SESSION['state'] === 'BE' ? 'selected' : ''); ?> value="BE">Béni Mellal-Khénifra</option>
							<option <?php echo ($_SESSION['state'] === 'CA' ? 'selected' : ''); ?> value="CA">Casablanca-Settat</option>
							<option <?php echo ($_SESSION['state'] === 'MA' ? 'selected' : ''); ?> value="MA">Marrakesh-Safi</option>
							<option <?php echo ($_SESSION['state'] === 'DR' ? 'selected' : ''); ?> value="DR">Drâa-Tafilalet</option>
							<option <?php echo ($_SESSION['state'] === 'SO' ? 'selected' : ''); ?> value="SO">Souss-Massa</option>
							<option <?php echo ($_SESSION['state'] === 'GU' ? 'selected' : ''); ?> value="GU">Guelmim-Oued Noun</option>
							<option <?php echo ($_SESSION['state'] === 'LA' ? 'selected' : ''); ?> value="LA">Laâyoune-Sakia El Hamra</option>
							<option <?php echo ($_SESSION['state'] === 'DA' ? 'selected' : ''); ?> value="DA">Dakhla-Oued Ed-Dahab</option>        
						</select>
					</div>
				</div>
				<div class="row mb-5">
					<div class="col">
						<input type="submit" name="step2" class="form-control btn btn-lg btn-primary" value="Find Matches">
					</div>
				</div>
			</form>
		
			 <div class="more-info mt-5 bg-primary text-light p-4 text-justify rounded">
				<p class="text-center">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat doloribus provident, numquam soluta vitae minima ex ipsum aspernatur praesentium ipsa quidem quaerat autem optio id modi ad perspiciatis perferendis blanditiis maiores veritatis consequuntur similique laboriosam iure tempore! Reiciendis asperiores, quia adipisci eligendi eum natus earum quasi. Quidem excepturi, cum sunt, assumenda amet error. Illum magnam, obcaecati beatae! Iste eaque quia ducimus labore culpa dolorem totam quisquam doloremque tempora minima quod incidunt, dignissimos nulla eveniet vero recusandae pariatur, ex esse mollitia delectus, ipsa dolore. Assumenda quaerat dolorem, veritatis maiores vitae molestiae sequi tempora perspiciatis, animi nisi ipsam fuga voluptatem reprehenderit asperiores!
				</p>
				
				<hr class="mt-5">
				<h4 class="text-center mb-4">Out services</h4>
				
				<div class="row mb-5">
					<div class="col"><img style="width: 200px;" class="mx-auto d-block" src="\exchange\images\icon_deal.svg" alt="Card image cap"></div>
					<div class="col"><img style="width: 200px;" class="mx-auto d-block" src="\exchange\images\icon_shopping.svg" alt="Card image cap"></div>
					<div class="col"><img style="width: 200px;" class="mx-auto d-block" src="\exchange\images\icon_security.svg" alt="Card image cap"></div>
				</div>
				<div class="row text-center">
					<div class="col"><p class="text-light"><b>Find out about the best deals out there, and in time.</b></p></div>
					<div class="col"><p class="text-light"><b>Online bargain-hunting has never been easier, and more affordable.</b></p></div>
					<div class="col"><p class="text-light"><b>The most secure online trading platform out there.</b></p></div>
				</div>
			 </div>
		</main>
<?php
	include "../includes/footer.php";
?>