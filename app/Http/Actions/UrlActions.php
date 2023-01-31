<?php

namespace App\Http\Actions;

use App\Models\UrlMapping;
use App\Models\UrlType;

class UrlActions
{
    public function show(string $string, string $type){
        $urlType = UrlType::where('type', $type)->firstOrFail();
        return UrlMapping::where([['label', $string], ['url_type_id', $urlType->id]])->firstOrFail();
    }
}
