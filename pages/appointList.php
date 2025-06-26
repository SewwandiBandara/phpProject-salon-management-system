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
 <link rel="stylesheet" href="styles/appointList.css">
<?php
    $stmt = $pdo->query("SELECT * FROM appointments ORDER BY id DESC");
    $appoints = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<table class="app" border ="1" align="center">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Service</th>
            <th>Date</th>
            <th>Time</th>
            <th>Mobile No</th>
        </tr>
        <?php foreach ($appoints as $appoint): ?>
        <tr>
            <td><?= $appoint['id']; ?></td>
            <td><?= $appoint['name']; ?></td>
            <td><?= $appoint['email']; ?></td>
            <td><?= $appoint['service']; ?></td>
            <td><?= $appoint['appointment_date']; ?></td>
            <td><?= $appoint['appointment_time']; ?></td>
            <td><?= $appoint['mobile_no']; ?></td>
        </tr>
        <?php endforeach; ?>
</table>

<!-- footer -->
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>