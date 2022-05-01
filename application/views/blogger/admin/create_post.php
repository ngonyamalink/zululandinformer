
	<div class="container content">
	 	<div align="center">
	<?php echo bloggernavigation($userrole);?>
	</div>
		<!-- Left side menu -->
	 
		<!-- Middle form - to create and edit  -->
		<div class="action create-post-div">
			<h3 class="page-title">Create/Edit Post</h3>
		 
			<?php echo form_open_multipart(base_url() . 'blogger/send_create_edit_post'); ?>
			
			
				<!-- validation errors for the form -->
 
				<!-- if editing post, the id is required to identify that post -->
				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>


	<div class="form-group">
					<label class="small mb-1" for="inputConfirmPassword">Title</label>

				<input class="form-control" type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
				
				
				</div>
				
				
		 
								<div class="form-group">
									<label class="small mb-1">Image / or image url (.jpg or .png)</label>
									<input class="form-control" id="inputConfirmPassword"
										type="file" placeholder="Photo" name="userfile" />
								</div>
						 
				
				<div class="form-group">
					<label class="small mb-1" for="inputConfirmPassword">Body</label>
				<textarea class="form-control" name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				</div>
				
				
				<div class="form-group">
				
				<label class="small mb-1" for="inputConfirmPassword">Choose topic</label>
				
				<select name="topic_id" class="form-control">
					 
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				</div>
				<!-- Only admin users can view publish input field -->
				<?php if ($user_data['role'] == "Admin"): ?>
					<!-- display checkbox according to whether post has been published or not -->
					<?php if ($published == true): ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="published" checked="checked">&nbsp;
						</label>
					<?php else: ?>
						<label for="publish">
							Publish
							<input type="checkbox" value="1" name="published">&nbsp;
						</label>
					<?php endif ?>
				<?php endif ?>
				
				<!-- if editing post, display the update button instead of create button -->
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_post">Save Post</button>
				<?php endif ?>

			</form>
		</div>
		<!-- // Middle form - to create and edit -->
	</div>
	
 