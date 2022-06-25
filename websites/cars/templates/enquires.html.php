<main class="admin">
<?php	require 'admin.php'; ?>
<section class="right">

<h2>Enquires</h2>

<table>
<thead>

<?php foreach ($enquires as $row) { ?>
				<tr>
				<td><?=$row['name']?></td>
                <td><?=$row['enquiry']?>
                <p>-<?=$row['email']?></p>
                <p>-<?=$row['telephone']?></p></td>
                <?php

//check if an enquiry is completed
                if($row['completed']=='Y'){
                    echo '<td>Completed by: '.$row['completed_by'].'</td>';
                }
                else{
                    ?>
				<td><form method="post" action="/enquires/list">
				<input type="hidden" name="enquiryid" value="<?=$row['id']?>" />
				<input type="submit" name="complete" value="Completed" />
				</form></td>
            <?php    } ?>
				</tr>
		<?php	} ?>

			</thead>
			</table>

</section>
</main>