<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryModel;
use Validator;


class Country extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
            $countrylist=CountryModel::paginate(10);
              return response()->json($countrylist,200);
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
        //
             $rules=[
                'name'=>'required|min:5',
                'iso'=>'reqired|min:2'
              ];

           $validator=Validator::make($request->all(),$rules);
           $country=CountryModel::create($request->all());
           return response()->json($country);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $country=CountryModel::find($id);
          if (is_null($country)) {
              return response()->json("Record Not Found",404);
          }
          return response()->json($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $country=CountryModel::find($id);
        if (is_null($country)) {
            return response()->json("Record Not Found",404);
        }
        $country->update($request->all());
        return response()->json($country,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
         $country=CountryModel::find($id);
        if (is_null($country)) {
        return response()-json("Record Not Found",404);
        }
        $country->delete();
        return Response()->json("Deleted successfully",204);
    }
}
