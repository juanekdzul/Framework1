<h2>Types de users</h2>
<h3>Número de usuarios: <?php echo $usersCount; ?></h3>
<div class="table">
<table class="table table-bordered">
	<tr>
		<th>ID</th>
		<th>Type</th>
		<th>Action</th>
	</tr>

<?php foreach ($users as $user): ?>
<tr>
	<td><?php echo $user["types"]["id"]; ?></td>
	<td><?php echo $user["types"]["name"]; ?></td>
	<td>
		<a href="<?php echo APP_URL."/types/edit/".$user["users"]["id"]; ?>">Edit</a>
		<a href="<?php echo APP_URL."/types/delete/".$user["users"]["id"]; ?>">Delete</a>

	</td>
</tr>
<?php endforeach; ?>

</table>
</div>
