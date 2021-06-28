<?php
	include '../Connection/Connect.php';
	$id_no = mysqli_real_escape_string($conn, $_GET['id_no']);
	$id_uploaded_file = mysqli_real_escape_string($conn, $_GET['id_uploaded_file']);
	if($id_uploaded_file==""){
		$id_file = date("Ymdhisa");
		$rand = rand();
		$new_id_file = 'Scan:'.$rand.'-'.$id_file.'';
		echo $new_id_file;
		$no_files = count($_FILES["upload"]['name']);
		for ($i = 0; $i < $no_files; $i++){
			if ($_FILES["upload"]["error"][$i] > 0){
				echo "Error: " . $_FILES["upload"]["error"][$i] . "<br>";
			} else {
					$date_n_time = date("Y-m-d-h-i-sa");
					$file_name = basename($_FILES["upload"]['name'][$i],'.pdf');
					$name = ''.$file_name.''.$date_n_time.".pdf";
				if (file_exists('../Scanned_Files/' .$_FILES["upload"]["name"][$i])) {
					//echo 'File already exists : uploads/flyersoradvertisement/' . $_FILES["img"]["name"][$i];
				} else {
					$filename = move_uploaded_file($_FILES["upload"]["tmp_name"][$i], '../Scanned_Files/'.$name);
					$sql = "INSERT INTO scan_files (id_no, id_files, location)
					VALUES ('$id_no', '$new_id_file', '$name')";
					if ($conn->query($sql) === TRUE){
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
			}
		}
	}else{
		echo $id_uploaded_file;
		$no_files = count($_FILES["upload"]['name']);
		for ($i = 0; $i < $no_files; $i++){
			if ($_FILES["upload"]["error"][$i] > 0){
				echo "Error: " . $_FILES["upload"]["error"][$i] . "<br>";
			} else {
					$date_n_time = date("Y-m-d-h-i-sa");
					$file_name = basename($_FILES["upload"]['name'][$i],'.pdf');
					$name = ''.$file_name.''.$date_n_time.".pdf";
				if (file_exists('../Scanned_Files/' .$_FILES["upload"]["name"][$i])) {
					//echo 'File already exists : uploads/flyersoradvertisement/' . $_FILES["img"]["name"][$i];
				} else {
					$filename = move_uploaded_file($_FILES["upload"]["tmp_name"][$i], '../Scanned_Files/'.$name);
					$sql = "INSERT INTO scan_files (id_no, id_files, location)
					VALUES ('$id_no', '$id_uploaded_file', '$name')";
					if ($conn->query($sql) === TRUE){
					} else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
				}
			}
		}
	}