<?php

namespace App\Http\Controllers;

use App\Models\TicketCategory;
use App\Models\ContentLanguage;
use App\Http\Requests\StoreTicketCategoryRequest;
use App\Http\Requests\UpdateTicketCategoryRequest;

class TicketCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'ticketCategories' => TicketCategory::paginate() 
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
        return view('ticketCategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketCategoryRequest $request)
    {
        TicketCategory::create($request->all());

        return redirect('/ticket-categories');
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
        $data = array(
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
        $ticketCategory->update($request->all());

        return redirect('/ticket-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketCategory $ticketCategory)
    {
        $ticketCategory->delete();

        return redirect('/ticket-categories');
    }

    /**
     * Display a listing of the deleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted(){
        $data = array(
            'ticketCategories' => TicketCategory::onlyTrashed()->paginate()
        );
        return view('ticketCategories.deleted')->with($data);
    }

    /**
     * Restore deleted resource.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $ticketCategory = TicketCategory::withTrashed()->find($id)->restore();
        return redirect('/ticket-categories/deleted');
    }

    /**
     * Remove the specified resource from storage premanently.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $ticketCategory = TicketCategory::withTrashed()->find($id)->forceDelete();

        return redirect('/ticket-categories/deleted');
    }
}
