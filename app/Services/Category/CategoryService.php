<?php
/**
 * Created by PhpStorm.
 * User: Sazzad
 * Date: 08-May-18
 * Time: 1:27 AM
 */

namespace App\Services\Category;


use App\Services\BaseService;
use App\Repositories\Setting\CategoryRepository;

class CategoryService extends BaseService
{
    /**
     * return Repository instance
     *
     * @return mixed
     */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function baseRepository()
    {
        // TODO: Implement baseRepository() method.
    }

    public function store($request)
    {
        (array)$data = $request->all();
        return $this->categoryRepository->create($data);
    }

    /**
     * Update category
     * @param $request
     * @param $id
     * @return mixed
     */
    public function updateCategory($request,$id)
    {
        (array)$data = $request->all();
        return $this->categoryRepository->update($data,$id);
    }

    public function updateId($id)
    {
        $category = $this->categoryRepository->findId($id);
        return $category;

    }

}