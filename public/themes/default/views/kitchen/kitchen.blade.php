<div class="list-box-container">

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>
<script>
    var BASEURL = $("#baseURL").val();
    $(document).ready(function(){
        var socket = io.connect('http://127.0.0.1:8080');
        loadAjax();

        socket.on('new_data', function(msg) {
            loadAjax();
        });

        function loadAjax(){
            $.ajax({
                url:BASEURL + '/switch-ajax-transaction',
                type: 'GET',
                success: function (data){
                    $('.list-box-container').html(data);
                }
            });
        }

    })
</script>