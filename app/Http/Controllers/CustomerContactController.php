<?php

namespace App\Http\Controllers;

use App\Models\CustomerContact;
use App\Models\Customer;
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
        $data = [
            'contactTypes' => CustomerContact::getContactTypes(),
            'customers' => Customer::getCustomers()
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
        CustomerContact::create($request->all());

        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerContact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerContact $contact)
    {
        $data = [
            'contact' => $contact,
            'customers' => $this->customers,
            'contactTypes' => CustomerContact::getContactTypes()
        ];

        return view('contacts.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerContactRequest  $request
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerContactRequest $request, CustomerContact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CustomerContact  $customerContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerContact $contact)
    {
        //
    }
}
