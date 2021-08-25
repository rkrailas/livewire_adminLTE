<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class TestAutoCompleteAjax extends Component
{
    public function fetch(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('customer')
                    ->select('customerid','name')
                    ->where('name', 'LIKE', '%'.$query.'%')
                    ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row)
            {
                $output .= '<li><a href="#">'.$row->name.'</a></li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function render()
    {
        return view('livewire.test-auto-complete-ajax');
    }
}
