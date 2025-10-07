import Swal from 'sweetalert2';

$(function() {

    // Delete button in tables
    $(document).on("click", ".delete-button", function() {
        const button = $(this);

        Swal.fire({
            title: "Изтриване на елемента?",
            showDenyButton: true,
            confirmButtonText: "Да",
            denyButtonText: "Не",
            icon: "warning",
            confirmButtonColor: "#198754",
        }).then((result) => {
            if (result.isConfirmed) {
                button.closest('form').submit();
            }
        });
    });
});
