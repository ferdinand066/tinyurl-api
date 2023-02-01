<?php

namespace App\Http\Controllers;

use App\Http\Actions\UrlActions;
use App\Models\UrlMapping;
use App\Models\UrlType;
use Illuminate\Http\Request;
use Crisu83\ShortId\ShortId;

class TinyUrlController extends Controller
{

    public $urlType;
    public $shortId;

    function __construct() {
        $this->urlType = UrlType::where('type', 'tny')->firstOrFail();
        $this->shortId = ShortId::create();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'url' => 'required'
        ]);

        $result = UrlMapping::create(array_merge([
            'url_type_id' => $this->urlType->id,
            'label' => $this->shortId->generate()
        ], $validated));

        return response()->json([
            'url' => $result
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UrlMapping  $urlMapping
     * @return \Illuminate\Http\Response
     */
    public function show(string $string, UrlActions $actions)
    {
        $url = $actions->show($string, $this->urlType->type);

        return response()->json([
            'url' => $url
        ], 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UrlMapping  $urlMapping
     * @return \Illuminate\Http\Response
     */
    public function edit(UrlMapping $urlMapping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UrlMapping  $urlMapping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UrlMapping $urlMapping)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UrlMapping  $urlMapping
     * @return \Illuminate\Http\Response
     */
    public function destroy(UrlMapping $urlMapping)
    {
        //
    }
}
