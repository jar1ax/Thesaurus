$(function(){

    //Получить клик ивент кнопки Загрузить изображение
    $('#modalUploadButton').click(function () {
        $('#modal_upload').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    })
});