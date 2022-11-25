<?php

namespace App\Http\Controllers;

use App\Models\TicketCategory;
use App\Models\ContentLanguage;
use App\Http\Requests\StoreTicketCategoryRequest;
use App\Http\Requests\UpdateTicketCategoryRequest;

class TicketCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lg)
    {
        $text_data = array(
            'BTN_EDIT' => ContentLanguage::getText("BTN_EDIT", $lg),
            'BTN_SHOW' => ContentLanguage::getText("BTN_SHOW", $lg),
            'BTN_DELETE' => ContentLanguage::getText("BTN_DELETE", $lg),
            'TEXT_NAME' => ContentLanguage::getText("TEXT_NAME", $lg),
            'TEXT_DESCRIPTION' => ContentLanguage::getText("TEXT_DESCRIPTION", $lg),
            'NO_DATA_MSG' => ContentLanguage::getText("NO_DATA_MSG", $lg),
            'BTN_CREATE_CATEGORY' => ContentLanguage::getText("BTN_CREATE_CATEGORY", $lg)
        );

        $data = array(
            'ticketCategories' => TicketCategory::all(),
            'language' => $lg,
            'texts' => $text_data  
        );
        return view('ticketCategories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lg)
    {
        $text_data = array(
            'TEXT_NAME' => ContentLanguage::getText("TEXT_NAME", $lg),
            'TEXT_DESCRIPTION' => ContentLanguage::getText("TEXT_DESCRIPTION", $lg),
            'BTN_GO_BACK' => ContentLanguage::getText("BTN_GO_BACK", $lg),
            'BTN_CREATE_CATEGORY' => ContentLanguage::getText("BTN_CREATE_CATEGORY", $lg)
        );

        $data = array(
            'language' => $lg,
            'texts' => $text_data  
        );
        return view('ticketCategories.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TicketCategory $ticketCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($lg, TicketCategory $ticketCategory)
    {
        $text_data = array(
            'TEXT_NAME' => ContentLanguage::getText("TEXT_NAME", $lg),
            'TEXT_DESCRIPTION' => ContentLanguage::getText("TEXT_DESCRIPTION", $lg),
            'BTN_GO_BACK' => ContentLanguage::getText("BTN_GO_BACK", $lg),
            'BTN_SAVE_CHANGES' => ContentLanguage::getText("BTN_SAVE_CHANGES", $lg)
        );

        $data = array(
            'language' => $lg,
            'texts' => $text_data,
            'ticketCategory' => $ticketCategory
        );
        return view('ticketCategories.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketCategoryRequest  $request
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketCategoryRequest $request, TicketCategory $ticketCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketCategory $ticketCategory)
    {
        //
    }
}
