<?php 
	include "conn.php";
	$arr = array(
		
			1 => [0,10,20,20,20,25,25,25,30],
			2 => [0,0,0,10,10,10,15,15,20],
			3 => [0,0,0,0,10,10,10,15,15],
			4 => [0,0,0,0,0,10,10,10,15],
			5 => [0,0,0,0,0,0,5,10,10],
			6 => [0,0,0,0,0,0,0,5,10],
			7 => [0,0,0,0,0,0,0,0,5]



			1 => [
				'Thành viên' => [0,0 , 0, 0,0,0,0]
			],
			2 => [
				'Thành viên chính thức'=> [10,0,0,0,0,0,0]
			], 
			3 => [
				'Thành viên năg động' => [20,0,0,0,0,0,0]
			],
			4 => [
				'Thành viên tích cực' =>[20,10,0,0,0,0,0]
			],
			5=> [
				'Thành viên chuyên gia' => [20,10,10,0,0,0,0]
			],
			6=> [
				'Thành viên hạng đồng' => [25,15,10,10,0,0,0]
			],
			7 => [
				'Thành viên hạng bạc' => [25,15,10,10,5,0,0]
			],
			8 => [
				'Thành viên vàng' => [25,15,15,10,10,5,0]
			],
			9 => [
				'Thành viên diamond' => [30,20,15,15,10,10,5]
			]
		)
	;

 

	var_dump($arr);


 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
	<table class="table" border="1" cellspacing="0">
    <thead>
	    <tr>
	      <th></th>
	     <?php 
	     	$level = $conn->query("select * from level");
	     	if ($level->num_rows > 0) {
	     		while ($row = $level->fetch_assoc()) {
	     			?>
	     			<th><?php echo $row['name']; ?></th>
	     			<?php
	     		}
	     	}
	     ?>
	        
	    </tr>
    </thead>
    <tbody id='level'>

	    <?php foreach ($arr as $key => $value): ?>
	    	<tr>
	    		<th><?php echo $key; ?></th>
	    		<?php 
	    		
	    		foreach ($value as $key1 => $value1): ?>
	    			<td><?php echo $value1; ?></td>
	    			
	    		<?php endforeach ; ?>
	    		<?php if (count($arr[$key]) < $level->num_rows ): ?>
	    				<?php 
	    				$a =  $level->num_rows - count($arr[$key]);
	    				for ($i=0; $i < $a ; $i++) { 
	    					?>
	    					<td></td>
	    					<?php
	    				} ?>
	    			<?php endif ?>
	    	</tr>
	    <?php endforeach ?>
    </tbody>
  </table>
</body>
</html>