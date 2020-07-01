<?php

namespace App\Repositories;

use App\Sale;
use Carbon\Carbon;

class SaleRepository
{
    public function find($id)
    {
        return Sale::findOrFail($id);
    }
    public function getAll()
    {
        return Sale::all();
    }
    public function create($data)
    {
        return Sale::create($data);
    }
    public function update($id, $data)
    {
        return Sale::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Sale::findOrFail($id)->delete();
    }

    
    
}
