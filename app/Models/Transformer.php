<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transformer extends Model
{
    use HasFactory;

    protected $fillable = ['survey_id', 'capacity', 'quantity', 'coordinates', 'category'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
