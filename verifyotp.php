<?php
session_start();
include 'includes/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['voter']) && isset($_POST['otp'])) {
    $voter_id = $_POST['voter'];
    $otp = $_POST['otp'];

    $conn = new mysqli('localhost', 'root', '', 'votesystem');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM otp WHERE voters_id = ? AND otp = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $voter_id, $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['voter'] = $voter_id;
        $_SESSION['success'] = 'OTP verified successfully. You are now logged in.';
        $sql = "DELETE FROM otp WHERE voters_id = ? OR expires_at < NOW()";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $voter_id);
        $stmt->execute();
        header('location: home.php');
        exit(); 
    } else {
        $_SESSION['error'] = 'Invalid or expired OTP. Please try again.';
        header('location: index.php');
        exit(); 
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = 'Please enter your Voter ID and OTP.';
    header('location: index.php');
    exit(); 
}
?>