<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="login.css" type="text/css">
</head>
<body>
    <div class="login autocenter">
        <form method="post" action="login.php">
            <div class="form-title">
                Username
            </div>
            <div class="from-input">
                <input type="text" name="username">
            </div>
            <div class="form-title">
                Password
            </div>
            <div class="from-input">
                <input type="password" name="password">
            </div>
            <div class="from-input">
                <input type="submit" value="login"> | Jika belum memiliki akun dapat registrasi <a href='registration.php'>disini</a>
            </div>
        </form>
    </div>

</body>
</html>