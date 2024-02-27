<?php 
 $this->view("header", $data); 
?>
   <section id="form" style="margin-top: 5px"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-sm-offset-1">
					</div>
				<div class="col-sm-4 col-sm-offset-1">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>					
						<form method="POST">
							<input  name="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>" type="text" placeholder="Name"/>
							<input  name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" type="email" placeholder="Email Address"/>
							<input  name="password1" type="password" placeholder="Password"/>
							<input  name="password2" type="password" placeholder="Retype Password"/>
							<button  type="submit" class="btn btn-default">Signup</button>
						</form>
						<span style="color: red ;font-size: 16px;">
						<?php check_message(); ?>	
						 </span> <br>						
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
<?php 
$this->view("footer", $data); ?>