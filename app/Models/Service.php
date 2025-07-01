<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'service';
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'icon',
        'color',
        'description',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
    ];
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
