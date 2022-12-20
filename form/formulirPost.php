<?php
require '/xampp/htdocs/forum8/connect/connection.php';


    // if(empty($_POST['txtKode'])){

    // }else{
    //     $kode = $_REQUEST['txtKode'];
    // }
    $kode = $_REQUEST['txtKode'];
    $nama = $_REQUEST['txtNama'];
    $sex = $_REQUEST['optsex'];
    $agama = $_REQUEST['cmbAgama'];
    $provinsi = $_REQUEST['cmbProv'];
    $kota = $_REQUEST['cmbCity'];
    $alamat = $_REQUEST['txtAlamat'];
    $hobi1 = "";
    $hobi2 = ""; 
    $hobi3 = "";
    // if(!isset($_POST['chk1'])){
    // }else{
    //     $hobi1 = $_REQUEST['chk1'];
    // }
    // if(!isset($_POST['chk2'])){
    // }else{
    //     $hobi1 = $_REQUEST['chk2'];
    // }
    // if(!isset($_POST['chk3'])){
    // }else{
    //     $hobi1 = $_REQUEST['chk3'];
    // }
    $hobi = $hobi1." ".$hobi2." ".$hobi3;
    $passw = $_REQUEST['txtPass'];

            $sql = "INSERT INTO datadiri (kode,nama,sex,agama,provinsi,kota,alamat,passw,hobi)
                    VALUES ('$kode','$nama','$sex','$agama','$provinsi','$kota','$alamat','$passw','$hobi')";

if(mysqli_query($conn, $sql)){
    echo "<h3>data stored in a database successfully."
        . " Please browse your localhost php my admin"
        . " to view the updated data</h3>";
        header('form.php');

} else{
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}
?>

<html>
    <head><title></title></head>
    <body>
    </body>
</html>