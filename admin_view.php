
<?php
$servername = "localhost";
$username = "root";  // Update with your MySQL username
$password = "";  // Update with your MySQL password
$dbname = "cfees";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Audit</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->

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
            /* font-size: 80%; */
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
            /* width: max-content; */
            background-color: #fff;
            padding: 20px;
            margin-top: 110px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .navbar{
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

    li{
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
    /* align-items: center; */
    /* background-color: #333; */
    color: white;
    text-align: center;
    padding: 1px;
    /* margin-bottom: -10vh; */
    width: 100%;
    bottom: 0;
}
    </style>
</head>
<body>
<body style="background: linear-gradient(135deg,#d498c6,#1294a7,#c7e4d9 );">
    <header style="background: linear-gradient(45deg,#003366,#ADD8E6, #00509e, #003366);">
    
        <!-- <div class="navbar" id="navbar"> -->
            <div class="img">
                <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
                <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
            </div>
            <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>

            <nav class="navbar">
                <ul>
                    
                    <li><a href="logout.php">LOGOUT</a></li>
                    
                    <li><?php //include ("navbar/name.php");?></li>
                </ul>
            </nav>
    </header><br>
    <br>
    

    <div class="output-section">
    <h1>Audit Results</h1>
        <div class="card-body">
            <table>
                <thead>
                    <tr>
                        <th>S.No.</th>
                        <th>username</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Pc Serial No.</th>
                        <th>Audited by</th>
                        <th>Audited date & time</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from  ams_audit";
                    $result = $conn->query($sql);
                    $i=1;
                    while($row=$result->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?php echo $i++ ?></td> 
                            <td><?php echo $row['user_name'] ?></td>
                            <td><?php echo $row['make'] ?></td>
                            <td><?php echo $row['model'] ?></td>
                            <td><?php echo $row['serial_number'] ?></td>
                            <td><?php echo $row['audited_by'] ?></td>
                            <td><?php echo date("M d, Y H:i",strtotime($row['created_at'])) ?> </td>
                            <td><button value="View"></button></td>
                        </tr>
                        <?php endwhile; ?>
                        <?php if($result->num_rows <=0): ?>
                            <tr>
                                <th class="tex-center" colspan="25">No data to display.</th>
                            </tr>
                            <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>


    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>
</body>
</html>