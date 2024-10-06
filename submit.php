<?php
    include_once "config.php";
?>

<?php
    $name = $_POST['name'];
    $type = $_POST['type'];
    $price = $_POST['price'];
    $code = $_POST['code'];
    $qty = $_POST['qty'];
    $img = $_POST['img'];
    $description = $_POST['description'];
	
	$sql="insert into item(id,name,type,price,code,qty,img,description)values('','$name','$type','$price','$code','$qty','$img','$description')";
	
	if(mysqli_query($conn,$sql))
	{
		header("Location:/project/index.php");
	}
	
	mysqli_close($conn);
?>