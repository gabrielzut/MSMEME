$(document).ready(function () {

    emailConversa = $('#emailConversa').text();

    getContato();
    getMensagens();

    $("[data-toggle=popover]").popover();

    $('#bold').click(function () {
        texto = $("#txArea").val();
        comecoSelecao = $("#txArea").prop("selectionStart");
        fimSelecao = $("#txArea").prop("selectionEnd");
        textoAntes = texto.substr(0, comecoSelecao);
        textoDepois = texto.substr(fimSelecao, texto.length - fimSelecao);
        selecao = texto.substr(comecoSelecao, fimSelecao - comecoSelecao);
        $("#txArea").val(textoAntes + "<strong>" + selecao + "</strong>" + textoDepois);
    });

    $('#italic').click(function () {
        texto = $("#txArea").val();
        comecoSelecao = $("#txArea").prop("selectionStart");
        fimSelecao = $("#txArea").prop("selectionEnd");
        textoAntes = texto.substr(0, comecoSelecao);
        textoDepois = texto.substr(fimSelecao, texto.length - fimSelecao);
        selecao = texto.substr(comecoSelecao, fimSelecao - comecoSelecao);
        $("#txArea").val(textoAntes + "<em>" + selecao + "</em>" + textoDepois);
    })

    $('#under').click(function () {
        texto = $("#txArea").val();
        comecoSelecao = $("#txArea").prop("selectionStart");
        fimSelecao = $("#txArea").prop("selectionEnd");
        textoAntes = texto.substr(0, comecoSelecao);
        textoDepois = texto.substr(fimSelecao, texto.length - fimSelecao);
        selecao = texto.substr(comecoSelecao, fimSelecao - comecoSelecao);
        $("#txArea").val(textoAntes + "<u>" + selecao + "</u>" + textoDepois);
    })

    $('#strike').click(function () {
        texto = $("#txArea").val();
        comecoSelecao = $("#txArea").prop("selectionStart");
        fimSelecao = $("#txArea").prop("selectionEnd");
        textoAntes = texto.substr(0, comecoSelecao);
        textoDepois = texto.substr(fimSelecao, texto.length - fimSelecao);
        selecao = texto.substr(comecoSelecao, fimSelecao - comecoSelecao);
        $("#txArea").val(textoAntes + "<s>" + selecao + "</s>" + textoDepois);
    })

    $('#btnImagem').click(function () {
        $('#imagem').click();
    })

    $(document).on("click", ".emojis button", function () {
        texto = $("#txArea").val();
        comecoSelecao = $("#txArea").prop("selectionStart");
        fimSelecao = $("#txArea").prop("selectionEnd");
        textoAntes = texto.substr(0, comecoSelecao);
        textoDepois = texto.substr(fimSelecao, texto.length - fimSelecao);
        $("#txArea").val(textoAntes + "" + $(this).text() + "" + textoDepois);
    })

    $('#formConversa').on('change', "input#imagem", function (e) {
        e.preventDefault();
        $('#btnEnvio').val('imagem');
        $('#btnEnvio').click();
    });

    setInterval(function () {
        getContato();
        getMensagens();
    }, 5000);

    function getContato() {
        $.ajax({
            url: "php/getContato.php",
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
            url: "php/getMensagens.php",
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