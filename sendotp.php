<?php
session_start();
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['voter'])) {
    $voter_id = $_POST['voter'];
    $conn = new mysqli('localhost', 'root', '', 'votesystem');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM otp WHERE voters_id = ? ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $voter_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = 'An OTP has already been sent. Please check your email.';
        header('location: index.php');
        exit();
    }

    $sql = "SELECT email FROM voters WHERE voters_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $voter_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $voter = $result->fetch_assoc();
        $email = $voter['email'];

        $otp = rand(100000, 999999);
        $expires_at = date('Y-m-d H:i:s', strtotime('+5 minutes'));

        $sql = "INSERT INTO otp (voters_id, otp, expires_at) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $voter_id, $otp, $expires_at);
        $stmt->execute();

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';  
            $mail->SMTPAuth = true;
            $mail->Username = 'youremail@gmail.com'; 
            $mail->Password = 'yourpassword';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('youremail@gmail.com', 'Online Voting System');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Your OTP Code';
            $mail->Body = "<p>Your OTP code is <strong>$otp</strong>. It will expire in 5 minutes.</p>";

            $mail->send();
            $_SESSION['success'] = 'OTP sent successfully.';
            $_SESSION['otp_sent'] = true;
            $_SESSION['voter_id'] = $voter_id;
            header('location: index.php');
        } catch (Exception $e) {
            $_SESSION['error'] = "Mailer Error: {$mail->ErrorInfo}";
            header('location: index.php');
        }
    } else {
        $_SESSION['error'] = 'Voter ID not found.';
        header('location: index.php');
    }

    $stmt->close();
    $conn->close();
} else {
    $_SESSION['error'] = 'Please enter your Voter ID.';
    header('location: index.php');
}
?>