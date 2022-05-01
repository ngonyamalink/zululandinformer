 <div class='container-fluid mx-auto mt-4 mb-5 col-12'>
 
 
<div class="container">
 

	<div style="width: 40%; margin: 20px auto;">
		<form method="post" action="<?php echo base_url("blogger/send_register");?>" >
			<h2>Register on LifeBlog</h2>
 
			<input  type="text" name="username"    placeholder="Username">
			<input type="email" name="email"   placeholder="Email">
			<input type="password" name="password_1" placeholder="Password">
			<input type="password" name="password_2" placeholder="Password confirmation">
			<input type="submit" class="btn"/>
			<p>
				Already a member? <a href="<?php echo base_url("blogger/login")?>">Sign in</a>
			</p>
		</form>
	</div>
</div>
 </div>
 
