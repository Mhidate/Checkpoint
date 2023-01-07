<!DOCTYPE html>
<html lang="en">

<head>
    <title>login form</title>
    <link rel="stylesheet" href="css/login.css" />

</head>

<body>


    <div class="container">


        <form action="action-login.php" method="post">

            <br>
            <br>
            <marquee>Isi username dan password dengan benar</marquee>
            <br>
            <br>
            <input placeholder="username" type="username" name="username" />
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

</body>

<script type="text/javascript">
window.onload = function() {
    jam();
}

function jam() {
    var e = document.getElementById('jam'),
        d = new Date(),
        h, m, s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ':' + m + ':' + s;

    setTimeout('jam()', 1000);
}

function set(e) {
    e = e < 10 ? '0' + e : e;
    return e;
}
</script>

</html>