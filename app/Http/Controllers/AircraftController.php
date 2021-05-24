<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Aircraft;
use App\Http\Resources\AircraftForList as AircraftForListResource;
use App\Http\Resources\AircraftForShow as AircraftForShowResource;
use App\Http\Resources\AircraftSelector as AircraftSelectorResource;

class AircraftController extends Controller
{
    //
    function index(){
        $aircrafts = Aircraft::all();
        return AircraftForListResource::collection($aircrafts);
    }
    //
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $$aircraft = new Aircraft;
            $$aircraft->manufacturer = $request->aircraft['manufacturer'];
            $$aircraft->name = $request->aircraft['name'];
            $$aircraft->serialNo = $request->aircraft['serialNo'];
            $$aircraft->owner = $request->aircraft['owner'];
            $$aircraft->type = $request->aircraft['type'];
            $$aircraft->weight = $request->aircraft['weight'];
            $$aircraft->is_report = $request->aircraft['is_report'];

            $$aircraft->save();
        });

        return response()->json([
            'result' => true,
        ]);
    }
    //
    public function show(Customer $customer)
    {
        return new AircraftForShowResource($customer);
    }
/*
    //
    public function update(Request $request, Customer $customer)
    {
        $count = Customer::where([
            ['id', '<>', $customer->id],
            ['code', $request->customer['code']]
        ])->count();
        if ($count) {
            return response()->json([
                'result' => false,
                'errorMessage' => 'コードは既に登録されています。'
            ]);
        }
        DB::transaction(function () use ($request, $customer) {
            $customer->code = $request->customer['code'];
            $customer->name = $request->customer['name'];
            $customer->postal_code = $request->customer['postal_code'];
            $customer->address = $request->customer['address'];
            $customer->tel = $request->customer['tel'];
            $customer->fax = $request->customer['fax'];
            $customer->closing_day = $request->customer['closing_day'];

            $customer->save();
        });

        return response()->json([
            'result' => true,
        ]);
    }
    //
    public function destroy(Customer $customer)
    {
        DB::transaction(function () use ($customer) {
            $customer->delete();
        });

        return response()->json([
            'result' => true,
        ]);
    }
    //
    public function selector(Request $request)
    {
        $code = $request->code;
        $name = $request->name;
        $postal_code = $request->postal_code;
        $address = $request->address;
        $tel = $request->tel;
        $fax = $request->fax;
        $closing_day = $request->closing_day;
        $customers = Customer::when($code, function ($query) use ($code) {
                return $query->where('code', 'like', '%'.$code.'%');
            })
            ->when($name, function ($query) use ($name) {
                return $query->where('name', 'like', '%'.$name.'%');
            })
            ->when($postal_code, function ($query) use ($postal_code) {
                return $query->where('postal_code', 'like', '%'.$name.'%');
            })
            ->when($address, function ($query) use ($address) {
                return $query->where('address', 'like', '%'.$address.'%');
            })
            ->when($tel, function ($query) use ($tel) {
                return $query->where('tel', 'like', '%'.$tel.'%');
            })
            ->when($fax, function ($query) use ($fax) {
                return $query->where('fax', 'like', '%'.$fax.'%');
            })
            ->when($fax, function ($query) use ($closing_day) {
                return $query->where('closing_day', 'like', '%'.$closing_day.'%');
            })
            ->get();
        return CustomerSelectorResource::collection($customers);
    }
*/
}
