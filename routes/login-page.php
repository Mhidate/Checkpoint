<!DOCTYPE html>
<html>

<head>
    <title>login form</title>
    <link rel="stylesheet" href="../public/css/login.css" />

</head>

<body>
    <div class="container">
        <form action="../app/login/proses-login.php" method="post">
            <br>
            <br>
            <marquee>Isi username dan password dengan benar</marquee>
            <br>
            <br>
            <input placeholder="username" type="text" name="username" />
            <br>
            <input placeholder="password" type="password" name="password" id="password" />
            <br>
            <br>
            <br>
            <button class="sig" type="submit">login</button><br><br>
        </form>
        <div class="par par-1 ">
        </div>
        <div class="par par-2">
            <a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Jam :</a><br>
            <h1 style="font-size: 19px; font-family: arial;" id="jam"></h1>
        </div>
    </div>
    <div class="par par-4 "></div>
    <script src="../script/jam.js"></script>
</body>

</html>