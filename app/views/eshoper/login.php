<?php 
 $this->view("header", $data); 
?>
   <section id="form" style="margin-top: 5px"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-2 col-sm-offset-1">
					</div>
				<div class="col-sm-4 col-sm-offset-1">
				<span style="color: red ;font-size: 16px;">
						<?php check_message(); ?>	
						 </span> <br>							
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form method="POST">
							<input name="email" value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>" type ="email" placeholder="Email Address" />
							<input name="pass" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" type="password" placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<br>
						<a href="<?= ROOT ?>signup">Don't have an acccount? Signup here</a>
					</div><!--/login form-->
				</div>

			</div>
		</div>
	</section><!--/form-->
	
	
<?php 
$this->view("footer", $data); ?>