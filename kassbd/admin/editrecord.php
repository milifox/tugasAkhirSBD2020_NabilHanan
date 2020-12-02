<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['status']!="login"){
header("location:../login.php?pesan=belum_login");
}
?>

<?php
include_once("config.php");

if(isset($_POST['update'])){
    $id_transaksi=$_POST['id_transaksi'];

    $nama=$_POST['nama'];
    $tanggal=$_POST['tanggal'];
    $saldo_masuk=$_POST['saldo_masuk'];

    $result = mysqli_query($conn, "UPDATE transaksi SET
    nama='$nama',tanggal='$tanggal',saldo_masuk='$saldo_masuk' WHERE id_transaksi=$id_transaksi");

    header("Location: record.php");
}
?>
<?php
$id_transaksi=$_GET['id_transaksi'];

$result=mysqli_query($conn, "SELECT*FROM transaksi WHERE id_transaksi=$id_transaksi");

while($user_data=mysqli_fetch_array($result)){
    $nama=$user_data['nama'];
    $tanggal=$user_data['tanggal'];
    $saldo_masuk=$user_data['saldo_masuk'];
}
?>

<html>
    <head>
        <title>KAS SBD - Edit Record</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="materialize.min.css">
    </head>

    <body class="container amber lighten-5" id="body-content">
        <h2>KAS SBD</h2>
        <a href="record.php" class="waves-effect waves-light btn">Kembali</a>

        <form name = "update_record" method="post" action="editrecord.php">
            <table border="0">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value=<?php echo $nama;?> required></td>
                </tr>
                <tr>
                    <td>tanggal</td>
                    <td><input type="date" name="tanggal"value=<?php echo $tanggal;?> required></td>
                </tr>
                <tr>
                    <td>saldo_masuk</td>
                    <td><input type="number" name="saldo_masuk"value=<?php echo $saldo_masuk;?> required></td>
                </tr>
                <tr>
                    <td><input type="hidden" name="id_transaksi"value=<?php echo $_GET['id_transaksi'];?> class="waves-effect waves-light btn"></td>
                    <td><input type="submit" name="update" value="Update" class="waves-effect waves-light btn"></td>
                </tr>
            </table>
        </form>
    </body>
</html>