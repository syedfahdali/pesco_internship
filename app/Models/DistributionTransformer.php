<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionTransformer extends Model
{
    use HasFactory;

    protected $fillable = [
        'survey_id', 'transformer_capacity', 'quantity', 'location_coordinates', 'category',
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}