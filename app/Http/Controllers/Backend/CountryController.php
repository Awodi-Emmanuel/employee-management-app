<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Http\Requests\CountryStoreRequest;
use Illuminate\Http\Request;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $countries = Country::all();
        if($request->has('search')){
            $countries = Country::where('country_code', 'like',"%{$request->search}%")->orWhere('name', 'like', "%{$request->search}%")->get();
        }

        return view('countries.index', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Create()
    {
        return view('countries.create');
    }
    public function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request, Country $country)
    {
        $country->update($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')->with('message', 'Country Deleted Successfully');
    }
}
