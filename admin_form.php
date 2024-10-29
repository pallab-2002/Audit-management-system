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
