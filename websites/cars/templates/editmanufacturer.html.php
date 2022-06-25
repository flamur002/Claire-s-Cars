<main class="admin">

<?php	require 'admin.php'; ?>

<section class="right">

<h2>Edit Manufacturer</h2>

<form action="" method="POST">

    <input type="hidden" name="id" value="<? if($currentMan) echo $currentMan['id']; ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<? if($currentMan) echo $currentMan['name']; ?>" />


    <input type="submit" name="submit" value="Save Manufacturer" />

</form>

</section>
	</main>