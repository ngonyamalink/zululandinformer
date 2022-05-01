<br />
<div>
	<?php
$this->load->view('alert');
?>
</div>

<link
	href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
	rel="stylesheet" id="bootstrap-css">
<script
	src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script
	src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

	<h4 align="center">CONTACT US</h4>
	<br />
	<div class="row">
		<div class="col-md-8">

			<form
				action='<?php echo base_url("welcome/submit_contact_us")?>'
				method="POST">

				<input class="form-control" placeholder="Full Names..."
					name="fullnames" /><br /> <input class="form-control"
					placeholder="Phone..." name="phone" /><br /> <input
					class="form-control" placeholder="E-mail..." name="email" /><br />
				<textarea class="form-control" placeholder="How can we help you?"
					style="height: 150px;" name="message"> </textarea>
				<br /> <input type="submit" class="btn btn-primary" />
		
		</div>
				
		<div class="col-md-4">
			<b>Customer service:</b> <br /> Phone: +27 63 386 1016<br /> E-mail:
			
			<!-- <a href="mailto:info@ngonyamalink.co.za">info@ngonyamalink.co.za</a><br />
			<br /> <b>Pretoria:</b>
			<br /> 624 Old Farm Road <br /> Equestria<br />
			Pretoria, 0184<br /> Phone: +27 71 3022 315<br /> -->
			
			<a
				href="mailto:info@zululandinformer.co.za">info@zululandinformer.co.za</a><br />
			</b> <br /> <b>Social Connect:</b> <br /> &nbsp;&nbsp;&nbsp; <a
				href="https://www.facebook.com/NgonyamaLink-105784267810431"
				title="Facebook"><i class="fa fa-facebook-official"></i></a>
			&nbsp;&nbsp; <a href="https://twitter.com/ngonyamalink"
				title="Twitter"><i class="fa fa-twitter"></i></a> &nbsp;&nbsp; <a
				href="" title="LinkedIn"><i class="fa fa-linkedin"></i></a>
			</form>
		</div>

	</div>
</div>