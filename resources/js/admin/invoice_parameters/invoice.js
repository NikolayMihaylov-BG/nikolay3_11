import Swal from "sweetalert2";

let index = 1;

// Remove row
$(document).on('click', '.remove-row', function () {
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
            button.closest('.row').remove();
        }
    });
});

$('#add-row').on('click', function () {
    const newRow = `
                <div class="row g-3 mt-0">
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${index}][item_number]" placeholder="Арт. Номер">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="items[${index}][name]" placeholder="Наименование">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${index}][unit]" placeholder="Мярка">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${index}][qnt]" placeholder="Количество">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${index}][price_qnt]" placeholder="Ед. Цена">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-row">X</button>
                    </div>
                </div>
            `;
    $('#dynamic-fields').append(newRow);
    index++;
});
