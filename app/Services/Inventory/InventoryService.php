<?php
namespace App\Services\Inventory;
use App\Repositories\Setting\InventoryRepository;
use App\Services\BaseService;

class InventoryService extends BaseService
{
    private $inventoryRepository;
    /**
     * return Repository instance
     *
     * @return mixed
     */
    public function __construct(InventoryRepository $inventoryRepository)
    {
        $this->inventoryRepository = $inventoryRepository;
    }

    public function baseRepository()
    {
        return $this->inventoryRepository;
    }

    public function store($request)
    {
        (array) $item = $request->all();
        return $this->inventoryRepository->create($item);
    }

}