<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestPassword;
use App\Http\Requests\User\EditProfileRequest;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Shipping;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $getOrder = Order::where('user_id',Auth::id())->orderBy('order_id',"DESC")->get();
        return view('profile')->with('getOrder',$getOrder);
    }
    public function editProfile(EditProfileRequest $request)
    {
        
        $this->validate($request, 
        [
            'phone' => 'digits:10|numeric'
        ],[
            
            'phone.degits' => 'The phone must be 10 digits',
            'phone.numeric' => 'Phone must be numeric and contain no other characters',
        ]);
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'telephone' => $request->phone,
        ]);
        return redirect()->back()->with('thanhcong', 'User update successful');
    }
    public function getChangePassword()
    {
        return view('changepassword');
    }
    public function saveChangePassword(RequestPassword $request)
    {
        if (Auth::Check()) {
            $requestData = $request->All();
            $currentPassword = Auth::User()->password;
            if (Hash::check($requestData['oldpassword'], $currentPassword)) {
                $userId = Auth::User()->id;
                $user = User::find($userId);
                $user->password = Hash::make($requestData['newpassword']);;
                $user->save();
                return back()->with('thanhcong', 'Your password has been updated successfully.');
            } else {
                return back()->withErrors(['Sorry, your current password was not recognised. Please try again.']);
            }
        }
    }
    public function postDestroy()
    {
        $user = User::find(Auth::user()->id);
        Auth::logout();
        if ($user->delete()) {
            return redirect()->route('login')->with('global', 'Your account has been deleted!');
        }
    }
    public function orderDetail($order_id){
        $order = Order::find($order_id);
        $order->order_id = $order_id;
        $order->shipping_id;
        $shipping = DB::table('shipping')->where('shipping.shipping_id', $order->shipping_id)->limit(1)->get();
        //$shipping = Shipping::find($order->shipping_id);
        $orderDetail = OrderDetail::where('order_id',$order_id)->orderBy('order_detail_id',"DESC")->get();
        return view('order_detail')->with('orderDetail',$orderDetail)->with('order',$order)->with('shipping',$shipping);
    }
}
