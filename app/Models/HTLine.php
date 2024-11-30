<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id', 'conductor_name', 'conductor_type', 'length_kms',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}