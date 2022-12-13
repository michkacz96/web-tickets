<?php

namespace App\Http\Controllers;

use App\Models\TicketDetail;
use App\Models\Ticket;
use App\Http\Requests\StoreTicketDetailRequest;
use App\Http\Requests\UpdateTicketDetailRequest;

class TicketDetailController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ticket $ticket)
    {
        $data = [
            'ticket' => $ticket
        ];

        return view('ticketDetails.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketDetailRequest $request)
    {
        TicketDetail::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TicketDetail  $ticketDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TicketDetail $ticketDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TicketDetail  $ticketDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketDetail $ticketDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketDetailRequest  $request
     * @param  \App\Models\TicketDetail  $ticketDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketDetailRequest $request, TicketDetail $ticketDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TicketDetail  $ticketDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketDetail $ticketDetail)
    {
        //
    }
}