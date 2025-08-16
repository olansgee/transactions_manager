<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload</title>
</head>
<body>
	<?php 
	require_once("mysqli_connect.php");
	
	
	
	@$doc = $_FILES["file"]["name"];
	@$temp_doc = $_FILES["file"]["tmp_name"];

	if(!empty($doc)){
	@$new_docName = "datafile.txt";
	}

	if(!empty($doc)){
	$target_dir = "datafile.txt";
	$target_file = $target_dir . basename( "datafile.txt");
	if(move_uploaded_file($temp_doc , $target_dir)) {
	echo "The file ". ucwords(basename(@$new_docName)). " has been uploaded";

	} 
	else{
	echo "There was an error uploading the exam paper, please try again!";
	}
	}
	
	@$sample = file_get_contents("datafile.txt");
	

 	
	$query = "INSERT INTO transactions (trans_date, narrations, debit, credit, balance)
				VALUES $sample";
	

	$result = mysqli_query($con, $query);			
	if ($result){echo "<br>" . ucwords($target_dir). " data uploaded succesfully";}
	$query = "select * from transactions";
 	$result = mysqli_query($con, $query);
 	@$row = mysqli_fetch_array($result);
 

	?>	

</body>
</html>