<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{
    use HasFactory;
    protected $table = 'citizen';
    protected $fillable = [
        'nik',
        'full_name',
        'gender',
        'birth_place',
        'birth_date',
        'religion',
        'marital_status',
        'occupation',
        'address',
        'province',
        'city',
        'district',
        'village',
    ];
    protected $casts = [
        'birth_date' => 'date',
    ];
    protected $primaryKey = 'nik';
    public $incrementing = false;
    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'id');
    }
}
