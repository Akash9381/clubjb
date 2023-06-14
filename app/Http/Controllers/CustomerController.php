<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class CustomerController extends Controller
{
    public function NewCustomer(Request $request)
    {
        $user = User::where('phone', $request['customer_number'])->first();
        if ($user) {
            return back()->with('error', 'User Already Exist');
        } else {
            try {
                $data                   = new User();
                $data->name             = $request['customer_name'];
                $data->phone            = $request['customer_number'];
                $data->login_pin        = $request['login_pin'];
                $data->save();
                $data->assignRole(['customer']);
                $customer_id                = 'C-' . sprintf("%06d", mt_rand(1, 999999));
                $customer                   = new Customer();
                $customer->user_id          = $data->id;
                $customer->customer_id      = $customer_id;
                $customer->customer_name    = $request['customer_name'];
                $customer->customer_number  = $request['customer_number'];
                $customer->payment_status   = $request['payment_status'];
                $customer->ref_number       = $request['ref_number'];
                $customer->wp_msg           = $request['wp_msg'];
                $customer->status           = '0';
                $customer->save();
                return back()->with('success', 'Customer Add Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function ShopKeeperNewCustomer(Request $request)
    {
        $request->validate([
            'customer_name'     => 'required',
            'phone'             => 'required|unique:users',
            'login_pin'         => 'required'
        ]);
        $user = User::where('phone', $request['phone'])->first();
        if ($user) {
            return back()->with('error', 'User Already Exist');
        } else {
            try {
                $data = new User();
                $data->name         = $request['customer_name'];
                $data->phone        = $request['phone'];
                $data->login_pin    = $request['login_pin'];
                $data->save();
                $data->assignRole(['customer']);
                $customer_id                = 'C-' . sprintf("%06d", mt_rand(1, 999999));
                $customer                   = new Customer();
                $customer->user_id          = $data->id;
                $customer->customer_id      = $customer_id;
                $customer->customer_name    = $request['customer_name'];
                $customer->customer_number  = $request['phone'];
                $customer->payment_status   = $request['payment_status'];
                $customer->ref_number       = $request['ref_number'];
                $customer->wp_msg           = $request['wp_msg'];
                $customer->status           = '0';
                $customer->save();
                return back()->with('success', 'Customer Add Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function  InActiveCustomers()
    {
        $customers = Customer::with('GetCustomers')->where('status', '0')->get();
        return view('admin.customer.inactive-customers', compact('customers'));
    }

    public function  ActiveCustomers()
    {
        $customers = Customer::with('GetCustomers')->where('status', '1')->get();
        return view('admin.customer.active-customers', compact('customers'));
    }

    public function CustomerStatus(Request $request)
    {
        $data['status'] = Customer::where('customer_id', $request['customer_id'])->update([
            'status' => $request['status']
        ]);
        return response()->json($data);
    }

    public function CustomerProfile($customer_id)
    {
        $customer = Customer::with('GetCustomers')->where('customer_id', $customer_id)->first();
        return view('admin.customer.customer-profile', compact('customer'));
    }

    public function EmployeeNewCustomer(Request $request)
    {
        $user = User::where('phone', $request['customer_number'])->first();
        if ($user) {
            return back()->with('error', 'User Already Exist');
        } else {
            try {
                $data = new User();
                $data->name = $request['customer_name'];
                $data->phone = $request['customer_number'];
                $data->login_pin = $request['login_pin'];
                $data->save();
                $data->assignRole(['customer']);
                $customer_id = 'C-' . sprintf("%06d", mt_rand(1, 999999));
                $customer = new Customer();
                $customer->user_id = $data->id;
                $customer->customer_id = $customer_id;
                $customer->customer_name = $request['customer_name'];
                $customer->customer_number = $request['customer_number'];
                $customer->payment_status = $request['payment_status'];
                $customer->ref_number = $request['ref_number'];
                $customer->wp_msg = $request['wp_msg'];
                $customer->status = '0';
                $customer->save();
                return back()->with('success', 'Customer Add Successfully');
            } catch (\Exception $e) {

                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function EditCustomer($customer_id = null)
    {
        $customer = Customer::with('GetCustomers')->where('customer_id', $customer_id)->first();
        return view('admin.customer.update-customer', compact('customer'));
    }

    public function UpdateCustomer(Request $request, $customer_id = null)
    {
        try {
            $cust_id = Customer::where('customer_id', $customer_id)->first();
            User::where('id', $cust_id->user_id)->update([
                'name' => $request['customer_name']
            ]);

            Customer::where('customer_id', $customer_id)->update([
                'customer_name' => $request['customer_name'],
                'payment_status' => $request['payment_status'],
                'wp_msg' => $request['wp_msg'],
                'ref_number' => $request['ref_number'],
            ]);
            return back()->with('success', 'Customer Update Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function CustomerReport()
    {
        $customers = Customer::where('ref_number', Auth::user()->phone)->get();
        return view('employee.customer_report', compact('customers'));
    }
    public function ShopkeeperCustomerReport(){
        $customers = Customer::where('ref_number', Auth::user()->phone)->get();
        return view('shopkeeper.customer_report',compact('customers'));
    }
    public function CustomerEmployeeProfile($customer_id = null)
    {
        $customer = Customer::where('ref_number', Auth::user()->phone)->where('customer_id', $customer_id)->first();
        return view('employee.customer-profile', compact('customer'));
    }
}
