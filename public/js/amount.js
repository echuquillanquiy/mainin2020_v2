$(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/amounts',
            data: {
                description: $("#frmAddAmount input[name=description]").val(),
                amount: $("#frmAddAmount input[name=amount]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmAddAmount').trigger("reset");
                $("#frmAddAmount .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-amount-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#add-amount-errors').append('<li>' + value + '</li>');
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
            url: '/amounts/' + $("#frmEditAmount input[name=amount_id]").val(),
            data: {
                description: $("#frmEditAmount input[name=description]").val(),
                amount: $("#frmEditAmount input[name=amount]").val(), 
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditAmount').trigger("reset");
                $("#frmEditAmount .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-amount-errors').html('');
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
            url: '/amounts/' + $("#frmDeleteAmount input[name=amount_id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#frmDeleteAmount .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addAmountForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#addAmountModal').modal('show');
    });
}

function editAmountForm(amount_id) {
    $.ajax({
        type: 'GET',
        url: '/amounts/' + amount_id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditAmount input[name=description]").val(data.amount.description);
            $("#frmEditAmount input[name=amount]").val(data.amount.amount);
            $("#frmEditAmount input[name=amount_id]").val(data.amount.id);
            $('#editAmountModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteAmountForm(amount_id) {
    $.ajax({
        type: 'GET',
        url: '/amounts/' + amount_id,
        success: function(data) {
            $("#frmDeleteAmount #delete-title").html("Se eliminará el monto: (" + data.amount.description + ' ' +  'S/.' + data.amount.amount +")");
            $("#frmDeleteAmount input[name=amount_id]").val(data.amount.id);
            $('#deleteAmountModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}