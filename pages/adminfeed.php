<?php
include 'database/connection.php';

            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Queen Parlour</title>
<link rel="stylesheet" href="styles/home.css">
<!-- <link rel="stylesheet" href="styles/admindash.css"> -->
</head>
<body background="https://wallpaperaccess.com/full/1204586.jpg">
<!-- header -->
<?php include 'header.php';?>
<br><br>

<!-- body part -->
 <link rel="stylesheet" href="styles/adminfeed.css">
<?php
    $stmt = $pdo->query("SELECT * FROM `contact` ORDER BY id DESC");
    $feed = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<table class="app" border ="1" align="center">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone number</th>
            <th>Message</th>
        </tr>
        <?php foreach ($feed as $msg): ?>
        <tr>
            <td><?= $msg['id']; ?></td>
            <td><?= $msg['first_name']; ?></td>
            <td><?= $msg['last_name']; ?></td>
            <td><?= $msg['email']; ?></td>
            <td><?= $msg['phone_number']; ?></td>
            <td><?= $msg['message']; ?></td>
        </tr>
        <?php endforeach; ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<!-- footer -->
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>