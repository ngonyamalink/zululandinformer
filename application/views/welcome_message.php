
<div class="container content">
	<!-- Left side menu -->

	<br />
	<div align="center">


		<font size="4">
 
 
		<?php
$cnt = 0;

foreach ($topics as $topic) :
    ?>
						<a
			href="<?php echo base_url() . 'blogger/filtered_posts/' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					
						
					<?php

    $cnt ++;

    if ($cnt < sizeof($topics)) {

        echo "|";
    }
endforeach
?>
					</font>

	</div>


	<hr />
	
	<br/>
<!-- more content still to come here ... -->

	<!-- Add this ... -->
<?php foreach ($posts as $post): ?>
	<div class="post" style="margin-left: 0px;">
		<img src="<?php echo $post['image'];?>" class="post_image" alt="">
		<!-- Added this if statement... -->
		<?php if (isset($post['topic']['name'])): ?>
			<a
			href="<?php echo base_url() . 'blogger/filtered_posts/' . $post['topic']['id'] ?>"
			class="btn category">
				<?php echo $post['topic']['name'] ?>
			</a>
		<?php endif ?>

		<a
			href="<?php echo base_url();?>blogger/single_post/<?php echo $post['slug']; ?>">
			<div class="post_info">
				<h3><?php echo $post['title'] ?></h3>
				<div class="info">
					<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
					<span class="read_more">Read more...</span>
				</div>
			</div>
		</a>
	</div>
<?php endforeach ?>
</div>

<style type="text/css">

/* CONTENT */
.content {
	margin: 5px auto;
	border-radius: 5px;
	min-height: 400px;
}

.content:after {
	content: "";
	display: block;
	clear: both;
}

.content .content-title {
	margin: 10px 0px;
	color: #374447;
	font-family: 'Averia Serif Libre', cursive;
}

.content .post {
	width: 335px;
	margin: 9px;
	min-height: 320px;
	float: left;
	border-radius: 2px;
	border: 1px solid #b3b3b3;
	position: relative;
}

.content .post .category {
	margin-top: 0px;
	padding: 3px 8px;
	color: #374447;
	background: white;
	display: inline-block;
	border-radius: 2px;
	border: 1px solid #374447;
	box-shadow: 3px 2px 2px;
	position: absolute;
	left: 5px;
	top: 5px;
	z-index: 3;
}

.content .post .category:hover {
	box-shadow: 3px 2px 2px;
	color: white;
	background: #374447;
	transition: .4s;
	opacity: 1;
}

.content .post .post_image {
	height: 260px;
	width: 100%;
	background-size: 100%;
}

.content .post .post_image {
	width: 100%;
	height: 260px;
}

.content .post .post_info {
	height: 100%;
	padding: 0px 5px;
	font-weight: 200;
	font-family: 'Noto Serif', serif;
}

.content .post .post_info {
	color: #222;
}

.content .post .post_info span {
	color: #A6A6A6;
	font-style: italic;
}

.content .post .post_info span.read_more {
	position: absolute;
	right: 5px;
	bottom: 5px;
}
</style>