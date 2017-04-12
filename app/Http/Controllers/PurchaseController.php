<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Offering;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseController extends Controller
{
    function __construct(){

    }
    public function index()
    {
        $data['offers'] = Offering::get();
        return view('purchase',$data);
        //echo "<pre>"; print_r($data['offers']); echo "</pre>";
    }
    public function store(Request $request)
    {
        //print_r($request->all()); die;
        try{
            $appToken = $request->app_token;
            if($appToken=='1234567'){
                $purchase = new Purchase;

                $purchase->customerName = $request->customerName;
                $purchase->offeringID = $request->offeringID;
                $purchase->quantity = $request->quantity;

                $errorMessage = '';
                if($purchase->customerName==''){
                    $errorMessage.="Customer name required,";
                }
                if($purchase->offeringID==''){
                    $errorMessage.="offering required,";
                }
                if($purchase->quantity==''){
                    $errorMessage.="quantity required";
                }

                if($errorMessage!=''){
                    return json_encode(['status'=>401,'reason'=>$errorMessage]);
                }
                else{
                    $purchase->save();

                    return json_encode(['status'=>200,'reason'=>'success','purchase'=>$purchase]);
                }

            }
            else{
                return json_encode(['status'=>401,'reason'=>'invalid APP token']);
            }

        }
        catch(\Exception $e) {
            $message = $e->getMessage();
            echo $message;
        }
    }

    public function purchaseList(Request $request){
        try{
            $purchase = new Purchase;
            $data['purchases'] = $purchase->get();
            return view('purchaseList',$data);
        }
        catch(\Exception $e) {
            $message = $e->getMessage();
            echo $message;
        }
    }
}