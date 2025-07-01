<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    use HasFactory;
    protected $table = 'service_request';
    protected $fillable = [
        'service_id',
        'user_id',
        'request_code',
        'status',
        'description',
    ];
    protected $casts = [
        'status' => 'string',
    ];
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');    
    }
}
