$(document).ready(function (){
    $('.ver-foto').on('click', function(event){
        event.preventDefault();
        const url = $(this).attr('href');
        const data = {
            _token: $('input[name=_token]').val(),
        }
        ajaxRequest(data, url, 'verFoto');
    });
    
    function ajaxRequest(data, url){
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            success: function(respuesta){
                $('#modal-ver-foto .modal-body').html(respuesta);
                $('#modal-ver-foto').modal('show');
            }
        });
    }
});
