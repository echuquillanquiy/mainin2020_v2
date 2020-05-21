$(function () {
    $('#select-department').on('change', onSelectDepartmentChange);

});
function onSelectDepartmentChange()
{
    var department_id = $(this).val();
    
    //AJAX

    $.get('/api/department/'+department_id+'/provinces', function (data) {
        var html_select = '<option value="">[PROVINCIAS]</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="'+data[i].id+'">'+data[i].id+'</option>';
            $('#select-province').html(html_select);
    });
}

$(function () {
    $('#select-province').on('change', onSelectProvinceChange);

});
function onSelectProvinceChange()
{
    var province_id = $(this).val();
    
    //AJAX

    $.get('/api/province/'+province_id+'/district', function (data2) {
        var html_select2 = '<option value="">[DISTRITOS]</option>';
        for (var i = 0; i < data2.length; ++i)
            html_select2 += '<option value="'+data2[i].id+'">'+data2[i].id+'</option>';
            $('#select-district').html(html_select2);
    });
}