<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'job', 'department', 'destination_id', 'extension', 'email'];

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}
