@extends('layouts.app')

@section('content')
    <div id="container" style="width:100%; height:400px;">

    </div>
    <br><br>
    <div id="priceLine" style="width:100%; height:400px;">

    </div>
    <br><br>
    <div id="quantityLine" style="width:100%; height:400px;">

    </div>
    <br><br>
    <div id="container2" style="width:100%; height:400px;">

    </div>




@endsection

@section('scripts')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript">
        $(function () {
            var myChart = Highcharts.chart('container2', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Fruit Consumption'
                },
                xAxis: {
                    categories: ['Apples', 'Bananas', 'Oranges']
                },
                yAxis: {
                    title: {
                        text: 'Fruit eaten'
                    }
                },
                series: [{
                    name: 'Jane',
                    data: [1, 0, 4]
                }, {
                    name: 'John',
                    data: [5, 7, 3]
                }]
            });
        });
    </script>

    <script type="text/javascript">
        $(function () {
            var data_price = <?php echo $price; ?>;
            var data_month = <?php echo $month; ?>;

            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Monthly Price Ratio'
                },
                xAxis: {

                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Price'
                    }
                },
                series: [{
                    name: 'price',
                    data: data_price
                }, {
                    name: 'Month',
                    data: data_month
                }]
            });
        });
    </script>
 {{-- Line price chart--}}
    <script type="text/javascript">
        $(function () {
            var data_price = <?php echo $price; ?>;
            $('#priceLine').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Price  Ratio'
                },
                xAxis: {
                    categories: ['2017','2018']
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
 {{--quantity line chart--}}
    <script type="text/javascript">
        $(function () {

            var data_quantity = <?php echo $quantity; ?>;
            $('#quantityLine').highcharts({
                chart: {
                    type: 'line'
                },
                title: {
                    text: 'Yearly quantity Ratio'
                },
                xAxis: {
                    categories: ['2017','2018']
                },
                yAxis: {
                    title: {
                        text: 'Rate'
                    }
                },
                series: [ {
                    name: 'quantity',
                    data: data_quantity
                }]
            });
        });
    </script>

@endsection