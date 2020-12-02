<!-- cek apakah sudah login -->
<?php 
session_start();
if($_SESSION['status']!="login"){
header("location:../login.php?pesan=belum_login");
}
?>

<?php
include_once("config.php");

$result = mysqli_query($conn, "SELECT * FROM bendahara");
?>

<html>
    <head>
        <title>KAS SBD - Daftar Bendahara</title>
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

        <h3>Daftar Bendahara</h3>
        
        <table width='80%' border=1 >
            <tr>
            <th>ID Bendahara</th><th>Nama</th><th>No HP</th><th>Divisi</th>
            </tr>
            <?php
            while($user_data = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>".$user_data['id_bendahara']."</td>";
                echo "<td>".$user_data['bendahara']."</td>";
                echo "<td>".$user_data['no_hp']."</td>";
                echo "<td>".$user_data['divisi']."</td>";
            }
            ?>
        </table>
    </body>
</html>