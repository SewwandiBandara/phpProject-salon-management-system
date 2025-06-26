<?php
    include "database/connection.php";
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Queen Parlour</title>
   
    <link rel="stylesheet" href="styles/home.css">
</head>
<body background="https://wallpaperaccess.com/full/1204586.jpg">
<?php include 'header.php';?>

<br>
<link rel="stylesheet" href="styles/services.css">

<?php
    $stmt = $pdo->query("SELECT * FROM `services` ORDER BY id ASC");
    $service = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
<table class="t1" border ="1" align="center">
        <tr>
            
            <th>Srrvice type</th>
            <th>Price</th>
        </tr>
        <?php foreach ($service as $ser): ?>
        <tr>
            
            <td><?= $ser['service_name']; ?></td>
            <td><?= $ser['price']; ?></td>
        </tr>
        <?php endforeach; ?>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<?php include 'footer.php'; ?>
</body>
</html>
