<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestAutoComplete extends Component
{
    public function getCustomer(){
        $p=DB::table('customer')
            ->select('customerid','name')
            ->get();

            return response()->json($p);
        }

    public function render()
    {
        return view('livewire.test-auto-complete');
    }
}
