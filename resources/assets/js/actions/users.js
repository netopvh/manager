let usersTable = $('#users');

if(usersTable.length){
    let oTableUser = usersTable.DataTable({
        dom: "<'row'<'col-xs-12'f<'col-xs-12'>>r>" +
        "<'row'<'col-xs-12't>>" +
        "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
        processing: true,
        serverSide: true,
        responsive:true,
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
        ajax: '/api/users',
        columns: [
            {data: 'id', name: 'id', width: '70px'},
            {data: 'name', name: 'name'},
            {data: 'email',name: 'email'},
            {data: 'action', orderable: false, searchable: false, width: '70px'}
        ]
    })
}