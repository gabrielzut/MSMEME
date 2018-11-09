$(document).ready(function () {

    emailConversa = $('#emailConversa').text();

    getContato();
    getMensagens();

    $('#bold').click(function () {
        alert(document.getElementById('txArea').selectionStart)
        //alert($('#txArea').val().substring($('#txArea').selectionStart, $('#txArea').selectionEnd));
    });

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