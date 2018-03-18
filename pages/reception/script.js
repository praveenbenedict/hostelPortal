$(document).ready(function() {
    $.get('phps/loadStudentsOuting.php').done(function (data) {
        if (data[0] == '[') {
            data = JSON.parse(data);
            $.get('phps/getBranchListOuting.php').done(function (branchList) {
                branchList = JSON.parse(branchList);
                $.each(branchList, function (index, value) {
                    var branch = value.branch;
                    var newTable = '<table id="' + branch + '" class = "table">\
                                    <tr>\
                                        <th>S.No</th> \
                                        <th>Roll No.</th>\
                                        <th>Name</th>\
                                        <th>Department</th>\
                                        <th>Batch</th>\
                                    </tr>\
                                    </table>';
                    var newContainer = '<div class = "table-container table-' + index + '"></div>';
                    $('.outing-container-boys').append(newContainer);
                    $('.outing-container-boys .table-' + index).append('<h3><b>' + branch + '<b></h3>');
                    $('.outing-container-boys .table-' + index).append(newTable);
                });
            });
            $.each(data, function (index, value) {
                var rollNo = value.Rollno;
                $.get('phps/retrieveStudentOut.php', { rollNo: rollNo }).done(function (studentData) {
                    studentData = JSON.parse(studentData);
                    var rowData = '<tr> \
                                        <td>'+ (index + 1) + '</td>\
                                        <td>' + studentData.rollNo + '<a href="#">\
                                            <button class ="btn permitButton" RollNo = "' + studentData.rollNo + '">Permit Outing</button></a> </td>\
                                        <td>' + studentData.name + '</td>\ <td>' + studentData.branch + '</td>\
                                        <td>' + studentData.batch + '</td>\
                                    </tr>';
                    $('#' + studentData.branch).append(rowData);
                });
            });
        } else {
            console.log('No data found');
        }
    });
    $(document.body).on('click', '.permitButton', function () {
        var className = $(this).attr('RollNo');
        var element = $(this);
        $.get('phps/retrieveStudentIn.php', { rollNo: className }).done(function (studentData) {
            studentData = JSON.parse(studentData);
            var RollNo = studentData.Rollno;
            var PermitDate = studentData.Permitdate;
            var ReturnDate = studentData.Returndate;
            var Reason = studentData.Reason;
            var inData = {
                rollNo: RollNo,
                permitDate: PermitDate,
                returnDate: ReturnDate,
                reason: Reason
            };
            $.get('phps/addIn.php', inData).done(function (data) {
                $.get('phps/permitOuting.php', { rollNo: className }).done(function (data) {
                    $(element).parent().parent().parent().hide();
                });
            });
        });
    });
    $.get('phps/loadStudentsEntry.php').done(function (data) {
        if (data[0] == '[') {
            data = JSON.parse(data);
            $.get('phps/getBranchListEntry.php').done(function (branchList) {
                branchList = JSON.parse(branchList);
                $.each(branchList, function (index, value) {
                    var branch = value.branch;
                    var newTable = '<table id="' + branch + '" class = "table">\
                                    <tr>\
                                        <th>S.No</th> \
                                        <th>Roll No.</th>\
                                        <th>Name</th>\
                                        <th>Department</th>\
                                        <th>Batch</th>\
                                    </tr>\
                                    </table>';
                    var newContainer = '<div class = "table-container table-' + index + '"></div>';
                    $('.entry-container-boys').append(newContainer);
                    $('.entry-container-boys .table-' + index).append('<h3><b>' + branch + '<b></h3>');
                    $('.entry-container-boys .table-' + index).append(newTable);
                });
            });
            $.each(data, function (index, value) {
                var rollNo = value.rollNo;
                $.get('phps/retrieveStudentOut.php', { rollNo: rollNo }).done(function (studentData) {
                    studentData = JSON.parse(studentData);
                    var rowData = '<tr> \
                                        <td>'+ (index + 1) + '</td>\
                                        <td>' + studentData.rollNo + '<a href="#">\
                                            <button class ="btn returnButton" RollNo = "' + studentData.rollNo + '">Returned</button></a> </td>\
                                        <td>' + studentData.name + '</td>\ <td>' + studentData.branch + '</td>\
                                        <td>' + studentData.batch + '</td>\
                                    </tr>';
                    $('.entry-container-boys #' + studentData.branch).append(rowData);
                });

            });
        } else {
            console.log('No data found');
        }
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