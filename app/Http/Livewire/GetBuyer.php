<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Buyer;
use Illuminate\Http\Request;

class GetBuyer extends Component
{
    public function action(Request $request)
    {
        $data = $request->all();
        $query = $data['query'];
        $filter_data = DB::table('customer')
                        ->select('name')
                        ->where('name', 'LIKE', '%'.$query.'%')
                        ->get();

        return response()->json($filter_data);
    }

    public function render()
    { 
        $customers =  DB::table('customer')
                    ->select('customerid','name')
                    ->orderby('customerid')
                    ->get();
        return view('livewire.get-buyer',[
            'customers' => $customers
        ]);
    }
}