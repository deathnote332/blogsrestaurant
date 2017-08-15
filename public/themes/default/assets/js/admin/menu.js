$(document).ready(function(){
    var BASEURL = $("#baseURL").val();
    loadMenu();

    $('#addbtn').on('click',function(){
        $('#modal_add').modal('show');
    })

    $(":file").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });

    $('#add-menu').on('click',function(e){
        e.stopPropagation();

        var form = $('#form-add-menu');
        var form_data = new FormData(form[0]);

        form_data.append('file', $('#pic_menu')[0].files[0]);
        form_data.append('_token', $('meta[name="csrf_token"]').attr('content'));

        if($('#form-add-menu').valid()){
            $.ajax({
                url : BASEURL + '/admin/add-menu',
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
    $('body').delegate('.btn-view','click',function(){
        window.location.href = "menu/" + $(this).data('id');
    })
    function loadMenu(){
        $('#tbl-menu').DataTable().destroy();
        $('#tbl-menu').DataTable( {
            "bInfo" : false,
            "lengthChange": false,
            "pageLength":6,
            searching: false,
            "serverSide": false,
            "ajax": "switch-ajax-menu",
            "columns": [
                {data: 'x', name: 'x'},
                {data: 'img', name: 'img'},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'price', name: 'price'},
                {data: 'status', name: 'status'},
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

    function imageIsLoaded(e) {
        $('#menuImage').attr('src', e.target.result);
    };


})


