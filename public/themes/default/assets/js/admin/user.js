$(document).ready(function(){

    loadUser();

    function loadUser(){
        $('#tbl-user').DataTable().destroy();
        $('#tbl-user').DataTable( {
            "bInfo" : false,
            "lengthChange": false,
            "pageLength":6,
            searching: false,
            "serverSide": false,
            "ajax": "switch-ajax-user",
            "columns": [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'user_type', name: 'user_type'}
            ],
            "language": {
                "paginate": {
                    "previous": "< Previous",
                    "next": "Next >"
                }
            }
        });
    }
})