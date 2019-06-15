
$(document).ready(function () {
    setTimeout(function () {
        $('#messages').hide();

    },4000)

});


CKEDITOR.replace('description');

$("#readimage").change(function () {
    readURL(this);
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#showimage').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}



window.setTimeout(function () {
    $(".alert").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 2000);


