$(document).ready(function(){
    var BASEURL = $("#baseURL").val();

    loadIngredient();

    $('#addbtn').on('click',function(){
        $('#modal_add').modal('show');
    })

    $('#add-ingredient').on('click',function(e){
        e.stopPropagation();

        var form = $('#form-add-ingredient');
        var form_data = new FormData(form[0]);
        form_data.append('_token', $('meta[name="csrf_token"]').attr('content'));

        if($('#form-add-ingredient').valid()){
                $.ajax({
                    url : BASEURL + '/admin/add-ingredient',
                    type : 'POST',
                    data:form_data,
                    contentType: false,
                    processData: false,
                    success : function(data){
                        console.log(data);
                        form[0].reset();
                    }
                });
        }
    })

    function loadIngredient(){
        $('#tbl-ingredient').DataTable().destroy();
        $('#tbl-ingredient').DataTable( {
            "bInfo" : false,
            "lengthChange": false,
            "pageLength":6,
            searching: false,
            "serverSide": false,
            "ajax": "switch-ajax-ingredient",
            "columns": [
                {data: 'x', name: 'x'},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'quantity', name: 'price'},
                {data: 'action', name: 'action'}
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