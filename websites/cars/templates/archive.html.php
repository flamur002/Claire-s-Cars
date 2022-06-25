<main class="admin">

<?php	require 'admin.php'; ?>


<section class="right">

<h2>Archived Cars</h2>

<table>
<thead>
<tr>
<th>Model</th>
<th style="width: 10%">Price</th>
<th style="width: 5%">&nbsp;</th>
<th style="width: 5%">&nbsp;</th>
</tr>


<?php foreach ($cars as $car) { ?>
				<tr>
				<td><?=$car['name'] ?> (Added By <?=$car['added_by']?>) </td>
				<td> £<?=$car['price'] ?></td>
				<td><form method="post" action="/cars/archive">
				<input type="hidden" name="carid" value="<?=$car['id'] ?>" />
				<input type="submit" name="archive" value="Restore" />
				</form></td>
				</tr>
<?php		} ?>

			</thead>
			</table>

</section>
	</main>