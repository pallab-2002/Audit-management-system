<?php 
include("config/database.php");
$username = $_SESSION['username']; // Ensure this session variable is set

$full_name = ''; // Initialize the full name variable

// Retrieve the full name of the logged-in user
if (isset($username)) {
    $query = "SELECT first_name, middle_name, last_name FROM id_emp WHERE username='$username'";
    $result1 = mysqli_query($conn, $query);

    if ($result1) {
        $row1 = mysqli_fetch_assoc($result1);
        $full_name = trim($row1['first_name'] . " " . $row1['middle_name'] . " " . $row1['last_name']);
    } else {
        header("location: login.php");
        exit(); // Ensure no further code is executed
    }
}
if(isset($_POST['submit'])){
    // Define the path to the PowerShell scripts and execute them
    $scripts = [
        'bios' => 'audit_details\\1bios\\bios.ps1',
        'pop' => 'audit_details\\2pop\\pop.ps1',
        'os_level_pass' => 'audit_details\\3oslevelpassword\\oslevelpassword.ps1',
        'remote_access' => 'audit_details\\4remoteaccess\\remoteaccess.ps1',
        'separate_partition' => 'audit_details\\5separatepartition\\separatepartition.ps1',
        'log_entries' => 'audit_details\\6logenteries\\logenteries.ps1',
        'antivirus_installed' => 'audit_details\\8anti-virusinstalled\\anti-virusinstalled.ps1',
        'antivirus_update' => 'audit_details\\9anti-virusupdated\\anti-virusupdated.ps1',
        'date_time_scan' => 'audit_details\\10DateTimeoflastscan\\DateTimeoflastscan.ps1',
        'suspicious_activity' => 'audit_details\\11SuspiciousActivitydetected\\SuspiciousActivitydetected.ps1',
        'shared_folders' => 'audit_details\\12shared_folders\\get_shared_folders.ps1',
        'p2p' => 'audit_details\\13p2p\\p2p.ps1',
        'wireless' => 'audit_details\\14Wireless\\Wireless.ps1',
        'firewall' => 'audit_details\\15firewall\\get_firewall_status.bat',
        'another_account' => 'audit_details\\18AnotheraccountotherthanAdmin\\AnotheraccountotherthanAdmin.ps1',
        'os_update' => 'audit_details\\19OSupdate\\OSupdate.ps1',
        'unlicensed_software' => 'audit_details\\20UnlicensedSoftwareFound\\UnlicensedSoftwareFound.ps1',
        'ip_address' => 'audit_details\\ip_address\\get_ip_address.ps1',
        'mac_address' => 'audit_details\\mac_address\\get_mac_address.ps1',
        'make' => 'audit_details\\make\\get_make&made.ps1',
        'model' => 'audit_details\\model\\get_make&made.ps1',
        'network_card' => 'audit_details\\networkcardcount\\networkcardcount.ps1',
        'non_authorized' => 'audit_details\\nonauthorizedusb\\nonauthorizedusb.ps1',
        'serial_number' => 'audit_details\\serial_number\\get_serial_number.ps1'
    ];

    $results = [];
    foreach ($scripts as $key => $path) {
        $results[$key] = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$path\"");
    }

    // Sanitize POST inputs
    $group_name = mysqli_real_escape_string($conn, $_POST['group_name']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $room_number = mysqli_real_escape_string($conn, $_POST['room_number']);
    $audited_by = $full_name;

    // Extract and sanitize other POST inputs
    $results = array_map(function($result) use ($conn) {
        return mysqli_real_escape_string($conn, $result);
    }, $results);

    // Prepare SQL query
    $sql1 = "INSERT INTO ams_audit(
                group_name, user_name, room_no, bios, pop, os_level_pass, remote_access, separate_partition, 
                log_enteries, antivirus_installed, antivirus_update, data_time_scan, suspicious_activity, 
                shared_folders, p2p, wireless, firewall, another_account, os_update, unlicensed_software, 
                ip_address, mac_address, make, model, network_card, non_authorized, serial_number, audited_by
            ) VALUES (
                '$group_name', '$username', '$room_number', '{$results['bios']}', '{$results['pop']}', '{$results['os_level_pass']}', 
                '{$results['remote_access']}', '{$results['separate_partition']}', '{$results['log_entries']}', 
                '{$results['antivirus_installed']}', '{$results['antivirus_update']}', '{$results['date_time_scan']}', 
                '{$results['suspicious_activity']}', '{$results['shared_folders']}', '{$results['p2p']}', 
                '{$results['wireless']}', '{$results['firewall']}', '{$results['another_account']}', 
                '{$results['os_update']}', '{$results['unlicensed_software']}', '{$results['ip_address']}', 
                '{$results['mac_address']}', '{$results['make']}', '{$results['model']}', '{$results['network_card']}', 
                '{$results['non_authorized']}', '{$results['serial_number']}', '{$audited_by}'
            )";

    // Execute the query
    $result = $conn->query($sql1);

    if ($result) {
        // echo "Audit record has been inserted successfully.";
        header("location: admin_view.php");
    } else {
        // echo "<script>alert('Error inserting audit record. Please try again.')</script>";
        header("location: admin_audit_form.php");
    }


// Check audit results
$sql1 = "SELECT * FROM ams_audit";
$result1 = $conn->query($sql1);

if ($result1 && $result1->num_rows > 0) {
    // header("location: admin_form.php");
    exit();
} else {
    // echo "<script>alert('Audit Failed!')</script>";
    header("location: auditor_portal.php");
    exit();
}
}
// mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style2.css">
    <style>
        .navbar {
            position: relative;
            color: white;
            font-weight: bolder;
            font-size: x-large;
            float: right;
            margin-top: 121px;
            margin-bottom: -140px;
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
    </style>
</head>
<body style="background: linear-gradient(135deg, #d498c6, #1294a7, #c7e4d9);">
    <header style="background: linear-gradient(45deg, #003366, #ADD8E6, #00509e, #003366);">
        <div class="img">
            <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
            <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
        </div>
        <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
        <h2>Audit Form</h2>
    </header>
    <br><br>
    <nav class="navbar">
        <ul>
            <li><a href="logout.php">LOGOUT</a></li>
            
        </ul>
    </nav>
    <div class="container">
        <div class="audit-form-container" id="audit-form-container">
            <h2>Audit Form</h2><br>
            <form id="audit-form" method="post">
                <label for="audit-username">Username</label>
                <input type="text" id="audit-username" name="username" placeholder="Enter Username" required><br>
                <label for="room-number">Room Number</label>
                <input type="text" id="room-number" name="room_number" placeholder="Enter room no." required><br>
                <label for="group">Group</label>
                <select name="group_name" id="group">
                    <?php
                    $sql = "SELECT * FROM id_group";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Submit" name="submit">
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>
    <script src="index.js"></script>
</body>
</html>

