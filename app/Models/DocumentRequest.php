<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $table = 'document_request';
    protected $fillable = [
        'service_request_id',
        'user_id',
        'document'
    ];
    protected $casts = [
        'size' => 'integer',
    ];

    public function serviceRequest()
    {
        return $this->belongsTo(ServiceRequest::class, 'service_request_id');
    }
    public function getFileUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
    public function getFileNameAttribute()
    {
        return pathinfo($this->file_path, PATHINFO_FILENAME);
    }
}
