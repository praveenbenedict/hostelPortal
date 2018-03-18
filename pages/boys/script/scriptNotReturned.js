$(document).ready(function() {

    $.get('phps/loadNotEntryList.php', {}).done(function(outingData){
        outingData = JSON.parse(outingData);
        $.each(outingData, function(index, value){
            $.get('phps/retrieveStudent.php', value).done(function(studentData){
                studentData = JSON.parse(studentData);
                console.log(studentData);
                var rowData = '<tr> \
                                    <td>'+ (index + 1) + '</td>\
                                    <td>' + studentData.rollNo + '<a href="#">\
                                        <button class ="btn returnButton" RollNo = "' + studentData.rollNo + '">Returned</button></a> </td>\
                                    <td>' + studentData.name + '</td>\ <td>' + studentData.branch + '</td>\
                                    <td>' + studentData.batch + '</td>\
                                    <td>' + value.permitDate + '</td>\
                                    <td>' + value.returnDate + '</td>\
                                </tr>';
                $('#table-container').append(rowData);
            });
        });
    });

    $(document.body).on('click', '.returnButton', function () {
            var className = $(this).attr('RollNo');
            var element = $(this);
            $.get('phps/retrieveStudentOut.php', { rollNo: className }).done(function (studentData) {
                studentData = JSON.parse(studentData);
                var RollNo = studentData.rollNo;
                var name = studentData.name;
                var batch = studentData.batch;
                var branch = studentData.branch;
                var room = studentData.room;
                var phoneNo = studentData.phoneNo;
                var inData = {
                    rollNo: RollNo,
                    name: name,
                    batch: batch,
                    branch: branch,
                    phoneNo: phoneNo,
                    room: room
                };
                $.get('phps/returned.php', inData).done(function (data) {
                    $(element).parent().parent().parent().hide();
                });
            });
        });

});