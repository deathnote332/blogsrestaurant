$(document).ready(function(){
    var BASEURL = $("#baseURL").val();


    $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $('.datepicker').datepicker({autoclose:true});
    $('.datepicker').on('focus',function(){
        $(this).blur();
    });

    $('#graph-filter').on('click',function() {
            $.ajax({
                url : BASEURL + '/admin/loadGraph',
                type : 'POST',
                data:{
                    '_token': $('meta[name="csrf_token"]').attr('content'),
                    'from': $('#date_from').val(),
                    'to': $('#date_to').val()
                },
                success : function(data){
                    loadChart(data['transaction_date'],data['total']);
                }
            });

    });


    function loadChart(dataLabel,dataList){
        var myChart = new Chart($('#myChart'), {
            type: 'bar',
            data: {
                labels: dataLabel,
                datasets: [{
                    data: dataList,
                    borderWidth: 1
                }]
            }
        });

        myChart.canvas.parentNode.style.height = '400px';
    }
})