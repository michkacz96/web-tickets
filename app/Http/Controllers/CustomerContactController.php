<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;
use App\Http\Requests\StoreCustomerContactRequest;
use App\Http\Requests\UpdateCustomerContactRequest;

class CustomerContactController extends Controller
{
    /**
     * Display a listing of the phones.
     *
     * @return \Illuminate\Http\Response
     */
    public function phones()
    {
        $data = array(
            'contacts' => CustomerContact::where('type', 'P')->paginate() 
        );
        
        return view('contacts.index')->with($data);
    }

    /**
     * Display a listing of the emails.
     *
     * @return \Illuminate\Http\Response
     */
    public function emails()
    {
        $data = array(
            'contacts' => CustomerContact::where('type', 'E')->paginate() 
        );
        
        return view('contacts.index')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'contacts' => CustomerContact::paginate() 
        );
        
        return view('contacts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = [
            "1" => "Firma 1",
            "2" => "Firma 2",
            "3" => "Firma 3",
            "4" => "Firma 4",
            "5" => "Firma 5",
            "6" => "Firma 6",
            "7" => "Firma 7",
            "8" => "Firma 8"
        ];
        $data = [
            'contactTypes' => CustomerContact::getContactTypes(),
            'customers' => $customers
        ];
        return view('contacts.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerContactRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerContact $customerContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerContact $customerContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerContactRequest  $request
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerContactRequest $request, CustomerContact $customerContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerContact $customerContact)
    {
        //
    }
}
