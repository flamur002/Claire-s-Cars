<main class="admin">
	        <section class="left">
		    <ul>
          <?php 

        foreach($manufacturers as $row){ ?>
			<li><a href="/cars/list?manufacturerId=<?=$row['id']?>"><?=$row['name']?></a></li>
<?php	} ?>

	</ul>
	</section>
	<section class="right">
    <h1>Our cars</h1>
    <ul class="cars">
	<li>

 <?php
        foreach ($cars as $car) {
			foreach ($manufacturers as $row){
				if($row['id'] == $car['manufacturerId']){
					$make = $row['name'];
				}
			}

		$num = 1;
		$found = true;
		//find every image thats starts with $car['id']_
		do{
		if (file_exists('../public/images/cars/' . $car['id'] .'_'.$num .'.jpg')) { 
			?>
			<a href="/images/cars/<?=$car['id'].'_'.$num?>.jpg"><img src="/images/cars/<?=$car['id'].'_'.$num?>.jpg" /></a>
<?php	} 

         else{
			 $found = false;
		 }
         
		 $num++;
		}while($found)
		 
		 
		 
		 ?>

		<div class="details">
		    <h2><?=$make.' '. $car['name']?></h2>

<?php	if($car['oldprice'] != ''){ ?>
			<font color="red"><h4>Was £<?=$car['oldprice']?></h4></font>
<?php	} ?>
		<h3>£<?=$car['price']?></h3>
		<p>Mileage: <?=$car['mileage']?></p>
		<p>Fuel Type: <?=$car['fuel']?></p>
		<p><?=$car['description']?></p>
		</div>
		</li>
<?php   } ?>

    </ul>
            </section>
</main>