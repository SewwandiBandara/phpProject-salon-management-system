<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Queen Parlour</title>
<link rel="stylesheet" href="styles/home.css">
<link rel="stylesheet" href="styles/admindash.css">
</head>
<body background="https://wallpaperaccess.com/full/1204586.jpg">
<!-- header -->
<?php include 'header.php';?>
<br><br>
<!-- body -->


 <div class="container">
        <div class="sidebar">
            <div>
                <a href="appointList.php"><button class="btn" type="submit" name="click">Appointment List</button></a>
            </div>
            <div>
                <a href="adminServices.php"><button class="btn" type="submit">Services</button></a>
            </div>
            <div>
                <a href="adminFeed.php"><button class="btn" type="submit">Feedback messages</button></a>
            </div>
        </div><br><br>
        <a href="index.php"><button class="log-btn" type="submit" name="submit" >LOG OUT</button></a>
    </div>
   

 

<!-- footer -->
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>