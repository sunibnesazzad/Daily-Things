<?php

namespace App\Http\Controllers\Chart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use App\Item;
use Carbon\Carbon;
use DB;
use App\Month;


class ChartItemController extends Controller
{
    public function monthlyPrice(Request $request)
    {
        $month = $request->get('month') ?? '1';
        $months= Month::all();
        $itemPrice = DB::table('items')
            ->select('price')
            ->whereMonth('date_of_purchase', '=', $month)
            ->get()->toArray();
        $price= array_column($itemPrice, 'price');

        return view('admin.setting.charts.monthlyPrice',compact('months','month'))->with('title',"Monthly Price")
            ->with('price',json_encode($price,JSON_NUMERIC_CHECK));;
    }

    public function monthlyPriceChart(Request $request,$id)
    {
        $months= Month::all();
        $month=$id;
      /* $this->validate($request,[
            'month' => 'required',
        ]);
        $month = $request->input('month');*/

        $itemPrice = DB::table('items')
            ->select('price')
            ->whereMonth('date_of_purchase', '=', $month)
            ->get()->toArray();
        $price= array_column($itemPrice, 'price');


       /* return $price;*/
        return view('admin.setting.charts.monthlyPriceChart',compact('months','month'))->with('title',"Monthly Price Chart")
            ->with('price',json_encode($price,JSON_NUMERIC_CHECK));


    }

    public function priceChart()
    {
        $lava = new Lavacharts;
        $chart = $lava->DataTable();
        $chart->addDateColumn('Year')
            ->addNumberColumn('Item price')
            ->addNumberColumn('Quantity');


        $items= Item::all();
        foreach ($items as $item)
        {
            $year=Carbon::parse($item->date_of_purchase)->toDateString();
            $price=$item->price;
            $quantity=$item->quantity;

            $chart->addRow([$year, $price, $quantity]);
        }

        $lava->ColumnChart('Item Chart', $chart, [
            'title' => 'Price Data',
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        $lava2 = new Lavacharts; // See note below for Laravel

        $population = $lava2->DataTable();

        $population->addDateColumn('Year')
            ->addNumberColumn('Number of People')
            ->addRow(['2006', 623452])
            ->addRow(['2007', 685034])
            ->addRow(['2008', 716845])
            ->addRow(['2009', 757254])
            ->addRow(['2010', 778034])
            ->addRow(['2011', 792353])
            ->addRow(['2012', 839657])
            ->addRow(['2013', 842367])
            ->addRow(['2014', 873490]);

        $lava2->AreaChart('Population', $population, [
            'title' => 'Population Growth',
            'legend' => [
                'position' => 'in'
            ]
        ]);

        return view('admin.setting.charts.itemPrice',compact('lava','lava2'))->with('title',"Item Price Chart");
    }

    public function quantityChart()
    {
        $itemPrice=  DB::table('items')
            ->select('price')
            ->orderBy("date_of_purchase")
            ->get()->toArray();

        $price= array_column($itemPrice, 'price');

        $itemQuantity=  DB::table('items')
            ->select('quantity')
            ->orderBy("date_of_purchase")
            ->get()->toArray();

        $quantity= array_column($itemQuantity, 'quantity');

        $purchasemonth = DB::table('items')
            ->select(DB::raw('MONTH(date_of_purchase) as purchasemonth'))
            ->orderBy('purchasemonth', 'asc')
            ->get()->toArray();
        $month= array_column($purchasemonth, 'purchasemonth');

       /* return $month;*/
        return view('admin.setting.charts.areaChart',compact('lava2'))->with('title',"Area Chart")
                                                                                   ->with('quantity',json_encode($quantity,JSON_NUMERIC_CHECK))
                                                                                   ->with('month',json_encode($month,JSON_NUMERIC_CHECK))
                                                                                   ->with('price',json_encode($price,JSON_NUMERIC_CHECK));
    }



}
