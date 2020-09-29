$(function(){

    //Получить клик ивент кнопки апдейт
    $('#modalUpdateButton').click(function () {
        $('#modal_update').modal('show')
            .find('#modalUpdate')
            .load($(this).attr('value'));
    })
});