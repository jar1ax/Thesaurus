$(function(){
    //Получить клик ивент кнопки create
    $('#modalButton').click(function () {
    $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
    })
});
$(function(){
    //Получить клик ивент кнопки create
    $('#modalUpdateButton').click(function () {
        $('#modalUpdate').modal('show')
            .find('#modalUpdateContent')
            .load($(this).attr('value'));
    })
});
