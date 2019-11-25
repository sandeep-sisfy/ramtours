<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = order::orderBy('id', 'desc')->get();
        $data['page_title'] = 'All Orders';
        $data['assets_admin'] = url('assets/admin');
        return view('admin.order.all_order', $data);
    }
    public function edit($id)
    {
        $data['order'] = order::find($id);
        $data['page_title'] = 'Edit Order Details';
        $data['assets_admin'] = url('assets/admin');
        return view('admin.order.edit_order', $data);
    }
    public function update(Request $request, $id)
    {
        $order = order::find($id);
        $order->payment_status = $request->payment_status;
        $order->save();
        set_flash_msg('flash_success', 'Order Payment Status Updated Successsfully.');
        return redirect('/admin/orders-detail');
    }
    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
        set_flash_msg('flash_success', 'Order Details Deleted Successsfully.');
        return redirect('admin/orders-detail');
    }

}