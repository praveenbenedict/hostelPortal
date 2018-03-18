$(document).ready(function () {
    $('#id04').hide();
    $('#clk').hide();
    $(".click").on('click', function () {
        var student = {};
        student.name = $('input[name="name"]').val();
        student.year = $('input[name="year"]').val();
        student.roomNo = $('input[name="roomNo"]').val();
        student.branch = ($('input[name="branch"]').val()).toUpperCase();
        student.rollNo = $('input[name="rollNo"]').val();
        student.regNo = $('input[name="regNo"]').val();
        student.phoneNo = $('input[name="phone"]').val();
        console.log(student);
        $.get('phps/addStudent.php', student).done(function (data) {
            console.log(data);
            $('input').val('');
        });
    });

    $("#single").click(function () {
        $("#id04").toggle("slow", function () {
        });
    });

    $("#singles").click(function () {
        $("#id05").toggle("slow", function () {
        });
    });

    $(".allow").on('click', function () {
        var outingStudent = {};
        outingStudent.rollNo = $('input[name="rollNoOuting"]').val();
        outingStudent.outingDate = $('input[name="permitDate"]').val();
        outingStudent.returnDate = $('input[name="returnDate"]').val();
        outingStudent.reason = $('select').val();
        console.log(outingStudent);
        $.get('phps/permitOuting.php', outingStudent).done(function (data) {
            console.log(data);
        });
        $.get('phps/getPhoneNo.php', outingStudent).done(function (data) {
            data = JSON.parse(data);
            $.get('phps/sendSms.php', data ).done(function(data){
                console.log(data);
            });
        });
        $('input').val('');
        
    });

    $(".retStu").on('click', function () {
        var retStudent = {};
        retStudent.rollNo = $('input[name="rollNoOuting"]').val();
        $.get('phps/retrieveStudent.php', retStudent).done(function (data) {
            console.log(data);
            if (data[0]=='{') {
                // if(retStudent.rollNo==1){
                data = JSON.parse(data);
                console.log(data);
                $(".student-details").html("");
                // $('.student-details').append('<h4>Student Found.</h4>');
                $('.student-details').append('<h4>Name: ' + data.name + '</h4>');
                $('.student-details').append('<h4>Roll No.: ' + data.rollNo + '</h4>');
                $('.student-details').append('<h4>Batch: ' + data.batch + '</h4>');
                $('.student-details').append('<h4>Branch: ' + data.branch + '</h4>');
                $('.student-details').append('<h4>Room No.: ' + data.room + '</h4>');
                $('.student-details').append('<h4>Register No.: ' + data.regNo + '</h4>');
                $('.student-details').append('<h4>Parent Phone Number:' + data.phoneNo + '</h4>');
            } else {
                console.log(data);
                $(".student-details").html("");
                $('.student-details').append('<h4>Student Not Found. Check Roll Number</h4>');
            }
        });
    });

    $(".retHis").on('click', function () {
        var retStuHistory = {};
        retStuHistory.rollNo = $('input[name="rollNoHistory"]').val();
        $.get('phps/retrieveHistory.php', retStuHistory).done(function (data) {
            var historyTable = '<tr><th><h2>Permit Date</h2></th><th><h2>Return Date</h2></th><th><h2>Reason</h2></th></tr>';
            $('.history-table').html(historyTable);
            $('.details-row').html('');

            if (data == "error") {
                $('.history-table').append('<h4>No History Found</h4>');

            } else {

                studentHistory = JSON.parse(data);
                var x = 1;
                $.get('phps/retrieveStudent.php', retStuHistory).done(function (details) {
                    details = JSON.parse(details);
                    $('.student-history .details-row').append('<td><h2>Name: </h2>' + details.name + '</td>');
                    $('.student-history .details-row').append('<td><h2>Roll No.: </h2>' + details.rollNo + '</td>');
                    $('.student-history .details-row').append('<td><h2>Batch: </h2>' + details.batch + '</td>');
                    $('.student-history .details-row').append('<td><h2>Branch: </h2>' + details.branch + '</td>');
                    $.each(studentHistory, function (index, value) {
                        var insertHtml = '<tr><td>' + value.Permitdate + '</td> <td>' + value.Returndate + '</td> <td>' + value.Reason + '</td> </tr>';
                        $('.student-history .history-table').append(insertHtml);
                    });
                });

            }
            $("#clk").show();
        });

    });

});













var food = {
    '10000' : [
        {
            pId : 10000,
            pName: 'White Rice',
            collectedPrice : [
                {
                    collecterId : 899,
                    price: 90,
                    position : {
                    
                    },
                    date : '',

                }
            ]
        }

    ]
};
















