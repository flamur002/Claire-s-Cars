<main class="admin">

<?php	require 'admin.php'; ?>

<section class="right">

<h2>Manufacturers</h2>

<a class="new" href="/manufacturers/edit">Add new manufacturer</a>

<table>
<thead>
<tr>
<th>Name</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>
<?php
//display all the manufacturers
 foreach ($categories as $category) {
?>
    <tr>
    <td><?=$category['name']?></td>
    <td><a style="float: right" href="/manufacturers/edit?id=<?=$category['id']?>">Edit</a></td>
    <td><form method="post" action="/manufacturers/delete">
    <input type="hidden" name="id" value="<?=$category['id']?>" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
    </tr>
<?php } ?>

</thead>
</table>

</section>
	</main>