//Default authenticated token
var token = $('meta[name="api_token"]').attr('content');

$.extend($.fn.dataTable.defaults, {
    autoWidth: false,
    columnDefs: [{
        orderable: false,
        width: '100px'
    }],
    language: {
        "sEmptyTable": "Nenhum registro encontrado",
        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
        "sInfoPostFix": "",
        "sInfoThousands": ".",
        "sLengthMenu": "_MENU_ resultados por página",
        "sLoadingRecords": "Carregando...",
        "sProcessing": "Processando...",
        "sZeroRecords": "Nenhum registro encontrado",
        "sSearch": "Pesquisar: ",
        "oPaginate": {
            "sNext": "&rarr;",
            "sPrevious": "&larr;",
            "sFirst": "Primeiro",
            "sLast": "Último"
        },
        "oAria": {
            "sSortAscending": ": Ordenar colunas de forma ascendente",
            "sSortDescending": ": Ordenar colunas de forma descendente"
        }
    },
    dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
    drawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
    },
    preDrawCallback: function () {
        $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
    }
});

var lastIdx = null;
var usersTable = $('#users').DataTable({
    dom: "<'row'<'col-xs-12'f<'col-xs-12'>>r>" +
    "<'row'<'col-xs-12't>>" +
    "<'row'<'col-xs-12'<'col-xs-6'i><'col-xs-6'p>>>",
    processing: true,
    serverSide: true,
    responsive: true,
    ajax: '/api/users?api_token=' + token,
    columns: [
        {data: 'id', name: 'id', width: '70px'},
        {data: 'nome', name: 'nome'},
        {data: 'email', name: 'email'},
        {data: 'status', name: 'status', width: '100px'},
        {data: 'action', orderable: false, searchable: false, width: '90px'}
    ]
});

$('.datatable-highlight tbody').on('mouseover', 'td', function() {
    var colIdx = usersTable.cell(this).index().column;

    if (colIdx !== lastIdx) {
        $(usersTable.cells().nodes()).removeClass('active');
        $(usersTable.column(colIdx).nodes()).addClass('active');
    }
}).on('mouseleave', function() {
    $(usersTable.cells().nodes()).removeClass('active');
});

$('table[data-form="tblUsers"]').on('click','.ativa', function (e) {
    e.preventDefault();
    var vm = $(this);
    $.ajax({
        url:'/api/users/' + vm.data('id') + '?api_token='+ token,
        type: "post",
        data:{
            active: vm.data('value'),
            _method:"PATCH",
            _token: $('meta[name="csrf_token"]').attr('content')
        },
        success:function(data){
            console.log(data);
            usersTable.ajax.reload( null, false );
        }
    });
});
$('table[data-form="tblUsers"]').on('click','.desativa', function (e) {
    e.preventDefault();
    var vm = $(this);
    $.ajax({
        url:'/api/users/' + vm.data('id') + '?api_token=' + token,
        type: "post",
        data:{
            active: vm.data('value'),
            _method:"PATCH",
            _token: $('meta[name="csrf_token"]').attr('content')
        },
        success:function(data){
            console.log(data);
            usersTable.ajax.reload( null, false );
        }
    });
});