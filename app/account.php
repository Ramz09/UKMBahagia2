<?php
    include 'phpscripts/connect.php';

    session_start();

    $id = $_SESSION['currentid'];

    $selectUser = "SELECT * FROM `users` WHERE `account_id` = '$id'";

    $userQuery = $connection->query($selectUser);

    if ($userQuery->num_rows > 0) {
        $row = $userQuery->fetch_assoc();
        
        $fname = $row['first_name'];
        $lname = $row['last_name'];
        $birth = $row['birth_date'];
        $email = $row['email_address'];
        $username = $row['username'];
        $password = $row['password'];
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Pengaturan Akun | UKM Bahagia</title>
        <meta name="description" content="Budgetin Account Settings Page">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style-global-app.css">
        <link rel="stylesheet" type="text/css" href="css/style-app-acc.css">
        <script defer type="text/javascript" src="js/validation-edit.js"></script>
    </head>
    <body>
        <div class="wrapper">
<!-- ----------------------------------------------SIDEBAR------------------------------------------------- -->
            <div class="container-sidebar">
                <div class="container-sidebar-logo">
                    <a href="" class="logo-sidebar">UKM Bahagia</a>
                </div>
                <div class="nav-and-acc">
                    <ul>
                        <li>
                            <button onclick="location.href='dashboard.php'" class="btn-sidebar">
                                <img src="img/icons/DB.png" class="icons-sidebar">Dashboard</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='transaction.html'" class="btn-sidebar">
                                <img src="img/icons/TS.png" class="icons-sidebar">Transaksi</a>
                            </button>
                        </li>
                        <li>
                            <button class="btn-sidebar btn-sidebar-active">
                                <img src="img/icons/PF-ACTIVE.png" class="icons-sidebar">Profil</a>
                            </button>
                        </li>
                        <li>
                            <button onclick="location.href='loginjadi.php'" class="btn-sidebar">
                                <img src="img/icons/OUT.png" class="icons-sidebar">Keluar</a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
<!-- ----------------------------------------------CONTENT------------------------------------------------- -->
            <div class="container-content">
                <div class="content-middle">
                    <div class="container-content-title">
                        <h2>Profil</h2>
                    </div>
                    <div class="pane-content">
                        <div class="container-content-data">
                            <h2>Detail akun</h2>
                        </div>
                        <form id="form_personal" action="phpscripts/users_edit_personal.php" method="POST" name="form_personal" autocomplete="off">
                            <ul>
                                <li>
                                    <div class="div-l">
                                        <label>Nama Depan</label>
                                        <input type="text" value="<?php echo ($fname); ?>" id="fname" name="fname" placeholder="First name" class="textfield">
                                    </div>
                                    <div class="div-r">
                                        <label>Nama Belakang</label>
                                        <input type="text" value="<?php echo ($lname); ?>" id="lname" name="lname" placeholder="Last name" class="textfield">                                        
                                    </div>
                                </li>
                                <li>
                                    <label>Tempat Tanggal Lahir</label>
                                    <input type="date" value="<?php echo ($birth); ?>" id="birth" name="birth" placeholder="Date of birth" class="textfield">
                                </li>
                                <li>
                                    <label>Email </label>
                                    <input type="text" value="<?php echo ($email); ?>" id="email" name="email" placeholder="Email address" class="textfield">
                                </li>
                                <li>
                                    <label>Username</label>
                                    <input type="text" value="<?php echo ($username); ?>" id="username" name="username" placeholder="Username" class="textfield">
                                </li>
                                <li>
                                    <label>Password</label>
                                    <input type="password" value="<?php echo ($password); ?>" id="password" name="password" placeholder="Password" class="textfield">
                                </li>
                                <li>
                                    <input type="submit" class="btn-save" value="Simpan">
                                    <div id="error2"></div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
               
            </div>
        </div>
    </body>
</html>