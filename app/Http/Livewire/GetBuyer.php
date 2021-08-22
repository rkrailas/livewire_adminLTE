<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Buyer;

class GetBuyer extends Component
{

    

    public function render()
    { 
        // $products = collect([
        //     ['id'=>1, 'name'=>'Product 1', 'price' => 80.12345],
        //     ['id'=>2, 'name'=>'Product 2', 'price' => 20],
        //     ['id'=>3, 'name'=>'Product 3', 'price' => 34],
        //     ['id'=>4, 'name'=>'Product 4', 'price' => 45],
        // ]);
        // //dd($products->all());
        // // $vatRate = 10;
        // // function calculateVat($price, $vatRate) {
        // //     return $price * ($vatRate/100);
        // // }

        // // $products->transform(function($item) {
        // //     $item['price'] = number_format($item['price'],2);
        // //     return $item;
        // // });

        // $data = DB::table('gltran')
        //     //->select('gltran','glaccount','glaccname')
        //     ->selectRaw('gltran,glaccount,gldebit,glcredit')
        //     ->limit(4)
        //     ->get();

        // $data = collect(json_decode(json_encode($data), true)); 

        // if($data->isNotEmpty())
        // {
        //     dd($data[0]['gltran']);
        // }
        // $data = $data->transform(function($item) {
        //     $item['gldebit'] = round($item['gldebit'],2);
        //     $item['glcredit'] = round($item['glcredit'],2);
        //     return $item;
        // });
      
        return view('livewire.get-buyer');
    }
}