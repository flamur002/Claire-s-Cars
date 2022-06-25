<main class="admin">

<?php	require 'admin.php'; ?>
	<section class="right">

<h2>Cars</h2>

			<a class="new" href="/cars/edit">Add new car</a>

			<table>
			<thead>
			<tr>
			<th>Model</th>
			<th style="width: 10%">Price</th>
			<th style="width: 5%">&nbsp;</th>
			<th style="width: 5%">&nbsp;</th>
			</tr>

<?php   	foreach ($cars as $car) { ?>
				<tr>
				<td><?= $car['name']?> (Added By <?=$car['added_by']?>) </td>
				<td> £<?= $car['price'] ?></td>
				<td><a style="float: right" href="/cars/edit?id=<?= $car['id'] ?>">Edit</a></td>
				<td><form method="post" action="/cars/delete">
				<input type="hidden" name="id" value="<?= $car['id'] ?>" />
				<input type="submit" name="submit" value="Delete" />
				</form></td>
				<td><form method="post" action="/cars/archive">
				<input type="hidden" name="id" value="<?= $car['id'] ?>" />
				<input type="submit" name="submit" value="Archive" />
				</form></td>
				</tr>
<?php		} ?>

			</thead>
			</table>

            </section>
	</main>