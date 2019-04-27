function deleteBlogData(id) {
    var csrf_token = $("meta[name='csrf-token']").attr('content');
    if (confirm('Bạn có chắc là muốn xóa?')) {
        $.ajax({
            type: "post",
            url: base_url + "/admin/blogs/"+ id ,
            data: {
                '_method' : "DELETE",
                '_token' : csrf_token
            },
            success: function (data) {
                toastr.success(data);
                blogs_table.draw(false);
            },
            error: function (xhr) {
                var res = xhr.responseJSON;
                if (res.message) {
                    alert(res.message);
                }else{
                    alert("Error!!")
                }
            }
        });
    }else{
        return false;
    }
}
