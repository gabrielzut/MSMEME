$(document).ready(function () {

    getContato();
    getMensagens();

    setInterval(function () {
        getContato();
        getMensagens();
    }, 5000);

    emailConversa = $('#emailConversa').html();

    function getContato() {
        $.ajax({
            url: "getContato.php",
            method: "POST",
            data: emailConversa,
            success: function (data) {
                $('#contatos').html(data);
            }
        })
    }

    function getMensagens() {
        $.ajax({
            url: "getMensagens.php",
            method: "POST",
            data: emailConversa,
            success: function (data) {
                $('#numPedidos').html(data);
            }
        })
    }
});