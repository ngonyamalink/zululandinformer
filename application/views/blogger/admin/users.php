


<?php
// Get all admin users from DB
// $admins = getAdminUsers();
$roles = [
    'Admin',
    'Author'
];
?>


<!-- admin navbar -->
<div class="container content">

<div align="center">
	<?php echo bloggernavigation($userrole);?>
	</div>

	<!-- Left side menu -->
	<!-- Middle form - to create and edit  -->
	<div class="action">
		<h3 class="page-title">Create/Edit Admin User</h3>

		<form method="post"
			action="<?php echo base_url() . 'blogger/update_user'; ?>">

			<!-- validation errors for the form -->

			<!-- if editing user, the id is required to identify that user -->
				<?php if ($isEditingUser === true): ?>
					<input type="hidden" name="admin_id"
				value="<?php echo $admin_id; ?>">
				<?php endif ?>
 
				<input type="text" name="username" value="<?php echo $username; ?>"
				placeholder="Username"> <input type="email" name="email"
				value="<?php echo $email ?>" placeholder="Email"> <input
				type="password" name="password" placeholder="Password"> <input
				type="password" name="passwordConfirmation"
				placeholder="Password confirmation"> <select name="role">
				<option value="" selected disabled>Assign role</option>
					<?php foreach ($roles as $key => $role): ?>
						<option value="<?php echo $role; ?>"><?php echo $role; ?></option>
					<?php endforeach ?>
				</select>

			<!-- if editing user, display the update button instead of create button -->
				<?php if ($isEditingUser === true): ?> 
					<button type="submit" class="btn" name="update_admin">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_admin">Save User</button>
				<?php endif ?>
			</form>
	</div>
	<!-- // Middle form - to create and edit -->

	<!-- Display records from DB-->
	<div class="table-div">
		<!-- Display notification message -->
 
			<?php if (empty($admins)): ?>
				<h1>No admins in the database.</h1>
			<?php else: ?>
				<table class="table">
			<thead>
				<th>N</th>
				<th>Admin</th>
				<th>Role</th>
				<th colspan="2">Action</th>
			</thead>
			<tbody>
					<?php foreach ($admins as $key => $admin): ?>
						<tr>
					<td><?php echo $key + 1; ?></td>
					<td>
								<?php echo $admin['username']; ?>, &nbsp;
								<?php echo $admin['email']; ?>	
							</td>
					<td><?php echo $admin['role']; ?></td>
					<td><a class="fa fa-pencil btn edit"
						href="<?php echo base_url()?>blogger/users/<?php echo $admin['id'] ?>">
					</a></td>
					<td><a class="fa fa-trash btn delete"
						href="<?php echo base_url();?>blogger/deleteuser/<?php echo $admin['id'] ?>">
					</a></td>
				</tr>
					<?php endforeach ?>
					</tbody>
		</table>
			<?php endif ?>
		</div>
	<!-- // Display records from DB -->
</div>

