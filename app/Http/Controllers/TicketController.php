<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use App\Models\TicketCategory;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;

class TicketController extends Controller
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
        $data = [
            'tickets' => Ticket::paginate()
        ];

        return view('tickets.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'customers' => Customer::getCustomers(),
            'categories' => TicketCategory::getCategories()
        ];
        return view('tickets.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        Ticket::create($request->all());

        return redirect(route('tickets.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $data = [
            'ticket' => $ticket
        ];
        return view('tickets.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $data = [
            'customers' => Customer::getCustomers(),
            'categories' => TicketCategory::getCategories(),
            'ticket' => $ticket
        ];

        return view('tickets.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return redirect(route('tickets.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->back();
    }

    /**
     * Display a listing of the deleted resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleted(){
        $data = array(
            'tickets' => Ticket::onlyTrashed()->paginate()
        );
        return view('tickets.deleted')->with($data);
    }

    /**
     * Restore deleted resource.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $ticket = Ticket::withTrashed()->find($id)->restore();
        return redirect(route('tickets.deleted'));
    }

    /**
     * Remove the specified resource from storage premanently.
     *
     * @param  \App\Models\TicketCategory  $ticketCategory
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $ticket = Ticket::withTrashed()->find($id)->forceDelete();

        return redirect()->back();
    }

    public function showAssignTo(Ticket $ticket){
        $data = [
            'ticket' => $ticket,
            'users' => auth()->user()->getUsers()
        ];
        return view('tickets.assign')->with($data);
    }

    public function assignTo(Request $request, Ticket $ticket){
        $ticket->assignTo($request->input('assign_to'));

        return redirect(route('tickets.index'));
    }
}
