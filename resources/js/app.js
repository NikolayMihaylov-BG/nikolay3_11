// Bootstrap + AdminLTE
import 'bootstrap/dist/js/bootstrap.bundle';
import 'admin-lte/dist/js/adminlte';

// Import CSS
import 'bootstrap/dist/css/bootstrap.min.css';
import 'admin-lte/dist/css/adminlte.min.css';

// DataTables + Bootstrap 5 integration
import 'datatables.net-bs5';
import 'datatables.net-bs5/css/dataTables.bootstrap5.min.css';

// Font Awesome
import "@fortawesome/fontawesome-free/css/all.css";

import $ from 'jquery';
window.$ = window.jQuery = $;

$.extend( true, $.fn.dataTable.defaults, {
    pageLength: 25,
    responsive: true,
    processing: true,
    serverSide: true,
    language: {
        processing:     "Обработва се...",
        search:         "Търсене:",
        lengthMenu:    "Показване на _MENU_ елемента",
        info:           "Показване от _START_ до _END_ от общо _TOTAL_ елемента",
        infoEmpty:      "Показване от 0 до 0 от 0 елемента",
        infoFiltered:   "(филтрирани от общо _MAX_ елемента)",
        infoPostFix:    "",
        loadingRecords: "Зареждане...",
        zeroRecords:    "Няма намерени елементи",
        emptyTable:     "Няма налични данни в таблицата",
        paginate: {
            first:      "Първа",
            previous:   "Предишна",
            next:       "Следваща",
            last:       "Последна"
        },
        aria: {
            sortAscending:  ": активирайте, за да сортирате колоната във възходящ ред",
            sortDescending: ": активирайте, за да сортирате колоната в низходящ ред"
        }
    }
});
