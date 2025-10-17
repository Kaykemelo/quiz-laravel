<?php 

namespace App\Services;

use App\Models\Alternative;

class AlternativeService 
{

    public function list()
    {
        return Alternative::all();
    }

    public function create($data)
    {
       return Alternative::create($data);
    }

    public function edit(Alternative $alternative)
    {
        return Alternative::find($alternative);
    }
    public function update(Alternative $alternative , $data)
    {
        return $alternative->update($data);
    }

    public function delete(Alternative $alternative)
    {
        return $alternative->delete();
    }
}