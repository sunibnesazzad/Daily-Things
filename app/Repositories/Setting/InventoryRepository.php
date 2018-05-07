<?php
/**
 * Created by PhpStorm.
 * User: Sazzad
 * Date: 07-May-18
 * Time: 9:20 PM
 */

namespace App\Repositories\Setting;
use App\Item;
use App\Repositories\Repository;
use Yajra\DataTables\Facades\DataTables;

class InventoryRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Item::class;
    }

    /**
     * Filter data based on user input
     *
     * @param array $filter
     * @param       $query
     */
    public function filterData(array $filter, $query)
    {
        // TODO: Implement filterData() method.
    }

    public function ajaxDataTable()
    {
        $inventory = $this->model->all();

        return DataTables::of($inventory)->make(true);
    }

}