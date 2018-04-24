<?php
	$errorMessage = '';

	if(isset($_POST['step1'])) {
		$needs = $_POST['needs'];
		$offers = $_POST['offers'];
		
		if(!empty($needs) && !empty($offers)) {
			session_start();
			$_SESSION['needs'] = $needs;
			$_SESSION['offers'] = $offers;
			
			header("Location: pages/step2.php");
		}
		
		else
			$errorMessage = 'Please fill-in the whole form.';
	}
	include "includes/header.php";
?>
       	<main class="container mt-5 mb-5">
  			<h1 class="text-center mb-5">Need Something? Someone might want to barter!</h1>
  			
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="form-group mt-5 main-form">
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
						<input type="text" name="needs" class="form-control form-control-lg" placeholder="I need this...">
					</div>
					<div class="col">
						<input type="text" name="offers" class="form-control form-control-lg" placeholder="I can offer this...">
					</div>
				</div>
				<div class="row mb-5">
					<div class="col">
						<input type="submit" name="step1" class="form-control btn btn-lg btn-primary" value="Next">
					</div>
				</div>
			</form>
			 <p class="text-center text-secondary">Seprate your wants and offers with a comma: <span><i>baby sitter , washes fixed , Cheap car</i></span></p>
			 
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
	include "includes/footer.php";
?>