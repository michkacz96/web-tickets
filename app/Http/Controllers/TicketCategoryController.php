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
        //$lg = "pl_pl";
        $text_data = array(
            'BTN_EDIT' => ContentLanguage::getText("BTN_EDIT", $lg),
            'BTN_SHOW' => ContentLanguage::getText("BTN_SHOW", $lg),
            'BTN_DELETE' => ContentLanguage::getText("BTN_DELETE", $lg),
            'TABLE_COL_NAME' => ContentLanguage::getText("TABLE_COL_NAME", $lg),
            'TABLE_COL_DESCRIPTION' => ContentLanguage::getText("TABLE_COL_DESCRIPTION", $lg),
            'NO_DATA_MSG' => ContentLanguage::getText("NO_DATA_MSG", $lg),
            'CREATE_NEW_BUTTON_TICKET_CATEGORY' => ContentLanguage::getText("CREATE_NEW_BUTTON_TICKET_CATEGORY", $lg)
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
    public function create()
    {
        //
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
    public function edit(TicketCategory $ticketCategory)
    {
        //
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
