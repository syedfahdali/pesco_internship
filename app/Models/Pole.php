<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pole extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id', 'type_of_pole', 'quantity',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
