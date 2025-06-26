<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_db";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $action = $_POST['action']; 

    $service_name = $conn->real_escape_string($_POST['service_name']); 
    $price = $conn->real_escape_string($_POST['price']); 
    $id = isset($_POST['id']) ? $conn->real_escape_string($_POST['id']) : null; 

    if ($action == "insert") { 
        $stmt = $conn->prepare("INSERT INTO services (service_name, price) VALUES (?, ?)"); 
        $stmt->bind_param("ss", $service_name, $price); 
        if ($stmt->execute()) { 
            echo "<script>alert('Service inserted successfully!');</script>";
        } 
        else { 
            echo "Error: " . $stmt->error; 
        } 
        $stmt->close();
    } 
    elseif ($action == "update") { 
        $stmt = $conn->prepare("UPDATE services SET service_name=?, price=? WHERE id=?"); 
        $stmt->bind_param("ssi", $service_name, $price, $id); if ($stmt->execute()) { 
            echo "<script>alert('Service updated successfully!');</script>";
        } 
        else { 
            echo "Error: " . $stmt->error; 
        } 
        $stmt->close();

    } 
    elseif ($action == "delete") { 
        $stmt = $conn->prepare("DELETE FROM services WHERE id=?"); 
        $stmt->bind_param("i", $id); 
        if ($stmt->execute()) { 
            echo "<script>alert('Service deleted successfully!');</script>";
        } 
        else { 
            echo "Error: " . $stmt->error; 
        } 
        $stmt->close(); 
    } 
} 

$result = $conn->query("SELECT * FROM services");
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
<h2 class="tab"><b><center>OUR SERVICES</center></b></h2>
<table class="main-table" align="center">
    <tr>
    <td>
<form action="" method="post"> 
    
    <input type="hidden" name="id" placeholder="ID (for update/delete)"> 
    <label>Service Name:</label><br> <input type="text" name="service_name" required><br><br> 
    <label>Price:</label><br> <input type="text" name="price" required><br><br> 
    <input type="submit" name="action" value="Insert"> 
    <input type="submit" name="action" value="Update"> 
    <input type="submit" name="action" value="Delete">
</form>
</td>
    <td>
<table class="t1" border="2"> 
    <tr> 
        <th>Service</th> 
        <th>Price (RS)</th> 
    </tr> 
    <?php while($row = $result->fetch_assoc()) { ?> 
        <tr> 
            <td><?php echo $row['service_name']; ?></td> 
            <td><?php echo $row['price']; ?></td> 
        </tr> 
    <?php } ?> 
</table> 
</td>
    </tr>
   
</table>

<br><br>
<?php include 'footer.php'; ?>
</body>
</html>
<?php $conn->close(); ?>