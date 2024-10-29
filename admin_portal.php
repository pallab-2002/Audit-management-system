<?php 
echo "Hello Admin";
?>
<?php
echo "Hello auditor!";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style1.css">
    <title>Document</title>
    
</head>
<style>
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

</style>
<body style="background: linear-gradient(135deg,#d498c6,#1294a7,#c7e4d9 );">
    <!-- <table border="10" > -->
    <header style="background: linear-gradient(45deg,#003366,#ADD8E6, #00509e, #003366);">
        <!-- <div class="navbar" id="navbar"> -->
            <div class="img">
                <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
                <img src="Image/logo.png" alt="logo" class="logo" style="border-radius: 75px;">
            </div>
            <h1>Centre for Fire, Explosive and Environment Safety (CFEES)</h1><br>
            <h2>Auditor DASHBOARD</h2>

            <nav class="navbar">
                <ul>
                    
                    <li><a href="logout.php">LOGOUT</a></li>
                    
                    <li><?php include ("navbar/name.php");?></li>
                </ul>
            </nav>
        <!-- </div> -->
    </header>
    <br>
    <br>
    <br>
    

    
    <div class="row">
        <div class="column">
            <img src="Image/Audit management software.png" alt="Audit Management Software">
        </div>
        <div class="column">
            <div class="buttons">
                <button name="auditoption" onclick="window.location.href='admin_audit_form.php';">DoAudit</button>
                <button name="auditoption" onclick="window.location.href='admin_view.php';">ViewAudit</button>
                
            </div>

        </div>
        <!-- <div class="column2">
            <h2 id ="Welcome-message">Welcome</h2>
        </div> -->
    </div>
    
    
    <footer>
        <p>&copy; 2024 CFEES. All rights reserved.</p>
    </footer>

    <!-- </table> -->
    <script src="index.js"></script>
</body>
</html>