<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostcardRequest;
use App\Http\Requests\UpdatePostcardRequest;
use App\Models\Postcard;
use Carbon\Carbon;

class PostcardController extends Controller
{
    /**
     * Display a listing of the resource.
     * ->orWhere('online_at->diffInSeconds(offline_at)', '>=', 0)
     * 
     *  'postcards' => Postcard::where('is_draft', '=', $isDraft)
     *             ->where('online_at', '>=','offline_at')->paginate(20)
     * 
     * 'postcards' => Postcard::where('is_draft', '=', $isDraft)
     *              ->where('online_at', '>=', date('Y-m-d').' 00:00:00')->paginate(20)
     */   
    public function index()
    {
        $isDraft = 0;
        return view('postcards.index', [
            'postcards' => Postcard::where('is_draft', '=', $isDraft)
                    ->where((Carbon::parse(date('Y-m-d', strtotime('online_at')))
                    ->diffInSeconds(Carbon::parse(date('Y-m-d', strtotime('offline_at'))))), '>=', '0')
                    ->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostcardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Postcard $postcard)
    {
        return view('postcards.show', compact('postcard'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Postcard $postcard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostcardRequest $request, Postcard $postcard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Postcard $postcard)
    {
        //
    }
}
