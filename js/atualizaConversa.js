$(document).ready(function () {

    emailConversa = $('#emailConversa').text();

    getContato();
    getMensagens();

    setInterval(function () {
        getContato();
        getMensagens();
    }, 5000);

    function getContato() {
        $.ajax({
            url: "getContato.php",
            method: "POST",
            data: {
                "emailConversa": emailConversa
            },
            success: function (data) {
                $('#contato').html(data);
            }
        })
    }

    function getMensagens() {
        $.ajax({
            url: "getMensagens.php",
            method: "POST",
            data: {
                "emailConversa": emailConversa
            },
            success: function (data) {
                $('#mensagens').html(data);
            }
        })
    }
});