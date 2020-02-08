$(document).ready(function() {
    $("#btn-add").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'POST',
            url: '/categories',
            data: {
                name: $("#frmAddCategory input[name=name]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmAddCategory').trigger("reset");
                $("#frmAddCategory .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#add-category-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#add-category-errors').append('<li>' + value + '</li>');
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
            url: '/categories/' + $("#frmEditCategory input[name=category_id]").val(),
            data: {
                name: $("#frmEditCategory input[name=name]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditCategory').trigger("reset");
                $("#frmEditCategory .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-category-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-category-errors').append('<li>' + value + '</li>');
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
            url: '/categories/' + $("#frmDeleteCategory input[name=category_id]").val(),
            dataType: 'json',
            success: function(data) {
                $("#frmDeleteCategory .close").click();
                window.location.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });
});

function addCategoryForm() {
    $(document).ready(function() {
        $("#add-error-bag").hide();
        $('#addCategoryModal').modal('show');
    });
}

function editCategoryForm(category_id) {
    $.ajax({
        type: 'GET',
        url: '/categories/' + category_id,
        success: function(data) {
            $("#edit-error-bag").hide();
            $("#frmEditCategory input[name=name]").val(data.category.name);
            $("#frmEditCategory input[name=category_id]").val(data.category.id);
            $('#editCategoryModal').modal('show'); 
        },
        error: function(data) {
            console.log(data);
        }
    });
}

function deleteCategoryForm(category_id) {
    $.ajax({
        type: 'GET',
        url: '/categories/' + category_id,
        success: function(data) {
            $("#frmDeleteCategory #delete-title").html("Se eliminará la categoría: (" + data.category.name + ")");
            $("#frmDeleteCategory input[name=category_id]").val(data.category.id);
            $('#deleteCategoryModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}