<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/css.css" />
    <title>UKM Bahagia</title>
    <link rel="icon" href="img/logo2.png">
</head>

<body>
    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="img/logo1.png" alt="">
            </div>
            <div class="back">
                <img class="backImg" src="img/logo1.png" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login</div>
                    <form action="#" id="formlogin" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <input type="text" placeholder="Masukkan Username" required name="user">
                            </div>
                            <div class="input-box">
                                <input type="password" placeholder="Masukkan Password" required name="pass">
                            </div>
                            <?php
                            $host = "localhost";
                            $db_user = "root";
                            $db_pass = "";
                            $db_name = "ukmbahagia_db";
                            $connection = new mysqli($host, $db_user, $db_pass, $db_name);
                            if ($connection->connect_error) {
                                die("error");
                            }
                            if (isset($_POST['user'])) {
                                $username = $_POST['user'];
                                $password = $_POST['pass'];

                                $selectUser = "SELECT * FROM `users` WHERE `username` = '$username'";

                                $userQuery = $connection->query($selectUser);

                                if ($userQuery->num_rows > 0) {
                                    $row = $userQuery->fetch_assoc();
                                    $correctPassword = $row["password"];
                                    session_start();
                                    $_SESSION["userfound"] = TRUE;

                                    if ($password != $correctPassword) {
                                        echo "GAGAL LOGIN";
                                    } else {
                                        $id = $row["account_id"];

                                        session_start();

                                        $_SESSION["currentid"] = $id;
                                        $_SESSION["passwordiscorrect"] = TRUE;

                                        header("Location: dashboard.php");
                                    }
                                } else {
                                    echo "GAGAL LOGIN";
                                }
                            }

                            ?>
                            <div class="button input-box">
                                <input type="submit" value="Masuk" name="login">
                            </div>
                            <div class="text sign-up-text">Belum Punya Akun? <label for="flip">Daftar Sekarang</label></div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Daftar</div>
                    <form action="#" id="formdaftar" method="POST">
                        <div class="input-boxes">
                            <div class="input-box">
                                <input type="text" placeholder="Masukkan Nama Depan Anda" required name="namadepan">
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Masukkan Nama Belakang Anda" required name="namabelakang">
                            </div>
                            <div class="input-box">
                                <input type="text" placeholder="Masukkan Username" required name="username">
                            </div>
                            <div class="input-box">
                                <input type="password" placeholder="Masukkan Password" required name="password">
                            </div>
                            <div class="input-box">
                                <input type="password" placeholder="Masukkan Password Kembali" required name="passwordcek">
                            </div>
                            <div class="input-box">
                                <input type="date" id="birth" name="birth" placeholder="TTL" class="input-text">
                            </div>
                            <div class="input-box">
                                <input type="email" placeholder="Masukkan Email" required name="email">
                            </div>
                            <?php
                            $host = "localhost";
                            $db_user = "root";
                            $db_pass = "";
                            $db_name = "ukmbahagia_db";
                            $connection = new mysqli($host, $db_user, $db_pass, $db_name);
                            if ($connection->connect_error) {
                                die("error");
                            }
                            if (isset($_POST['signup'])) {

                                $fname = $_POST['namadepan'];
                                $lname = $_POST['namabelakang'];
                                $birth = $_POST['birth'];
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                $cpass = $_POST['passwordcek'];

                                if ($cpass == $password) {
                                    $sql = "INSERT INTO users (first_name, last_name, birth_date, username, email_address, password)
                                    Values ('$fname', '$lname', '$birth', '$username', '$email', '$password')";
                                    $q = $connection->query($sql);

                                    if ($q === TRUE) {
                                        header("Location: loginjadi.php");
                                    } else {
                                        echo $connection->error;
                                    }
                                }
                                else{
                                    echo "Password Tidak Sama";
                                }
                            }
                            ?>
                            <div class="button input-box">
                                <input type="submit" value="Daftar" name="signup">
                            </div>
                            <div class="text sign-up-text">Sudah Punya Akun? <label for="flip">Login Sekarang</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>