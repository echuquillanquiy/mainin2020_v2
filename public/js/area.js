$(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/areas',
            data: {
                name: $("#frmAddArea input[name=name]").val(),
                description: $("#frmAddArea textarea[name=description]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmAddArea').trigger("reset");
                $("#frmAddArea .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-area-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#add-area-errors').append('<li>' + value + '</li>');
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
            url: '/areas/' + $("#frmEditArea input[name=area_id]").val(),
            data: {
                name: $("#frmEditArea input[name=name]").val(),
                description: $("#frmEditArea textarea[name=description]").val(), 
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditArea').trigger("reset");
                $("#frmEditArea .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-area-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-area-errors').append('<li>' + value + '</li>');
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
            url: '/areas/' + $("#deleteAreaModal input[name=area_id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#deleteAreaModal .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addAreaForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#addAreaModal').modal('show');
    });
}

function editAreaForm(area_id) {
    $.ajax({
        type: 'GET',
        url: '/areas/' + area_id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditArea input[name=name]").val(data.area.name);
            $("#frmEditArea textarea[name=description]").val(data.area.description);
            $("#frmEditArea input[name=area_id]").val(data.area.id);
            $('#editAreaModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteAreaForm(area_id) {
    $.ajax({
        type: 'GET',
        url: '/areas/' + area_id,
        success: function(data) {
            $("#frmDeleteArea #delete-title").html("Se eliminará el área: (" + data.area.name + ")");
            $("#frmDeleteArea input[name=area_id]").val(data.area.id);
            $('#deleteAreaModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}