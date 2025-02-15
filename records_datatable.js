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
        ajax: {
            url: 'fetch_records.php',
            type: 'POST',
            data: function(d) {
                return {
                    monthStart: $('#monthStart').val(),
                    monthEnd: $('#monthEnd').val(),
                    yearFilter: $('#yearFilter').val(),
                    yearsOfService: $('.yos-filter:checked').map(function() {
                        return this.value;
                    }).get()
                };
            }
        },
        columns: [
            { 
                data: null,
                render: function() {
                    return '<input type="checkbox">';
                },
                orderable: false
            },
            { data: 'id' },
            { data: 'emp_number' },
            { data: 'name' },
            { data: 'position' },
            { data: 'deptname' }, // Office/Department Column (Index 5)
            { 
                data: 'date_started',
                render: function(data, type, row) {
                    if (type === 'sort') {
                        return new Date(data).getMonth() + 1; // Extract month (1-12) for sorting
                    }
                    return data; // Display full date
                }
            },
            { 
                data: 'calculated_years', // Years of Service Column (Index 7)
                visible: function() {
                    return $('#yearFilter').val() != new Date().getFullYear();
                }
            },
            { data: 'salary' },
            {
                data: null,
                render: function() {
                    return '<button class="btn btn-warning btn-sm" type="button">EDIT</button> ' +
                           '<button class="btn btn-danger btn-sm" type="button">DELETE</button>';
                },
                orderable: false
            }
        ]
    });

    // Event handlers for filters
    $('#monthStart, #monthEnd, #yearFilter').change(function() {
        table.ajax.reload();
    });

    $('.yos-filter').change(function() {
        table.ajax.reload();
    });
});
