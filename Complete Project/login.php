<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT Customerid, Customerpassword FROM Customers WHERE customeremail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();
    if (password_verify($password, $hashed_password)) {
        session_start();
        header("Location: index.php");
        exit();
        $_SESSION['Customerid'] = $id;
        $error = "welcome";
        // echo "Login successful! ". $username;
    } else {
        // echo "Invalid username or password.";
        $error = "Invalid username or password!";
        // $_SESSION['error'] = "Invalid username or password!";
        header("Location: Registeration.php?error=1");
            }
    $stmt->close();
}

?>
<!-- 
<form method="post" action="register.php">
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form> -->