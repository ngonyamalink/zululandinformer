
	<!-- admin navbar -->
 
	<div class="container content">
		<!-- Left side menu -->
		
		 
	<div align="center">
	<?php echo bloggernavigation($userrole);?>
	</div>
 
		<!-- Display records from DB-->
		<div class="table-div"  style="width: 80%;">
		
		<h3 class="page-title">Create/Edit Posts</h3>
		
			<!-- Display notification message -->

			<?php if (empty($posts)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
			<?php else: ?>
				<table class="table">
						<thead>
						<th>N</th>
						<th>Title</th>
						<th>Author</th>
						<th>Views</th>
						<!-- Only Admin can publish/unpublish post -->
						<?php if ($user_data['role'] == "Admin"): ?>
							<th><small>Publish</small></th>
						<?php endif ?>
						<th><small>Edit</small></th>
						<th><small>Delete</small></th>
					</thead>
					<tbody>
					<?php foreach ($posts as $key => $post): ?>
						<tr>
							<td><?php 
							
						 
							
							echo $key + 1; ?></td>
							<td><?php echo $post['author']; ?></td>
							<td>
								<a 	target="_blank"
								href="<?php echo base_url() . 'blogger/single_post/' . $post['slug'] ?>">
									<?php echo $post['title']; ?>	
								</a>
							</td>
							<td><?php echo $post['views']; ?></td>
							
							<!-- Only Admin can publish/unpublish post -->
							<?php if ($user_data['role'] == "Admin" ): ?>
								<td>
								<?php if ($post['published'] == true): ?>
									<a class="fa fa-check btn unpublish"
										href="<?php echo base_url();?>blogger/postsunpublish/<?php echo $post['id'] ?>">
									</a>
								<?php else: ?>
									<a class="fa fa-times btn publish"
										href="<?php echo base_url();?>blogger/postspublish/<?php echo $post['id'] ?>">
									</a>
								<?php endif ?>
								</td>
							<?php endif ?>

							<td>
								<a class="fa fa-pencil btn edit"
									href="<?php echo base_url();?>blogger/create_edit_posts/<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="<?php echo base_url();?>blogger/deletepost/<?php echo $post['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
		<!-- // Display records from DB -->
	</div>
 