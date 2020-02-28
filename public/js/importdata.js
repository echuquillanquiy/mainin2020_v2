$(document).ready(function (){
    $('#file').fileinput({
        language:'es',
        allowedFileExtensions: ['jpg', 'jpeg', 'png'],
        maxFilesSize: 1000,
        showUpload: false,
        showClose: false,
        initialPreviewAsData: true,
        dropZoneEnabled: false,
        theme:"fas"
    });    
});