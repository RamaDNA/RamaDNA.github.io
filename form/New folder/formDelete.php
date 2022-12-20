<html>
    <head></head>
    <body>
        <?php 
        require '/xampp/htdocs/forum8/connect/connection.php';
        $kode =$_GET['kode'];

        $itemkode = "DELETE FROM datadiri WHERE kode ='$kode'";
        $query = mysqli_query($conn,$itemkode);
        ?>
    </body>
</html>