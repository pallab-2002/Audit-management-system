<?php 
    
      
// Define the path to the PowerShell script
$scriptPath1 = 'audit_details\\1bios\\bios.ps1';
$bios = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath1\"");


// Define the path to the PowerShell script
$scriptPath2 = 'audit_details\\2pop\\pop.ps1';
$pop = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath2\"");


// Define the path to the PowerShell script
$scriptPath3 = 'audit_details\\3oslevelpassword\\oslevelpassword.ps1';
$Oslevelpassword = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath3\"");


// Define the path to the PowerShell script
$scriptPath4 = 'audit_details\\4remoteaccess\\remoteaccess.ps1';
$remoteaccess = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath4\"");


// Define the path to the PowerShell script
$scriptPath5 = 'audit_details\\5separatepartition\\separatepartition.ps1';
$sepetatepartition = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath5\"");


// Define the path to the PowerShell script
$scriptPath6 = 'audit_details\\6logenteries\\logenteries.ps1';
$logentries = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath6\"");


// Define the path to the PowerShell script
$scriptPath8 = 'audit_details\\8anti-virusinstalled\\anti-virusinstalled.ps1';
$antivirusinstalled = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath8\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\9anti-virusupdated\\anti-virusupdated.ps1';
$antivirusupdated = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\10DateTimeoflastscan\\DateTimeoflastscan.ps1';
$datetimescan = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\11SuspiciousActivitydetected\\SuspiciousActivitydetected.ps1';
$suspiciousactivity = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\12shared_folders\\get_shared_folders.ps1';
$sharedfolders = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\13p2p\\p2p.ps1';
$p2pInstalled = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\14Wireless\\Wireless.ps1';
$wireless = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\15firewall\\get_firewall_status.bat';
$firewall = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Define the path to the PowerShell script
$scriptPath = 'audit_details\\18AnotheraccountotherthanAdmin\\AnotheraccountotherthanAdmin.ps1';
$anotheraccount = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");



// Define the path to the PowerShell script
$scriptPath = 'audit_details\\19OSupdate\\OSupdate.ps1';
$osupdate = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");

    
// Define the path to the PowerShell script
$scriptPath = 'audit_details\\20UnlicensedSoftwareFound\\UnlicensedSoftwareFound.ps1';
$licensedSoftware = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");
    

    
$scriptPath = "audit_details\\ip_address\\get_ip_address.ps1";
$ip_address = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


$scriptPath = "audit_details\\mac_address\\get_mac_address.ps1";
$mac_address = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");



$scriptPath = "audit_details\\make\\get_make&made.ps1";
$make = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");

$scriptPath = "audit_details\\model\\get_make&made.ps1";
$model = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


$scriptPath = "audit_details\\networkcardcount\\networkcardcount.ps1";
$networkcard = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");

$scriptPath = "audit_details\\nonauthorizedusb\\nonauthorizedusb.ps1";
$nonauthorized = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


$scriptPath = "audit_details\\serial_number\\get_serial_number.ps1";
$serial_number = shell_exec("powershell.exe -ExecutionPolicy Bypass -File \"$scriptPath\"");


// Debug: Display raw output


// Database connection
$servername = "localhost";
$username = "root";  // Update with your MySQL username
$password = "";  // Update with your MySQL password
$dbname = "db_audit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// include("config/database.php");

$sql = "insert into audit_results(serial_number, bios, pop, PasswordRequired, remoteDesktopEnabled, systemDrive, eventLogService, authorizedDevices, commonAntivirus, defender_installed, defenderStatus, defenderStatistics, p2pInstalled, networkAdapters, currentUser,  pendingUpdates, licensedSoftware, mac_address, firewall_status, shared_folders) 
values ('$serial_number', '$bios', '$pop', '$PasswordRequired', '$remoteDesktopEnabled', '$systemDrive', '$eventLogService', '$authorizedDevices', '$commonAntivirus', '$defender_installed', '$defenderStatus', '$defenderStatistics', '$p2pInstalled', '$networkAdapters', '$currentUser', '$pendingUpdates', '$licensedSoftware', '$mac_address', '$firewall_status', '$shared_folders' )" ;

$result = $conn->query($sql);

$sql1 = "select * from audit_results";

$result1 = $conn->query($sql1);
if($result1->num_rows>0){
    header("location:view_audit.php");
    exit();
}
else {
    echo "<script>alert('audit Failed !') </script>";
    header("location:auditor_portal.php");
    exit();
}
