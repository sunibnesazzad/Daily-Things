@extends('layouts.app')

@section('content')
    <h1 align="center">
        Select Month
    </h1>
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN VALIDATION STATES-->
            <div class="portlet light portlet-fit portlet-form bordered">
                <div class="portlet-body">
                    <!-- BEGIN FORM-->
                    <form action="/monthly/price" method="POST" id="form_sample_2" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="control-label col-md-3">Month
                                    <span class="required"> : </span>
                                </label>
                                <div class="col-md-4">
                                    <select class="form-control" name="month">
                                        @foreach($months as $month)
                                            <option value="{{$month->id}}">{{$month->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn green">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>

    <div id="container" style="width:100%; height:400px;">

    </div>

@endsection


@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    {{-- Line price chart--}}
    <script type="text/javascript">
        $(function () {
            var data_price = <?php echo $price; ?>;
            $('#container').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Price  Ratio'
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Rate'
                    }
                },
                series: [{
                    name: 'price',
                    data: data_price
                }]
            });
        });
    </script>


@endsection