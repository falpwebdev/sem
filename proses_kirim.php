<?php
include "koneksi/koneksi.php";
include 'excel_reader2.php';
$xlsfile=basename($_FILES['xlsfile']['name']) ;
move_uploaded_file($_FILES['xlsfile']['tmp_name'], $xlsfile);
$jmltextarea=($_POST['jmltextarea']);
chmod($_FILES['xlsfile']['name'],0777);  
$data = new Spreadsheet_Excel_Reader($_FILES['xlsfile']['name'],false);
$baris = $data->rowcount();
for($i=2; $i<=$baris; $i++){
    $npp = $data->val($i,2);
    echo $npp;
    $sql = "SELECT id FROM pbk WHERE NPP = '$npp'";
    $ada=mysql_query($sql) or die(mysql_error());
    if(mysql_num_rows($ada)>0)
    { 
    $kirim_pesan = mysql_query("insert into outbox (DestinationNumber, TextDecoded, CreatorID)
    values('$npp', 'tes', 'Gammu')");
    }
    else
    {
    ?>
        <script type="text/javascript">
			showNotification({
				message: "<?php echo "gagal dikirim" ?>",
				type: "error",
				autoClose: true,
				duration: 2                                    
			});
        </script>
    <?php
    }
}
    unlink($_FILES['xlsfile']['name']);
?>