{!! Theme::asset()->usePath()->add('graph-css','/css/admin/graph.css') !!}
{!! Theme::asset()->usePath()->add('graph-js','/js/admin/graph.js') !!}

<div class="content-box-large">
    <div class="panel-heading">
        <div class="panel-title">Lorem ipsum</div>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Date from:</label>
                    <div class="col-10">
                        <input class="form-control datepicker" type="text" id="date_from">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group row">
                    <label for="example-text-input" class="col-2 col-form-label">Date tp:</label>
                    <div class="col-10">
                        <input class="form-control datepicker" type="text" id="date_to">
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <button class="btn btn-primary" id="graph-filter">Filter</button>
            </div>
        </div>
        <div class="chart-container" style="position: relative; height:20vh; width:60vw;margin: auto;">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>



