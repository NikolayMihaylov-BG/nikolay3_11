$(function (){
    const $table = $('table')

    $table.DataTable({
        ajax: {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            url: $table.attr('data-table-route')
        },
        columns: [
            { 'data': 'name' },
            {
                data: 'actions',
                'orderable' : false,
                'searchable' : false
            }
        ]
    })
})
