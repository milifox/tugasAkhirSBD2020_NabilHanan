<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['status']!="login"){
header("location:../login.php?pesan=belum_login");
}
?>

<?php
include_once("config.php");
?>

<html>
    <head>
        <title>KAS SBD - Record Divisi</title>
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

        <h3>Cari Divisi</h3>
 
        <form action="recorddivisi.php" method="get">
            <input type="text" name="cari">
            <input type="submit" value="Cari" class="waves-effect waves-light btn">
        </form>
        
        <?php 
            if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            echo "<b>Hasil pencarian : ".$cari."</b>";
            }
        ?>
        
        <table border="1">
            <tr>
                <th>ID Transaksi</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Saldo Masuk</th>
                <th>Divisi</th>
            </tr>
            <?php 
                if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $data = mysqli_query($conn,"SELECT * FROM RECORDDIVISI WHERE divisi like '%".$cari."%'");    
                }else{
                $data = mysqli_query($conn,"SELECT * FROM RECORDDIVISI");  
                }
                while($d = mysqli_fetch_array($data)){
            ?>
            <tr>
            <td><?php echo $d['id_transaksi']; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['tanggal']; ?></td>
            <td><?php echo $d['saldo_masuk']; ?></td>
            <td><?php echo $d['divisi']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <br><br><br><br><br><br><br><br><br><br><br>
    </body>
</html>