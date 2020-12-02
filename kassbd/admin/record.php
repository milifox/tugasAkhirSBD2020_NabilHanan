<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['status']!="login"){
header("location:../login.php?pesan=belum_login");
}
?>

<?php
include_once("config.php");

$result = mysqli_query($conn, "SELECT * FROM transaksi");
?>

<html>
    <head>
        <title>KAS SBD - Record</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="materialize.min.css">
    </head>

    <body class="container amber lighten-5" id="body-content">
        <h2>KAS SBD</h2>

        <div class="row">
            <div class="col s4 m4 l4">
            <a href="home.php" class="waves-effect waves-light btn">Kembali</a>
            </div>
        </div>

        <h3>Record</h3>

        <div class="row">
            <div class="col s4 m4 l4">
            <a href="tambahrecord.php" class="waves-effect waves-light btn">Tambah Record</a>
            </div> 
        </div>
        
        <table width='80%' border=1 >
            <tr>
            <th>ID Transaksi</th><th>Nama</th><th>Tanggal</th><th>Saldo Masuk</th><th>Update</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$user_data['id_transaksi']."</td>";
                echo "<td>".$user_data['nama']."</td>";
                echo "<td>".$user_data['tanggal']."</td>";
                echo "<td>".$user_data['saldo_masuk']."</td>";
                echo "<td><a href='editrecord.php?id_transaksi=$user_data[id_transaksi]'>Edit</a>
                <a href='hapusrecord.php?id_transaksi=$user_data[id_transaksi]'>Delete</a></td></tr>";
            }
            ?>
        </table>
    </body>
</html>