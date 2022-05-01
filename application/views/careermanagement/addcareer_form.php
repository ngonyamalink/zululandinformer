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

	<h4 align="center">ADD CAREER</h4>
	<br />
	<div class="row">
		<div class="col-md-12">

			<form
				action='<?php echo base_url("careermanagement/submit_addcareer")?>'
				method="POST">
				
					<div class="form-group">
						<label for="sel1">Category</label> <select
							class="form-control" id="sel1" name="category">
							<option value="Permanent">Permanent</option>
							<option value="Temporal">Temporal</option>
							<option value="Special case">Special case</option>
							<option value="Temporary incapacity leave">Temporary incapacity leave</option>
							<option value="Maternity leave">Maternity leave</option>
							<option value="Leave for occupation injuries and diseases">Leave for occupation injuries and diseases</option>
							<option value="Special case">Special case</option>
							 
						</select>
					</div>
				
				<label> Title</label> <input class="form-control" placeholder=""
					name="title" /><br /> <label> Description</label>
				<textarea class="form-control" placeholder="" style="height: 150px;"
					name="description"> </textarea>
				<br />
				
				<label> Closing Date</label> <input class="form-control" type="date" placeholder=""
					name="closing_date" />
					
				<br />
				<label> Contact Details</label> <input class="form-control" placeholder=""
					name="contact_details" /><br />
				
				 <input type="submit" class="btn btn-primary" />
		
		</div>


	</div>
</div>