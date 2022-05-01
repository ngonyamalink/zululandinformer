<div class='container-fluid mx-auto mt-4 mb-5 col-12'>


	<hr>
	<div class="container">
		<div style="width: 40%; margin: 20px auto;">
			<form method="post"
				action="<?php echo base_url("blogger/send_login") ?>">
				<h2>Login</h2>

				<div class="form-group">
					<input class="form-control" type="text" name="username"
						placeholder="Username">
				</div>

				<div class="form-group">


					<input class="form-control" type="password" name="password"
						placeholder="Password">
				</div>

				<div class="form-group">
					<input class="form-control" type="submit" class="btn" />
				</div>
				<!-- 
			<p>
				Not yet a member? <a href="<?php echo base_url("blogger/register/");?>">Sign up</a>
			</p>
			 -->
			</form>
		</div>
	</div>
</div>