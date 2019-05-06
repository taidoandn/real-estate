function changeImg(input) {
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function (e) {
            //Thay đổi đường dẫn ảnh
            $('#avatar').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function () {
    $('#avatar').click(function () {
        $('#img').click();
    });
});


$("#fImageDetails").on("change", function() {
    var total_file = $(this)[0].files.length;
    $("#uploaded-image-wrapper").html('');
    for(var i=0;i<total_file;i++)
    {
        var images = '';
        images += "<div class='img-wrapper'>";
        images += "<img src='"+URL.createObjectURL(event.target.files[i])+"'class='img-responsive'>";
        images += "</div>";
        $('#uploaded-image-wrapper').append(images);
    }
});
