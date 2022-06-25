<main class="admin">

<?php	require 'admin.php'; 
$fuel = array('Diesel', 'Petrol', 'Electric', 'Hydrogen');
?>

<section class="right">

<h2>Save Car</h2>

<form action="/cars/edit" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<? if($car) echo $car['id']; ?>" />
    <label>Name</label>
    <input type="text" name="name" value="<? if($car) echo $car['name']; ?>" />

    <label>Description</label>
    <textarea name="description"><? if($car) echo $car['description']; ?></textarea>

    <label>Price</label>
    <input type="text" name="price" value="<? if($car) echo $car['price']; ?>" />

    <label>Category</label>

    <select name="manufacturerId">

<?php         
///find the manufacturer of the car     
    if($car){ 
                    foreach ($stmt as $row) {
						if ($car['manufacturerId'] == $row['id']) {
							echo "<option selected='selected' value='" . $row['id'] . "'>" . $row['name'] . "</option>";
						}
						else {
							echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';	
						}
						
					}
                }
    else{
        foreach ($stmt as $row) {
            echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';	
        }
    }

?>

    </select>

<label>Mileage</label>
<input type="text" name="mileage" value="<? if($car) echo $car['mileage']; ?>" />

<label>Fuel Type</label>
<select name="fuel">
<?php
if($car){
    foreach($fuel as $row){
        if($row == $car['fuel']){
            echo "<option selected='selected' >" . $row . "</option>";
        }
        else{
            echo "<option>" . $row . "</option>";
        }
    }
}
else{
    foreach($fuel as $row){ 
        echo "<option>" . $row . "</option>";
    } 
}

    ?>

</select>

<?php 
if($car){
                    if (file_exists('../productimages/' . $car['id'] . '.jpg')) {  ?>
						<img src="../productimages/<?=$car['id']?>.jpg" />
	<?php			}  }?>

				<label>Product image</label>

				<input type="file" name="image[]" multiple="" />

				<input type="submit" name="submit" value="Save Car" />

			</form>



</section>
	</main>
