$(document).ready(function () {
    var table = $('#records').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            { 
                extend: 'pdfHtml5', 
                text: 'Export to PDF', 
                className: 'btn custom-btn-1',
                title: 'Employees Milestone Report',
                exportOptions: {
                    columns: ':not(:first-child):not(:last-child):not(:nth-child(2))'
                }
            },
            { 
                extend: 'print', 
                text: 'Print', 
                className: 'btn custom-btn-2',
                title: 'Employees Milestone Report',
                exportOptions: {
                    columns: ':not(:first-child):not(:last-child):not(:nth-child(2))'
                }
            },
            { 
                extend: 'excelHtml5', 
                text: 'Export to Excel', 
                className: 'btn custom-btn-3',
                title: 'Employee Milestone Report',
                exportOptions: {
                    columns: ':not(:first-child):not(:last-child):not(:nth-child(2))'
                }
            },
            { 
                text: 'Sort by Office, Month Started & Years of Service', 
                className: 'btn btn-info', 
                action: function () {
                    table.order([
                        [5, 'asc'],  // Sort by Office (Department)
                        [6, 'asc'],  // Sort by Month of First Day of Service (Extracted from date_started)
                        [7, 'asc']   // Then, sort by Years of Service
                    ]).draw();
                }
            }
        ],
        select: {
            style: 'multi',
            selector: 'td:first-child input[type="checkbox"]'
        },
       
});
});

