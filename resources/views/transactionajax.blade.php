@foreach(App\Transaction::get() as $trans)
<div class="container-box">
    <div class="box" data-id="{{$trans->id}}">
        <div class="small-box">
            {{($trans->status === 0)? 'Not Serve': 'Serve'}}
        </div>
        <div class="large-box">
            <p>{{$trans->id}}</p>
            <span>{{$trans->status}}</span>
            <span>P {{$trans->total}}</span>
            <p>{{$trans->created_at}}</p>
        </div>
        <div class="left-box"></div>
    </div>
    <div class="content-box" style="background: #FFFBA9;border-radius: 0;height: 200px;overflow: auto;">
        @foreach(json_decode($trans->menu_list) as $li)
        <div class="list">{{$li->service_id}}</div>
        @endforeach
    </div>
</div>
@endforeach