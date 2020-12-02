<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['status']!="login"){
header("location:../login.php?pesan=belum_login");
}
?>

<html>
    <head>
        <title>KAS SBD - Tambah Record</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="materialize.min.css">
    </head>
    <body class="container amber lighten-5" id="body-content">
        <h2>KAS SBD</h2>
        <a href="record.php" class="waves-effect waves-light btn">Kembali</a>

        <h3>Tambah Record</h3>
        
        <form action="tambahrecord.php" method="post" name="form1">
            <table>
                <tr>
                    <td>Nama</td>
                    <td><input type="text"name="nama" required></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date"name="tanggal" required></td>
                </tr>
                <tr>
                    <td>Saldo Masuk</td>
                    <td><input type="number" name="saldo_masuk" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit"name="Submit" value="Add" class="waves-effect waves-light btn"></td>
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['Submit'])){
            $nama=$_POST['nama'];
            $tanggal=$_POST['tanggal'];
            $saldo_masuk=$_POST['saldo_masuk'];

            include_once("config.php");

            $result=mysqli_query($conn, "INSERT INTO transaksi(nama,tanggal,saldo_masuk)
            VALUES('$nama','$tanggal','$saldo_masuk')");

            echo "Record ditambah dengan sukses! <a href='record.php' class='waves-effect waves-light btn'>lihat record terbaru!</a>";
        }
        ?>
    </body>
</html