<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="./login.css">
</head>
<body>
    <form action="./../index.html" method="POST">
        <div class="login-container">
            <div class="header">
                <img src="../images/marutrao_ghule_patil.jpg" alt="Logo" class="logo">
            </div>
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" onclick="login()" class="login-button" value="Login">
        </div>
    </form>
</body>
</html>


