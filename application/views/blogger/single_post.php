
<title> <?php echo $post['title'] ?> | LifeBlog</title>
</head>
<body>
<div class="container">
 
	
	<div class="content" >
		<!-- Page wrapper -->
		<div class="post-wrapper">
			<!-- full post div -->
			<div class="full-post-div">
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<?php echo html_entity_decode($post['body']); ?>
				</div>
			<?php endif ?>
			</div>
		 
		</div>
		<!-- // Page wrapper -->

		<!-- post sidebar -->
		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<div class="card-content">
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo base_url() . 'blogger/filtered_posts/' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- // post sidebar -->
	</div>
</div>
<!-- // content -->
<style type="text/css">
/* * * * * * * * *
* SINGLE PAGE 
* * * * * * * * */
.content .post-wrapper {
	width: 70%;
	float: left;
	min-height: 250px;
}
.full-post-div {
	min-height: 300px;
	padding: 20px;
	border: 1px solid #e4e1e1;
	border-radius: 2px;
}
.full-post-div h2.post-title {
	margin: 10px auto 20px;
	text-align: center;
}
.post-body-div {
	font-family: 'Noto Serif', serif;
	font-size: 1.2em;
}
.post-body-div p {
	margin:20px 0px;
}
.post-sidebar {
	width: 24%;
	float: left;
	margin-left: 5px;
	min-height: 400px;
}
.content .post-comments {
	margin-top: 25px;
	border-radius: 2px;
	border-top: 1px solid #e4e1e1;
	padding: 10px;
}
.post-sidebar .card {
	width: 95%;
	margin: 10px auto;
	border: 1px solid #e4e1e1;
	border-radius: 10px 10px 0px 0px;
}
.post-sidebar .card .card-header {
	padding: 10px;
	text-align: center;
	border-radius: 3px 3px 0px 0px;
	background: #3E606F;
}
.post-sidebar .card .card-header h2 {
	color: white;
}
.post-sidebar .card .card-content a {
	display: block;
	box-sizing: border-box;
	padding: 8px 10px;
	border-bottom: 1px solid #e4e1e1;
	color: #444;
}
.post-sidebar .card .card-content a:hover {
	padding-left: 20px;
	background: #F9F9F9;
	transition: 0.1s;
}
</style>