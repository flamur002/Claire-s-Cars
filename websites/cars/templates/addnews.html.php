<main class="admin">

<?php	require 'admin.php'; ?>

<section class="right">

<h2>Add News</h2>

<form action="/news/add" method="POST" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title" />

    <label>Content</label>
    <textarea name="content"></textarea>

    <label>Image</label>
    <input type="file" name="image" />

    <input type="submit" name="submit" value="Add News" />

</form>

</section>
	</main>