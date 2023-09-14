<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>oop-reg</title>
</head>
<body>
    <form action="includes/signup.inc.php" method="post">
        <h3>oop-reg</h3>
        <label for="uid">Username</label>
        <input type="text" name="uid" id="uid"><br>
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>
        <label for="Password">Password</label>
        <input type="password" name="password" id="Password"><br>
        <label for="pwd_repeat">Repeat Password</label>
        <input type="password" name="pwd_repeat" id="pwd_repeat"><br>

        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>