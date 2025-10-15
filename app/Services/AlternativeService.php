<?php 


use App\Models\Alternative;

class AlternativeService 
{

    public function list()
    {
        Alternative::all();
    }

    public function create()
    {
        Alternative::create();
    }

    public function update()
    {
        Alternative::update();
    }

    public function delete()
    {
        Alternative::delete();
    }
}