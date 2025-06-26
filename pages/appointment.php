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

<body id="body" background="https://wallpaperaccess.com/full/1204586.jpg">


<?php include 'header.php';?>

<link rel="stylesheet" href="styles/appointment.css">
    <div id="f1">
        <h4>Reservation</h4>
        <h2>Make an appointment</h2>
        <form name="f1" action="" method="post">
            <div>
                <label>Name</label><br>
                <input type="text" id="name" name="name" size=50 required /> <br><br>
                <label>Email</label><br>
                <input type="email" id="email" name="email" size=50 required /><br><br>
                <label>Select services</label><br>
                <!-- <input type="services" id="services" name="services" /><br><br> -->
                 <select name="services">
                    <option value="Hair color">Hair color</option>
                    <option value="Straight hair">Straight hair</option>
                    <option value="Hair wash">Hair wash</option>
                    <option value="Make eyebrows">Make eyebrows</option>
                    <option value="Normal makeup">Normal makeup</option>
                    <option value="Full makeup">Full makeup</option>
                    <option value="Normal facial">Normal facial</option>
                    <option value="Special facial">Special facial</option>
                    <option value="Dressing">Dressing</option>
                    <option value="Bridal dressing">Bridal dressing</option>
                    <option value="Hair layer cut">Hair layer cut</option>
                    <option value="Nail color">Nail color</option>
                    <option value="Skin care">Skin care</option>
                    <option value="Hair treatment">Hair treatment</option>
                    <option value="Shampoo and set">Shampoo and set</option>
                 </select>
                 <br><br>
                <label>Date</label><br>
                <input type="date" id="date" name="date" /><br><br>
                <label>Time</label><br>
                <input type="time" id="time" name="time" /><br><br>
                <label>Mobile no</label><br>
                <input type="text" id="mobileno" name="mobileno" /><br><br>
            </div>
            <a href="thank.php"><button class="btn" type="submit" name="submit">Make an appointment</button></a>
            <button class="btn" type="reset" name="reset">Cancel</button>
        </form>
    </div>


    
    <br><br>
<?php include 'footer.php'; ?>

</body>
</html>