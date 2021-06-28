<?php
	include '../Connection/Connect.php';
	$user_name = mysqli_real_escape_string($conn, $_GET['user_name']);
	$id_file = date("Ymdhisa");
	$rand = rand();
	$new_id_file = 'IMG:'.$rand.'-'.$id_file.'';
	echo $new_id_file;
	$no_files = count($_FILES["img"]['name']);
    for ($i = 0; $i < $no_files; $i++){
        if ($_FILES["img"]["error"][$i] > 0){
            echo "Error: " . $_FILES["img"]["error"][$i] . "<br>";
        } else {
				$date_n_time = date("Y-m-d-h-i-sa");
				$rand2 = rand();
				$name = ''.$rand2.''.$date_n_time.".png";
            if (file_exists('../Scanned_Files/' .$_FILES["img"]["name"][$i])){
                //echo 'File already exists : uploads/flyersoradvertisement/' . $_FILES["img"]["name"][$i];
            } else {
				$filename = move_uploaded_file($_FILES["img"]["tmp_name"][$i], '../Profile/'.$name);
				$sql = "INSERT INTO profile (id, id_image, location)
				VALUES ('', '$new_id_file', '$name')";
				if ($conn->query($sql) === TRUE){
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}
            }
        }
    }

