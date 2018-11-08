$(document).ready(function () {

    getPedidos();

    setInterval(function () {
        getPedidos();
    }, 5000);

    function getPedidos() {
        $.ajax({
            url: "getPedidos.php",
            method: "POST",
            success: function (data) {
                $('#pedidos').html(data);
            }
        })
    }
});