$(document).ready(function () {
    $('#formImagem').on('change', "input#imagem", function (e) {
        e.preventDefault();
        $("#formImagem").submit();
    });
});