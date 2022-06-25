<main class="admin">

<?php	require 'admin.php'; ?>
	<section class="right">

    <h2>News</h2>

<a class="new" href="/news/add">Add news</a>


<table>
<thead>

<?php
foreach ($news as $row) {
    //display all news
?>
    <tr>
    <td><strong><?=$row['title']?></strong></td>
    <td><?=$row['content']?></td>
    <td><form method="post" action="/news/delete">
    <input type="hidden" name="id" value="<?=$row['id']?>" />
    <input type="submit" name="submit" value="Delete News" />
    </form></td>
    </tr>
<?php    
}
?>

</thead>
</table>
</section>
	</main>