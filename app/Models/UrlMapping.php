<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlMapping extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['label', 'url', 'url_type_id', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
