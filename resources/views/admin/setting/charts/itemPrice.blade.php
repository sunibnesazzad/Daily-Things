@extends('layouts.app')

@section('content')
    <div id="pop-div" ></div>

    <?= $lava->render('ColumnChart', 'Item Chart', 'pop-div') ?>

    <div id="pop_div"></div>

    <?= $lava2->render('AreaChart', 'Population', 'pop_div') ?>
@endsection



