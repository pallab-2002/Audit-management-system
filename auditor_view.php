<?php
session_start(); // Start the session

$servername = "localhost";
$dbusername = "root";  // Update with your MySQL username
$dbpassword = "";  // Update with your MySQL password
$dbname = "cfees";

$username = isset($_SESSION['username']) ? $_SESSION['username'] : ''; // Get the session username

$full_name = ''; // Initialize the full name variable

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the full name of the logged-in user
if (!empty($username)) {
    $query = "SELECT first_name, middle_name, last_name FROM id_emp WHERE username='$username'";
    $result1 = $conn->query($query);

    if ($result1 && $result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $full_name = trim($row1['first_name'] . " " . $row1['middle_name'] . " " . $row1['last_name']);
    } else {
        header("location: login.php");
        exit(); // Ensure no further code is executed
    }
} else {
    header("location: login.php");
    exit(); // Ensure no further code is executed
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Audit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .logo {
            height: 150px;
            width: 150px;
            border-radius: 75px;  
        }

        header {
            overflow: hidden;
            position: fixed;
            background-color: rgb(5, 5, 77);
            width: 100%;
            left: -2px;
            top: -2px;
            padding-bottom: 60px;
            color: #fff;
            text-align: center;
            width: 100%;
        }

        .img {
            position: fixed;
            display: flex;
            margin-top: 2px;
            width: 90%;
            left: 5%;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
        }

        h1 {
            text-align: center;
        }
        .output-section {
            background-color: #fff;
            padding: 20px;
            margin-top: 110px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar {
            color: white;
            font-weight: bolder;
            font-size: x-large;
        }

        a {
            text-decoration: none;
            color: white;
            cursor: pointer;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            float: right;
            padding-left: 60px;
            padding-right: 10px;
            display: inline;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            position: fixed;
            left: -2px;
            color: white;
            text-align: center;
            padding: 1px;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body style="background: linear-gradient(135deg,#d498c6,#1294a7,#c7e4d9 );">
    <header style="background: linear-gradient(45deg,#003366,#ADD8E6, #00509e, #003366);">
        <div class="img">
            <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
            <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
        </div>
        <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
        <br><br>
        <nav class="navbar">
            <ul>
                <li><a href="logout.php">LOGOUT</a></li>
                <li><?php //include ("navbar/name.php");?></li>
            </ul>
        </nav>
    </header><br><br>
    <div class="output-section">
        <h1>Audit Results</h1>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>Username</th>
                        <th>Group</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>PC Serial No.</th>
                        <th>Audited Date & Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM ams_audit WHERE audited_by = '$full_name'";
                    $result = $conn->query($sql);
                    $i = 1;
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()):
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td> 
                                <td><?php echo $row['user_name'] ?></td>
                                <td><?php echo $row['group_name'] ?></td>
                                <td><?php echo $row['make'] ?></td>
                                <td><?php echo $row['model'] ?></td>
                                <td><?php echo $row['serial_number'] ?></td>
                                <td><?php echo date("M d, Y H:i", strtotime($row['created_at'])) ?></td>
                                <td><button value="View">View</button></td>
                            </tr>
                        <?php endwhile; 
                    } else { ?>
                        <tr>
                            <td colspan="8" class="text-center">No data to display.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>
</body>
</html>
