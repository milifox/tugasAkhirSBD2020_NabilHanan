<!DOCTYPE html>
<html>
    <head>
        <title>KAS SBD - Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="materialize.min.css">
    </head>

    <body class="container amber lighten-5" id="body-content">
        <h2>KAS SBD</h2>

        <!-- cek pesan notifikasi -->
        <?php 
        if(isset($_GET['pesan'])){
            if($_GET['pesan'] == "gagal"){
                echo "Login gagal! username dan password salah!";
            }else if($_GET['pesan'] == "logout"){
                echo "Anda telah berhasil logout";
            }else if($_GET['pesan'] == "belum_login"){
                echo "Anda harus login untuk mengakses halaman admin";
            }
        }
        ?>

        <h3>Login</h3>
        <form method="post" action="cek_login.php">
            <table>
                <tr>
                    <td>Username</td>
                    <td>:</td>
                    <td><input type="text" name="username" placeholder="Masukkan username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>:</td>
                    <td><input type="password" name="password" placeholder="Masukkan password"></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" value="LOGIN" class="waves-effect waves-light btn"></td>
                </tr>
            </table>			
        </form>
        <br><br><br><br><br><br><br><br><br><br><br>
    </body>
</html>