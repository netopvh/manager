var rolesTable = $('#roles').DataTable({
    dom: "<'row'<'col-xs-12'f<'col-xs-12'>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    responsive: true,
    columnDefs: [
        {
            targets: 3,
            className: "text-center",
        }
    ],
    ajax: '/api/roles?api_token=' + token,
    columns: [
        {data: 'id', name: 'id', width: '70px'},
        {data: 'display_name', name: 'display_name'},
        {data: 'description', name: 'description'},
        {data: 'action', orderable: false, searchable: false, width: '90px'}
    ]
});