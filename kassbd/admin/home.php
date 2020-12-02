<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['status']!="login"){
header("location:../login.php?pesan=belum_login");
}
?>

<?php
include_once("config.php");

$result = mysqli_query($conn, "SELECT a.nama, a.divisi, a.no_hp, b.bendahara 
                        FROM anggota a LEFT JOIN bendahara b ON a.divisi=b.divisi");

?>

<html>
    <head>
        <title>KAS SBD</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="materialize.min.css">
    </head>

    <body class="container amber lighten-5" id="body-content">
        <h2>KAS SBD</h2>
        <div class="row">
            <div class="col s3 m3 l3">
            <a href="record.php" class="waves-effect waves-light btn">Record</a>
            </div>
            <div class="col s3 m3 l3">
            <a href="recorddivisi.php" class="waves-effect waves-light btn">Record per Divisi</a>
            </div>
            <div class="col s3 m3 l3">
            <a href="daftarbendahara.php" class="waves-effect waves-light btn">Daftar Bendahara</a>
            </div>
            <div class="col s3 m3 l3">
            <a href="logout.php" class="waves-effect waves-light btn">Logout</a>
            </div>
        </div>

        <h3>Daftar Anggota</h3>
        
        <table width='80%' border=1>
            <tr>
                <th>Nama</th><th>Divisi</th><th>No. HP</th><th>Bendahara</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$user_data['nama']."</td>";
                echo "<td>".$user_data['divisi']."</td>";
                echo "<td>".$user_data['no_hp']."</td>";
                echo "<td>".$user_data['bendahara']."</td>";
            }
            ?>
        </table>
    </body>
</html>