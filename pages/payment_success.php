<?php
session_start();
include '../db.php';

// session मधून email घे (admission.php मध्ये save केलं होतं)
$email = $_SESSION['admission_email'];

// DB मधून student data fetch
$query = "SELECT * FROM admissions WHERE email='$email'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

$phone = $data['phone']; // 📱 DB मधून phone

// message
$message = "🎉 Admission Successful! You paid ₹500. Welcome to VLP School.";
$encoded_msg = urlencode($message);

// WhatsApp link
$whatsapp_link = "https://wa.me/91$phone?text=$encoded_msg";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }

        h2 {
            color: green;
        }

        p {
            font-size: 18px;
        }
        a button {
            height: 40px;
            width: 200px;
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 9px;
        }
        a button:hover {
            background-color: darkgreen;
        }
    </style>
</head>

<body>
    <h2>🎉 Payment Successful!</h2>

    <p>Your admission is confirmed.</p>

    <a href="<?php echo $whatsapp_link; ?>" target="_blank">
        <button>
            Send WhatsApp Message
        </button>
    </a>
</body>

</html>