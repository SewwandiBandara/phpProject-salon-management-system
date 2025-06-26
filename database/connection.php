<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beauty_db";


$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=beauty_db', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

//user registration

if(isset($_POST['register'])){
    $firstName = $conn->real_escape_string($_POST['firstName']);
     $lastName = $conn->real_escape_string($_POST['lastName']); 
     $email = $conn->real_escape_string($_POST['email']); 
     $username = $conn->real_escape_string($_POST['username']); 
     $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT); 
     
     // Insert into users table 
    //  $stmt = $conn->prepare("INSERT INTO user_reg (firstName, lastName, email, username, password) 
    //  VALUES (?, ?, ?, ?, ?)");
    //  $stmt->bind_param("sssss", $firstName, $lastName, $email, $username, $password); 
     
    //  if ($stmt->execute()) { 
    //     echo "<script>alert('Successfully registered!');</script>";
    //     echo '<script>window.location.href="userlogin.php";</script>';
    // } 
    // else { 
    //     echo "Error: " . $stmt->error; 
    // } 
    
    // $stmt->close();
    
    $ret=mysqli_query($conn, "SELECT email FROM user_reg WHERE email='$email'");
    $result=mysqli_fetch_array($ret);
    if($result>0){

    echo "<script>alert('This email  already associated with another account!.');</script>";
        }
    else{
        $sql = "INSERT INTO user_reg (firstName,lastName,email,username, password) VALUES ('$firstName','$lastName', '$email','$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Successfully registered!');</script>";
        echo '<script>window.location.href="userlogin.php";</script>';
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }


}


//login 
elseif(isset($_POST['login'])){
$username = $conn->real_escape_string($_POST['username']); 
$password = $conn->real_escape_string($_POST['password']); 

// Fetch the user's data 
// $stmt = $conn->prepare("SELECT password FROM user_reg WHERE username = ?"); 
// $stmt->bind_param("s", $username); $stmt->execute(); 
// $stmt->bind_result($hashed_password); 

// if ($stmt->fetch()) { 
//     if (password_verify($password, $hashed_password)) { 
        
        // Password is correct, set session variables 
//        $_SESSION['username'] = $username; 
        
//         echo "<script>alert('Login successful!');</script>";
//         echo '<script>window.location.href="appointment.php";</script>';
//     } 
//     else { 
//         echo "Invalid username or password."; 
//     } 
// } else { 
//     echo "Invalid username or password."; 
// } 
// $stmt->close();

$sql = "SELECT * FROM user_reg WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "<script>alert('Login successful!');</script>";
            echo '<script>window.location.href="appointment.php";</script>';
        } else {

            $sql = "INSERT INTO user_login (id,username, password) VALUES ('$username', '$password')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Successfully registered!');</script>";
                    echo '<script>window.location.href="userlogin.php";</script>';
                } 
            echo "<script>alert('Invalid password.');</script>";
        }
    } else {
        echo "<script>alert('No account found with this username.');</script>";
    }

}

//admin login

elseif(isset($_POST['login'])){
    $username = $conn->real_escape_string($_POST['username']); 
    $password = $conn->real_escape_string($_POST['password']); 
    
    // Fetch the admin user's data 
    $stmt = $conn->prepare("SELECT password FROM admin_login WHERE username = ?"); 
    $stmt->bind_param("s", $username); $stmt->execute(); 
    $stmt->bind_result($hashed_password); if ($stmt->fetch()) { 
        if (password_verify($password, $hashed_password)) { 
            // Password is correct, set session variables and redirect 
            $_SESSION['admin_username'] = $username; 
            echo "<script>alert('Login successful!');</script>";
            header("Location: admindashboard.php"); 
            exit(); 
        } 
        else { 
            echo "<script>alert('Invalid username or password.');</script>";
        } 
    } else { 
        echo "<script>alert('Invalid username or password.');</script>";
    } 
    $stmt->close();

    }


// user make appointments
elseif(isset($_POST['submit'])){

$name = $conn->real_escape_string($_POST['name']); 
$email = $conn->real_escape_string($_POST['email']); 
$service = $conn->real_escape_string($_POST['services']); 
$date = $conn->real_escape_string($_POST['date']); 
$time = $conn->real_escape_string($_POST['time']); 
$mobile_no = $conn->real_escape_string($_POST['mobileno']); 

// Insert into appointments table 
$stmt = $conn->prepare("INSERT INTO appointments (name, email, service, appointment_date, appointment_time, mobile_no) 
VALUES (?, ?, ?, ?, ?, ?)"); 
$stmt->bind_param("ssssss", $name, $email, $service, $date, $time, $mobile_no); 

if ($stmt->execute()) { 
    echo "<script>alert ('Appointment booked successfully!');</script>"; 
    echo '<script>window.location.href="thank.php";</script>';
} 
else { 
    echo "Error: " . $stmt->error; 
} 
$stmt->close();

}



// user makes contact or feedback

elseif(isset($_POST['send'])){
    $first_name = $conn->real_escape_string($_POST['fname']);
     $last_name = $conn->real_escape_string($_POST['lname']); 
     $email = $conn->real_escape_string($_POST['email']); 
     $phone_number = $conn->real_escape_string($_POST['number']); 
     $message = $conn->real_escape_string($_POST['message']); 
     
     // Insert into contact_messages table 
     
     $stmt = $conn->prepare("INSERT INTO contact (first_name, last_name, email, phone_number, message) 
     VALUES (?, ?, ?, ?, ?)"); 
     
     $stmt->bind_param("sssss", $first_name, $last_name, $email, $phone_number, $message); 
     
     // Execute the statement 
     if ($stmt->execute()) { 
        echo "<script>alert ('Message sent successfully!');</script>"; 
        echo '<script>window.location.href="thank.php";</script>';
    } 
    else { 
        echo "Error: " . $stmt->error; 
    } 
        $stmt->close();
}
 $conn->close(); 
        
 ?>
