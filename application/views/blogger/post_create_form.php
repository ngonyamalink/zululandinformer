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

	<h4 align="center">Create Blog</h4>
	<br />
	<div class="row">
		<div class="col-md-12">

			<form action='<?php echo base_url("blogger/create_post_submit")?>'
				method="POST">


<select name="topic_id" class="form-control">


<?php 

foreach (gettopics() as $value){
    
    echo "<option value=".$value['id'].">". $value['name']."</option>";
    
}


?>


</select>
<br/>

				<input class="form-control" placeholder="Title" name="title" /><br />
				<input class="form-control" placeholder="Slug" name="slug" /><br />
				
				
				
				<div class="form-group">
					<label class="small mb-1" for="inputConfirmPassword">image</label>
					<input class="form-control" id="inputConfirmPassword" type="file"
						name="userfile" />
				</div>
				<textarea class="form-control" placeholder="Body"
					style="height: 150px;" name="body"> </textarea>
				<br /> <input type="submit" class="btn btn-primary" />
		</div>
	</div>
</div>