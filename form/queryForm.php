<html>
    <head>
        <title></title>
    </head>
    <body>
        <a href="form2.php" target="_self">Tambah Data</a>
        <table border="1">
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kota</th>
                <th>Hoby</th>
                <th>Agama</th>
                <th>Aksi</th>
            </tr>
            <?php 
        require '/xampp/htdocs/forum8/connect/connection.php';

        $sql = "SELECT kode,nama,sex,agama,provinsi,kota,alamat,hobi FROM datadiri";
        $query = mysqli_query($conn,$sql);

        while($MyData = mysqli_fetch_array($query)){
            $kode = $MyData['kode'];
        ?>
        <tr>
            <td><?php echo $MyData['kode']?></td>
            <td><?php echo $MyData['nama']?></td>
            <td><?php echo $MyData['sex']?></td>
            <td><?php echo $MyData['alamat']?></td>
            <td><?php echo $MyData['provinsi']?></td>
            <td><?php echo $MyData['kota']?></td>
            <td><?php echo $MyData['hobi']?></td>
            <td><?php echo $MyData['agama']?></td>
            <td>
                <a href="formEdit.php?kode=<?php echo $kode ?>" target="self" alt="Edit Data">Edit</a>&nbsp;&nbsp;&nbsp;
                <a href="formDelete.php?kode=<?php echo $kode ?>" target="self" alt="Delete data" 
                    onclick="return confirm('apakah yakin anda ingin menghapus')">Delete</a>
                
                    </td>
        <?php 
        }?>
        </table>

    </body>
</html>