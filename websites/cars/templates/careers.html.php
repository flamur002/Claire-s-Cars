
	<main class="admin">
			<h2>Careers</h2>
			<table>
			<thead>

			<?php foreach ($job as $row) {
				//display all careers ?>
				<tr>
				<td><strong><?=$row['title']?></strong></td>
				<td><?=$row['description']?></td>
				</tr>
			<?php } ?>
			</thead>
			                  </table>
							  <p>If you're interested, please do not hesitate to contact us <a href='/enquires/contact'>here</a>.</p>

	</main>