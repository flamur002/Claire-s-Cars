<main class="admin">
	<section class="right">
    <h1>Latest News Stories</h1>
    <ul class="cars">
	<li>

	<?php foreach ($news as $row) {
		//check if a story has an image
		if (file_exists('images/news/' . $row['id'] . '.jpg')) {
			echo'<a href="images/news/' . $row['id'] . '.jpg"><img src="images/news/' . $row['id'] . '.jpg" /></a>';
		}

		echo'<div class="details">
		<h2>' . $row['title'] . '</h2>
		<p>' . $row['content'] . '</p>
		<p>Posted by '.$row['author'].' on '.$row['date'].'</p>
        </div>
		</li>';
	}
?>
</ul>
	</section>
	</main>