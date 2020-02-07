$(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/positions',
            data: {
                name: $("#frmAddPosition input[name=name]").val(),
                description: $("#frmAddPosition input[name=description]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmAddPosition').trigger("reset");
                $("#frmAddPosition .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-position-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#add-position-errors').append('<li>' + value + '</li>');
                });
                $("#add-error-bag").show();
            }
        });
    });
    $("#btn-edit").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/positions/' + $("#frmEditPosition input[name=position_id]").val(),
            data: {
                name: $("#frmEditPosition input[name=name]").val(),
                description: $("#frmEditPosition input[name=description]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditPosition').trigger("reset");
                $("#frmEditPosition .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-position-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-position-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });
    $("#btn-delete").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'DELETE',
            url: '/positions/' + $("#frmDeletePosition input[name=position_id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#frmDeletePosition .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addPositionForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#addPositionModal').modal('show');
    });
}

function editPositionForm(position_id) {
    $.ajax({
        type: 'GET',
        url: '/positions/' + position_id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditPosition input[name=name]").val(data.position.name);
            $("#frmEditPosition input[name=description]").val(data.position.description);
            $("#frmEditPosition input[name=position_id]").val(data.position.id);
            $('#editPositionModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deletePositionForm(position_id) {
    $.ajax({
        type: 'GET',
        url: '/positions/' + position_id,
        success: function(data) {
            $("#frmDeletePosition #delete-title").html("Se eliminará el puesto: (" + data.position.name + ")");
            $("#frmDeletePosition input[name=position_id]").val(data.position.id);
            $('#deletePositionModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}