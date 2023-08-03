<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class CustomerController extends Controller
{
    public function NewCustomer(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required|integer|digits:10',
        ]);
        $user               = User::where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if ($user) {
            return back()->with('error', 'Already Exist');
        } else {
            try {
                if (empty($request['ref_number'])) {
                    $request['ref_number'] = 'A-123456';
                } else {
                    if (empty($ref_id)) {
                        if (empty($ref_num)) {
                            return back()->with('error', 'Refer Id/Ref Number Invalid');
                        }
                    }
                }
                if (empty($request['login_pin'])) {
                    $request['login_pin'] = '1111';
                }
                $customer_id            = 'C-' . sprintf("%06d", mt_rand(1, 999999));

                $data                   = new User();
                $data->name             = $request['name'];
                $data->phone            = $request['phone'];
                $data->customer_id      = $customer_id;
                $data->login_pin        = $request['login_pin'];
                $data->ref_number       = $request['ref_number'];
                $data->status           = 0;
                $data->save();

                $data->assignRole(['customer']);

                $customer                   = new Customer();
                $customer->user_id          = $data->id;
                $customer->customer_id      = $customer_id;
                $customer->payment_status   = $request['payment_status'];
                $customer->wp_msg           = $request['wp_msg'];
                $customer->save();
                return back()->with('success', 'Customer Added Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function ShopKeeperNewCustomer(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required|integer|digits:10',
            'ref_number' => 'required'
        ]);
        $user               = User::where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Ref Number Invalid');
            }
        }
        if ($user) {
            return back()->with('error', 'Already Exist!');
        } else {
            try {
                $customer_id            = 'C-' . sprintf("%06d", mt_rand(1, 999999));

                $data                   = new User();
                $data->name             = $request['name'];
                $data->phone            = $request['phone'];
                $data->customer_id      = $customer_id;
                $data->login_pin        = '1111';
                $data->ref_number       = $request['ref_number'];
                $data->status           = 0;
                $data->save();

                $data->assignRole(['customer']);

                $customer                   = new Customer();
                $customer->user_id          = $data->id;
                $customer->customer_id      = $customer_id;
                $customer->payment_status   = $request['payment_status'];
                $customer->wp_msg           = $request['wp_msg'];
                $customer->save();
                return redirect('shopkeeper/give-services?phone=' . $request['phone']);
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function  InActiveCustomers()
    {
        $customers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'customer');
            }
        )->where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.customer.inactive-customers', compact('customers'));
    }

    public function  ActiveCustomers()
    {
        $customers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'customer');
            }
        )->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.customer.active-customers', compact('customers'));
    }

    public function CustomerStatus(Request $request)
    {
        if ($request['status'] == '0') {
            $data['status'] = Customer::where('customer_id', $request['customer_id'])->update([
                'status' => $request['status'],
                'active_date' => null
            ]);
            return response()->json($data);
        } else {
            $data['status'] = Customer::where('customer_id', $request['customer_id'])->update([
                'status' => $request['status'],
                'active_date' => Carbon::now()
            ]);
            return response()->json($data);
        }
    }

    public function CustomerProfile($id)
    {
        $customer = User::with('Customer')->where('id', $id)->first();
        return view('admin.customer.customer-profile', compact('customer'));
    }

    public function EmployeeNewCustomer(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required|integer|digits:10',
            'ref_number' => 'required'
        ]);
        $user               = User::where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Ref Number Invalid');
            }
        }
        if ($user) {
            return back()->with('error', 'Already Exist!');
        } else {
            try {
                $customer_id            = 'C-' . sprintf("%06d", mt_rand(1, 999999));

                $data                   = new User();
                $data->name             = $request['name'];
                $data->phone            = $request['phone'];
                $data->customer_id      = $customer_id;
                $data->login_pin        = '1111';
                $data->ref_number       = $request['ref_number'];
                $data->status           = 0;
                $data->save();

                $data->assignRole(['customer']);

                $customer                   = new Customer();
                $customer->user_id          = $data->id;
                $customer->customer_id      = $customer_id;
                $customer->payment_status   = $request['payment_status'];
                $customer->wp_msg           = $request['wp_msg'];
                $customer->save();
                return redirect('employee/customer-search')->with('success', 'Customer Added Successfully');
            } catch (\Exception $e) {
                return redirect('employee/customer-search')->with('error', $e->getMessage());
            }
        }
    }

    public function EditCustomer($id = null)
    {
        $customer = User::with('Customer')->where('id', $id)->first();
        return view('admin.customer.update-customer', compact('customer'));
    }

    public function UpdateCustomer(Request $request, $id = null)
    {
        $this->validate($request, [
            'name'      => 'required',
            'phone'     => 'required|integer|digits:10',
        ]);

        $user               = User::where('id', $id)->where('phone', $request['phone'])->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Ref Number Invalid');
            }
        }
        if ($user) {
            try {
                $cust_id = User::where('id', $id)->first();
                User::where('id', $id)->update([
                    'name' => $request['name'],
                    'ref_number' => $request['ref_number']
                ]);
                Customer::where('user_id', $id)->update([
                    'payment_status' => $request['payment_status'],
                    'wp_msg' => $request['wp_msg'],
                ]);
                return back()->with('success', 'Customer Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Inavlid User');
        }
    }

    public function CustomerReport()
    {
        $customers = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'customer');
            }
        )->whereIn('ref_number', [Auth::user()->phone, Auth::user()->customer_id])->get();
        return view('employee.customer_report', compact('customers'));
    }
    public function ShopkeeperCustomerReport()
    {
        $customers = Customer::where('ref_number', Auth::user()->phone)->get();
        return view('shopkeeper.customer_report', compact('customers'));
    }
    public function CustomerEmployeeProfile($id = null)
    {
        $customer = User::where('id', $id)->with('Customer')->first();
        // $customer = Customer::where('ref_number', Auth::user()->phone)->where('customer_id', $customer_id)->first();
        return view('employee.customer-profile', compact('customer'));
    }
}
