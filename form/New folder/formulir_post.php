<html>
<head>
<title>Hasil Isian Form</title>
</head>
<body>
<h2><font color="#FFFFFF">Hasil Isian Form</font></h2>
    <?php
        $kode=$_POST["txtKode"];
        $nama=$_POST["txtNama"];
        $sex=$_POST["optsex"];
        $prov = $_POST["cmbProv"];
        $kota = $_POST["cmbCity"];
        $agama=$_POST["cmbAgama"];
        $alamat=$_POST["txtAlamat"];
        $passw=$_POST["txtPass"];

        $encrypt = md5($passw);

        $chk1 = "";
        $chk2 = "";
        $chk3 = "";
        if  (isset($_POST["check1"])){
            $chk1 = $_POST["check1"];
        }
        if  (!empty($_POST["check2"])){
            $chk2 = $_POST["check2"];
        }    
        if  (!empty($_POST["check3"])){
            $chk3 = $_POST["check3"];
        }

    ?>

    Kode:           <?php echo $kode; ?><br>
    Nama:           <?php echo $nama; ?><br>
    Jenis Kelamin:  <?php echo $sex; ?><br>
    Agama:          <?php echo $agama; ?><br>
    Provinsi:       <?php echo $prov; ?><br>
    Provinsi:       <?php echo $kota; ?><br>
    Alamat:         <?php echo $alamat; ?><br>
    Password:       <?php echo $encrypt; ?><br>
    Hobi:           <?php echo $chk1." ".$chk2." ".$chk3; ?><br>
    <a href="queryForm.php">CHECK</a>

    <?php
    // unttuk melakukan koneksi pada database
    require '/xampp/htdocs/forum8/connect/connection.php';

    //untuk menerima variabel dari checkbox
    $itemsql = "SELECT kode,nama,sex,agama,provinsi,kota,alamat,hobi FROM datadiri where kode='$kode'";
    $query = mysqli_query($conn,$itemsql);
    $jumlah = mysqli_num_rows($query);
    $hobi = $chk1." ".$chk2." ".$chk3;


    if ($jumlah > 0) {
        # code...
        $itemsql = "UPDATE datadiri set
                    nama = '$nama',
                    passw = '$passw',
                    sex = '$sex',
                    agama = '$agama',
                    provinsi ='$prov',
                    kota ='$kota',
                    alamat ='$alamat',
                    hobi = '$hobi'
                    WHERE kode='$kode'";
    }else{

    //melakukan proses simpan data sesuai DML
    $itemsql = "INSERT INTO datadiri (kode,nama,sex,agama,provinsi,kota,alamat,passw,hobi)
                            VALUES ('$kode', '$nama','$sex', '$agama', '$prov', '$kota', '$alamat', '$encrypt', '$hobi')";
    };
    //melakukan eksekusi dari variabel @itemsql
    mysqli_query($conn, $itemsql);
?>

</body>    
</html>