//추가, 수정 폼 제출
$('#insert_form').on("submit", function () {
    $.ajax({
        url: "insert.php",
        dataType: "json",
        method: "POST",
        data: $('#insert_form').serialize(),
        success: function (data) {
            $('#insert_form')[0].reset();
            $('#add_data_Modal').modal('destroy');
            alert(JSON.stringify(data));
            window.location.reload();
        }
    });
});
//재가입 폼 제출
$('#re_form').on("submit", function () {
    $.ajax({
        url: "redo.php",
        method: "POST",
        data: $('#re_form').serialize(),
        success: function (data) {
            $('#re_form')[0].reset();
            $('#redoModal').modal('hide');
            alert(data);
            alert('재가입되었습니다.');
            window.location.reload();
        }
    });
});

//삭제 폼 제출
$('#delete_form').on("submit", function () {
    $.ajax({
        url: "delete.php",
        method: "POST",
        data: $('#delete_form').serialize(),
        success: function (data) {
            $('#delete_form')[0].reset();
            $('#delete_data_Modal').modal('hide');
            alert('삭제되었습니다.');
            window.location.reload();
        }
    });
});