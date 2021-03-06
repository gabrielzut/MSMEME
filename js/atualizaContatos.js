$(document).ready(function () {
    pesquisa = "";

    atualizaPesquisa();
    getAmigos();
    getNumPedidos();

    setInterval(function () {
        atualizaPesquisa();
        getAmigos();
        getNumPedidos();
    }, 3000);

    function atualizaPesquisa() {
        pesquisa = $('#pesquisa').val();
    }

    function getAmigos() {
        $.ajax({
            url: "php/getAmigos.php",
            method: "POST",
            data: {
                "pesquisa": pesquisa
            },
            success: function (data) {
                $('#contatos').html(data);
            }
        })
    }

    function getNumPedidos() {
        $.ajax({
            url: "php/getNumPedidos.php",
            method: "POST",
            success: function (data) {
                $('#numPedidos').html(data);
            }
        })
    }
});