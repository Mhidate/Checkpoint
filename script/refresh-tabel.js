
    var auto_refresh = setInterval(
    function () {
       $('#load_content').load('app/tabel/refresh-tabel-index.php').fadeIn("slow");
    }, 1000); // refresh setiap 1000 milliseconds
    