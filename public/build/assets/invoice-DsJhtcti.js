import{S as n}from"./sweetalert2.esm.all-hB3mDLY4.js";let t=1;$(document).on("click",".remove-row",function(){const o=$(this);n.fire({title:"Изтриване на елемента?",showDenyButton:!0,confirmButtonText:"Да",denyButtonText:"Не",icon:"warning",confirmButtonColor:"#198754"}).then(e=>{e.isConfirmed&&o.closest(".row").remove()})});$("#add-row").on("click",function(){const o=`
                <div class="row g-3 mt-0">
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${t}][item_number]" placeholder="Арт. Номер">
                    </div>
                    <div class="col-md-7">
                        <input type="text" class="form-control" name="items[${t}][name]" placeholder="Наименование">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${t}][unit]" placeholder="Мярка">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${t}][qnt]" placeholder="Количество">
                    </div>
                    <div class="col-md-1">
                        <input type="text" class="form-control" name="items[${t}][price_qnt]" placeholder="Ед. Цена">
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-row">X</button>
                    </div>
                </div>
            `;$("#dynamic-fields").append(o),t++});
