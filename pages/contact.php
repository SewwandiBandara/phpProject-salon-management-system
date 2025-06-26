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
</head>
<body background="https://wallpaperaccess.com/full/1204586.jpg">
    
<?php include 'header.php';?>

<link rel="stylesheet" href="styles/contact.css">
<form class="contactForm" action="" method="POST"  target="">
    <div class="sentence">
        <p class="text">Get in touch</p>
        <p class="sub-text">Note your feedback or message</p>
    </div>
    <div class="form-det">
       <div class="first-name">
            <label>First Name</label><br>
            <input type="text" name="fname" placeholder="Please enter first name...">
       </div><br>
       <div class="last-name">
            <label>Last Name</label><br>
            <input type="text" name="lname" placeholder="Please enter last name...">
       </div><br>
        <div class="email">
            <label>Email</label><br>
            <input type="emial" name="email" placeholder="Please enter email...">
        </div><br>
        <div class="number">
            <label>Phone number</label><br>
            <input type="text" name="number" placeholder="Please enter phone number...">
        </div>
        <div class="response">
            <p class="text-msg">What do you have in mind</p>
            <textarea class="message" name="message" placeholder="Please enter message..."></textarea>
        </div><br>
    </div>
    <button type="submit" name="send">Submit</button>
    <a href="index.php"><button>Cancel</button></a>
</form>



<br><br>
<?php include 'footer.php'; ?>
</body>
</html>