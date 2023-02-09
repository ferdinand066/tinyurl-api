<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlTraffic extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['url_mapping_id'];

    public function urlMapping(){
        return $this->belongsTo(UrlMapping::class);
    }
}
