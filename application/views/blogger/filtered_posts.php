<div class='container-fluid mx-auto mt-4 mb-5 col-12'>
 
<div class="content">
	<h2 class="content-title">
		Articles on <u><?php echo $topicname; ?></u>
	</h2>
	<hr>
	<?php foreach ($posts as $post): ?>
		<div class="post" style="margin-left: 0px;">
			<img src="<?php echo base_url() . '/static/images/' . $post['image']; ?>" class="post_image" alt="">
			<a href="<?php echo base_url();?>blogger/single_post/<?php echo $post['slug']; ?>">
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
</div> 