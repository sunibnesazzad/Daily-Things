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
}