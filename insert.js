$(document).ready(function() {
    $('#submit').on('click', function() {
        var emp_number = $('#emp_number').val().trim();
        var lname = $('#lname').val().trim();
        var fname = $('#fname').val().trim();
        var mname = $('#mname').val().trim();
        var position = $('#position').val().trim();
        var deptname = $('#deptname').val().trim();
        var date_started = $('#date_started').val().trim();
        var years_of_service = $('#years_of_service').val().trim();
        var salary = $('#salary').val().trim();

        // Validation
        if (emp_number == "" || lname == "" || fname == "" || mname == "" || position == "" || deptname == "" || date_started == "" || years_of_service == "" || salary == "") {
            Swal.fire({
                icon: 'warning',
                title: 'Missing Fields!',
                text: 'Please fill in all fields before submitting.',
            });
            return;
        }

        $.ajax({
            url: 'insert.php',
            type: 'POST',
            data: {
                emp_number: emp_number,
                lname: lname,
                fname: fname,
                mname: mname,
                position: position,
                deptname: deptname,
                date_started: date_started,
                years_of_service: years_of_service,
                salary: salary
            },
            success: function(response) {
                if (response == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Employee record has been added.',
                        icon: 'success',
                        background: '#eaeaf4', // Light purple background
                        color: '#5a52d0', // Primary text color
                        confirmButtonColor: '#5a52d0', // Primary button color
                        confirmButtonText: 'OK',
                        customClass: {
                            title: 'swal-title',
                            popup: 'swal-popup',
                            confirmButton: 'swal-confirm'
                        }
                    }).then(() => {
                        $('#addmodal').modal('hide'); // Close modal
                        location.reload(); // Refresh the page
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: response, // Display error message from PHP
                    });
                }
            }
        });
    });
});
