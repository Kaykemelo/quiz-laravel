<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['description' , 'status'];

    public function questions() : HasMany
    {
        return $this->hasMany(Question::class);
    }

    public function executions() : HasOne
    {
        return $this->hasOne(Execution::class);
    }
}
