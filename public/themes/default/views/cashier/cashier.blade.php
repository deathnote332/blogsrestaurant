<div class="list-box-container">
    <ul>
        @foreach(App\Transaction::get() as $trans)
        <li>
            <div class="box" data-id="{{$trans->id}}">
                <div class="small-box">
                    {{config('constant.order_'.$trans->order_type)}}
                </div>
                <div class="large-box">
                    <p>{{$trans->id}}</p>
                    <span>{{config('constant.stat_'.$trans->status)}}</span>
                    <span>P {{$trans->t}}</span>
                    <p>{{$trans->created_at}}</p>
                </div>
                <div class="left-box"></div>
            </div>
        </li>
        @endforeach
    </ul>
</div>

<script>
    $(document).ready(function(){
        $('.box').on('click',function(){
            window.location.href = "transaction/" + $(this).data('id');
        })
    })
</script>

