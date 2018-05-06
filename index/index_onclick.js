// 추가 버튼 클릭
$(document).on('click', '.add_data', function () {
    console.log("button clicked");
    $('#add_data_Modal').modal('show');
    $('#insert').val("삽입");
    $('#insert_form')[0].reset();
    $("#firstGaipDate").attr('disabled',false);
    $("#currentGaipDate").attr('disabled',true);
    $('#gaipDetail').attr("disabled", false);
});

//수정 버튼 클릭
$(document).on('click', '.edit_data', function () {
    var company_id = $(this).attr("id");
    console.log(company_id);
    $.ajax({
        url: "fetch.php",
        method: "POST",
        data: {company_id: company_id},
        dataType: "json",
        success: function (data) {
            console.log(data);
            //데이터 매핑
            $('#companyName').val(data.companyName);
            $('#ceoName').val(data.ceoName);
            $('#address1').val(data.address1);
            $('#address2').val(data.address2);
            $('#phoneNumber').val(data.phoneNumber);
            $('#ceoPhoneNumber').val(data.ceoPhoneNumber);

            $('#currentGaipPrice').val(data.currentGaipPrice);
            $('#Gujwa').val(data.Gujwa);
            $('#leftCalls').val(data.leftCalls);
            $('#detail').val(data.detail);

            $('#gaipDetail').val(data.gaipDetail);
            $('#gaipDetail').attr("disabled", true);

            $('#firstGaipDate').val(data.firstGaipDate);
            $("#firstGaipDate").attr('disabled',true);
            $('#currentGaipDate').val(data.currentGaipDate);
            $("#currentGaipDate").attr('disabled',false);
            $('#endGaipDate').val(data.endGaipDate);

            $('#company_id').val(data.id);
            $('#insert').val("수정");
            $('#add_data_Modal').modal('show');
        }
    });
});
//재가입 버튼 클릭
$(document).on('click', '.redo_data', function () {
    console.log("재가입 버튼 클릭");
    var company_id = $(this).attr("id");
    $.ajax({
        url: "redo_fetch.php",
        method: "POST",
        data: {company_id: company_id},
        dataType: "json",
        success: function (data) {
            //데이터 매핑
            $('#company_redo_id').val(data.id);
            $('#redoModal').modal('show');
        }
    });
});
//가입내역 버튼 클릭
$(document).on('click', '.view_data', function () {
    var company_id = $(this).attr("id");
    if (company_id != '') {
        $.ajax({
            url: "select.php",
            method: "POST",
            data: {company_id: company_id},
            success: function (data) {
                $('#company_detail').html(data);
                $('#dataModal').modal('show');
            }
        });
    }
});
//배정내역 버튼 클릭
$(document).on('click', '.assign_data', function () {
    var company_id = $(this).attr("id");
    if (company_id != '') {
        $.ajax({
            url: "assign_history.php",
            method: "POST",
            data: {company_id: company_id},
            success: function (data) {
                $('#assign_table').html(data);
                $('#assignModal').modal('show');
            }
        });
    }
});
//삭제 버튼 클릭
$(document).on('click', '.delete_data', function () {
    var company_id = $(this).attr("id");
    $.ajax({
        url: "delete_fetch.php",
        method: "POST",
        data: {company_id: company_id},
        dataType: "json",
        success: function (data) {
            console.log(data);
            //데이터 매핑
            $('#deleteDetail').val(data.deleteDetail);
            $('#company_delete_id').val(data.id);
            $('#delete_data_Modal').modal('show');
        }
    });
});