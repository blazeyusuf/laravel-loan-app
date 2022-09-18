/**
 * @description Close bootstrap modal backdrop on click
 */
$(".close").click(function () {
    $(".modal-backdrop").remove();
});

/**
 * @description Display session message with Sweet Alert
 * @param string message
 * @param string type
 *
 * @returns toast
 */
function displayMessage(message, type) {
    const Toast = swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 8000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Toast.fire({
        icon: type,
        title: message,
    });
}
/**
 * @description Activate jQuery datatable
 */
$("#basicExample").DataTable({
    iDisplayLength: 10,
    language: {
        searchPlaceholder: "Search...",
        sSearch: "",
        lengthMenu: "_MENU_ items/page",
        zeroRecords: "No matching records found",
        infoEmpty: "No records available",
        infoFiltered: "(filtered from _MAX_ total records)",
    },
    buttons: ["copy", "csv", "excel", "pdf", "print"],
    processing: true,
});
