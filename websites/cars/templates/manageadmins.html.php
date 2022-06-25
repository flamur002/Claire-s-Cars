<main class="admin">

<?php	require 'admin.php'; ?>
	<section class="right">
	
  

    <h2>Admins</h2>

<a class="new" href="/admins/edit">Add new admin</a>


 <table>
 <thead>
 <tr>
 <th>Name</th>
 <th style="width: 5%">&nbsp;</th>
 <th style="width: 5%">&nbsp;</th>
 </tr>

 <?php
foreach ($admins as $row) {
    ?>
     <tr>
     <td><?=$row['name']?></td>
     <td><a style="float: right" href="/admins/edit?id=<?=$row['admin_id']?>">Edit</a></td>
     <td><form method="post" action="/admins/delete">
    <input type="hidden" name="id" value="<?=$row['admin_id']?>" />
    <input type="submit" name="submit" value="Delete" />
    </form></td>
     </tr>
<?php } ?>

 </thead>
 </table>

    </section>
	</main>