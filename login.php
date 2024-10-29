<?php
include("config/database.php");

?>

<!-- If else part for the viewer and the auditor  -->
<?php
// session_start();
$data = mysqli_connect($servername, $username, $password, $dbName);

if ($_SERVER["REQUEST_METHOD" ] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "admin@123") {
        header("location:login.php");

        // echo "Log in to ADMIN LOGIN !";
    } else {
        // $encrypted_password = md5($password);
        $sql = "select * from id_emp where username='".$username."' AND password='".$password."'";
        $result = mysqli_query($data, $sql);
        $row = mysqli_fetch_array($result);
        if ($row['internal_desig_id']==4) {
            $_SESSION["username"]=$username;
            $_SESSION["user_id"] = $row['id'];
            header("location:auditor_portal.php");

        } 
        else if ($row['internal_desig_id']==3){
                $_SESSION["username"]=$username;
                $_SESSION["id"] = $row['id'];
                header("location:admin_portal.php");
                     
        }
        else if($row['internal_desig_id']==2) {
            $_SESSION["username"]=$username;
            $_SESSION["id"] = $row['id'];
            header("location:emp_view.php");
        }
        else {
            header("location:login.php");
        }
    }
}

// Insert login time if user is logged in
// if (isset($_SESSION["user_id"])) {
//     $user_id = $_SESSION["user_id"];

//     $update_login_time_sql = "INSERT INTO user_logins (id, login_time) VALUES (?, CURRENT_TIMESTAMP)";
//     $stmt = mysqli_prepare($data, $update_login_time_sql);
//     mysqli_stmt_bind_param($stmt, "i", $user_id);
//     mysqli_stmt_execute($stmt);
// }

// Close connection
mysqli_close($data);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Login</title>
</head>
<body style="background: linear-gradient(135deg,#d498c6,#1294a7,#c7e4d9 );">
<header style="background: linear-gradient(45deg,#003366,#ADD8E6, #00509e, #003366);">
        <!-- <div class="navbar" id="navbar"> -->
            <div class="img">
                <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
                <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
            </div>
            <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
            <h2>End Point Audit Software</h2>
        <!-- </div> -->
    </header>
    <br>
    <br>
    
    <div class="container">
        <div class="login-container" id="login-container">
            <form id="login-form" method="POST">
                <h2>Login</h2>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter Your Username" required>
                
                    <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
                <div>
                    <input type="checkbox" onclick="myFunction()"> Show Password
                </div><center>
                <input type="submit" value="Login" name="submit"></center>
            </form>
        </div>
    </div>
    <script src="js/index.js"></script>
    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>
</body>
</html>