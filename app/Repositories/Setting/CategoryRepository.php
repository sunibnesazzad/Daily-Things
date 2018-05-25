<?php
/**
 * Created by PhpStorm.
 * User: Sazzad
 * Date: 08-May-18
 * Time: 1:23 AM
 */

namespace App\Repositories\Setting;


use App\Category;
use App\Repositories\Repository;

class CategoryRepository extends Repository
{

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    public function model()
    {
        return Category::class;
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
    //showing all categories
    public function getAllCategory()
    {
       return $this->model->all();
    }

    public function findId($id)
    {
        $data = $this->model->find($id);
        return $data;
    }

}