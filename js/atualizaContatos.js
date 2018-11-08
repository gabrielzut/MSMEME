$(document).ready(function () {

    getAmigos();
    getNumPedidos();

    setInterval(function () {
        getAmigos();
        getNumPedidos();
    }, 5000);

    function getAmigos() {
        $.ajax({
            url: "getAmigos.php",
            method: "POST",
            success: function (data) {
                $('#contatos').html(data);
            }
        })
    }

    function getNumPedidos() {
        $.ajax({
            url: "getNumPedidos.php",
            method: "POST",
            success: function (data) {
                $('#numPedidos').html(data);
            }
        })
    }
});