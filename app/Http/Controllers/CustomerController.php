<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Customer;
use App\models\CustomerImage;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function add()
    {
        return view('page.customer.add');
    }

    public function get($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        return view('page.customer.detail', compact('customer'));
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'company' => 'unique:customers,company',
            'email' => 'email',
        ]);
        $customer = new Customer();
        $customer->fill($request->all());
        $imageSavePath = 'public/storage/images/';
        if ($request->hasFile('image')) {

            $imageNameGen = str_random(5)
                . '_'
                . rand(11111, 99999)
                . "_" . time()
                . "."
                . $request->file('image')->getClientOriginalExtension();
            Image::make($request->file('image'))->save($imageSavePath . $imageNameGen);
            $customer->image = $imageSavePath . '/' . $imageNameGen;

        }
        $customer->save();
        if ($request->hasFile('images_more')) {
            foreach ($request->file('images_more') as $imageItem) {
                if ($imageItem) {
                    $imageNameGen = str_random(5)
                        . '_' .
                        rand(11111, 99999)
                        . "_"
                        . time()
                        . "."
                        . $imageItem->getClientOriginalExtension();
                    Image::make($imageItem)->save($imageSavePath . $imageNameGen);
                    $image = new CustomerImage();
                    $image->image = $imageSavePath . '/' . $imageNameGen;
                    $customer->images()->save($image);
                }
            }

        }
        return redirect('dashboard/customer/' . $customer->id);
    }
}
