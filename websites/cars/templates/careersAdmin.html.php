<main class="admin">

<?php	require 'admin.php'; ?>
	<section class="right">

    <h2>Careers</h2>

<a class="new" href="/careers/add">Add a new job</a>


<table>
<thead>

<?php foreach ($job as $row) { ?>
				<tr>
				<td><strong><?=$row['title']?></strong></td>
				<td><?=$row['description']?></td>
				<td><form method="post" action="/careers/delete">
				<input type="hidden" name="id" value="<?=$row['id']?>" />
				<input type="submit" name="submit" value="Delete Job" />
				</form></td>
				</tr>
<?php		} ?>

			</thead>
			</table>

    </section>
	</main>