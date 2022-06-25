<main class="admin">

<?php	require 'admin.php'; ?>

<section class="right">


<h2>Save Admin</h2>

<form action="/admins/edit" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<? if($admin) echo $admin['admin_id']; ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<? if($admin) echo $admin['name']; ?>" />

    <label>Password</label>
				<input type="password" name="password" />

    <input type="submit" name="submit" value="Save Admin" />

</form>

</section>
	</main>