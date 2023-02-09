<?php

namespace App\Http\Actions;

use App\Models\UrlMapping;
use App\Models\UrlTraffic;
use App\Models\UrlType;

class UrlActions
{
    public function show(string $string, int $typeId){
        $url = UrlMapping::where([['label', $string], ['url_type_id', $typeId]])->firstOrFail();

        UrlTraffic::create([
            'url_mapping_id' => $url->id
        ]);
        
        return $url;
    }
}
