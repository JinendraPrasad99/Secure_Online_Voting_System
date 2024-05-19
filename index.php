<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home.php');
}

if (isset($_SESSION['voter'])) {
    header('location: home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page" style="background-color:#ecf1f9">
    <div class="login-box" style="background-color:#fff ;color:white ; font-size: 22px; font-family:Times">
        <div class="login-logo" style="background-color:#0e1f23 ;color:white ; font-size: 22px; font-family:Times  ">
            <b> Online Voting System</b>
        </div>

        <div class="login-box-body" style="background-color:#fff ;color:white ; font-size: 22px; font-family:Times">
            <p class="login-box-msg" style="color:black ; font-size: 16px; font-family:Times  ">Sign in to start your
                voting session</p>

            <form id="otpForm" action="<?php echo isset($_SESSION['otp_sent']) ? 'verifyotp.php' : 'sendotp.php'; ?>"
                method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="voter" id="voterID" placeholder="Voter's ID"
                        value="<?php echo isset($_SESSION['voter_id']) ? $_SESSION['voter_id'] : ''; ?>" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <?php if (isset($_SESSION['otp_sent'])): ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <?php endif; ?>

                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-curve"
                            style="background-color: #4682B4 ;color:black ; font-size: 12px; font-family:Times"
                            name="<?php echo isset($_SESSION['otp_sent']) ? 'submit_otp' : 'send_otp'; ?>">
                            <?php echo isset($_SESSION['otp_sent']) ? 'Submit OTP' : 'Send OTP'; ?>
                        </button>
                    </div>
                </div>
            </form>

            <?php if (isset($_SESSION['otp_sent'])): ?>
            <p id="timer" style="color:black; font-size: 16px; font-family:Times; text-align: center;">5:00</p>
            <?php endif; ?>
        </div>
        <?php
        if (isset($_SESSION['error'])) {
            echo "
                <div class='callout callout-danger text-center mt20'>
                    <p>" . $_SESSION['error'] . "</p> 
                </div>
            ";
            unset($_SESSION['error']);
        }
        ?>
    </div>

    <?php include 'includes/scripts.php' ?>

    <?php if (isset($_SESSION['otp_sent'])): ?>
    <script>
    var timeleft = 300;
    var downloadTimer = setInterval(function() {
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            document.getElementById("timer").innerHTML = "Expired";
            document.getElementById("otpForm").submit();
        } else {
            document.getElementById("timer").innerHTML = Math.floor(timeleft / 60) + ":" + (timeleft % 60 < 10 ?
                "0" : "") + (timeleft % 60);
        }
        timeleft -= 1;
    }, 1000);
    </script>
    <?php endif; ?>
</body>

</html>