<?php

namespace App\Repositories;

use App\Guest;
use App\User;

class GuestRepository
{
    public function find($id)
    {
        return Guest::findOrFail($id);
    }
    public function getAll()
    {
        return Guest::all();
    }
    public function create($data)
    {
        return Guest::create($data);
    }
    public function update($id, $data)
    {
        return Guest::whereId($id)->update($data);
    }
    public function delete($id)
    {
        return Guest::findOrFail($id)->delete();
    }
}
