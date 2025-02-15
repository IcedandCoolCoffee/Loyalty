$(document).ready(function(){
    $("#importForm").on("submit", function(e){
        e.preventDefault();
        
        var formData = new FormData(this);
        
        Swal.fire({
            title: "Uploading...",
            text: "Please wait while we import the data.",
            icon: "info",
            allowOutsideClick: false,
            showConfirmButton: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        $.ajax({
            url: "insert_excel.php", // PHP script to process the file
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if ($.trim(response) === "success") {
                    Swal.fire({
                        title: "Success!",
                        text: "Excel data imported successfully!",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    $("#records").DataTable().ajax.reload(); // Reload DataTables
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: response,
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong. Please try again.",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        });
    });
});

