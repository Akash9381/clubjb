<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Customer;
use App\Models\EmployeAadharDocument;
use App\Models\EmployeCVDocument;
use App\Models\EmployeDrivingDocument;
use App\Models\Employee;
use App\Models\EmployeeAgrementDocument;
use App\Models\EmployeeDocument;
use App\Models\EmployeePassportDocument;
use App\Models\EmployePictureDocument;
use App\Models\Shop;
use App\Models\state as ModelsState;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class EmployeeController extends Controller
{
    public function Dashboard()
    {
        return view('admin.dashboard');
    }
    public function Employee()
    {
        $states = ModelsState::all();
        return view('admin.employee.add-employee', compact('states'));
    }

    public function GetCity(Request $request)
    {
        $state_id = ModelsState::where('name', $request['state'])->first();
        $data['cities'] = city::where('state_id', $state_id['id'])->get(['city']);
        return response()->json($data);
    }

    public function NewEmployee(Request $request)
    {
        $this->validate($request, [
            'employee_name'      => 'required',
            'employee_number'    => 'required|integer',
        ]);

        $data               = User::where('phone', $request->employee_number)->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();

        if ($data) {
            return back()->with('error', 'Already Exist!');
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

                $employee_id = 'E-' . sprintf("%06d", mt_rand(1, 999999));
                $user = new User();
                $user->name         = $request['employee_name'];
                $user->phone        = $request['employee_number'];
                $user->login_pin    = $request['login_pin'];
                $user->customer_id  = $employee_id;
                $user->state        = $request['state'];
                $user->city         = $request['city'];
                $user->ref_number   = $request['ref_number'];
                $user->status       = '0';
                $user->save();

                $user->assignRole(['employee', 'customer']);

                $employee = new Employee();
                $employee->user_id = $user->id;
                $employee->employee_id = $employee_id;
                $employee->employee_type = $request['employee_type'];

                $employee->save();


                if ($request->hasFile('picture_document')) {
                    foreach ($request->file('picture_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/picture_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/picture_document/' . $filenametostore);
                        $data               = new EmployePictureDocument();
                        $data->user_id      = $user->id;
                        $data->employee_id  = $employee_id;
                        $data->picture_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('aadhar_document')) {
                    foreach ($request->file('aadhar_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/aadhar_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/aadhar_document/' . $filenametostore);
                        $data = new EmployeAadharDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->aadhar_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('driving_document')) {
                    foreach ($request->file('driving_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/driving_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/driving_document/' . $filenametostore);
                        $data = new EmployeDrivingDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->driving_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('cv_document')) {
                    foreach ($request->file('cv_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/cv_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/cv_document/' . $filenametostore);
                        $data = new EmployeCVDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->cv_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('passport_document')) {
                    foreach ($request->file('passport_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/passport_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/passport_document/' . $filenametostore);
                        $data = new EmployeePassportDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->passport_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('agreement_document')) {
                    foreach ($request->file('agreement_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/agreement_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/agreement_document/' . $filenametostore);
                        $data = new EmployeeAgrementDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->agreement_document = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Employee Added Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function InactiveEmployees()
    {
        $employees = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'employee');
            }
        )->where('status', 0)->orderBy('id', 'desc')->get();
        return view('admin.employee.inactive-employee', compact('employees'));
    }

    public function ActiveEmployees()
    {
        $employees = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'employee');
            }
        )->where('status', 1)->orderBy('id', 'desc')->get();
        return view('admin.employee.active-employee', compact('employees'));
    }

    public function EmployeeProfile($employee_id = null)
    {
        $employee = User::with('Employee')->with('GetEmployeeCV')->with('GetEmployeeAgreement')->with('GetEmployeeDriving')->with('GetEmployeePassPort')->with('GetEmployeeAadhar')->with('GetEmployeePicture')->where('id', $employee_id)->first();
        return view('admin.employee.employee-profile', compact('employee'));
    }

    public function Profile()
    {
        $employee = User::with('Employee')->with('GetEmployeeCV')->with('GetEmployeeAgreement')->with('GetEmployeeDriving')->with('GetEmployeePassPort')->with('GetEmployeeAadhar')->with('GetEmployeePicture')->where('id', Auth::user()->id)->first();
        return view('employee.profile', compact('employee'));
    }

    public function EmployeeStatus(Request $request)
    {
        if ($request['status'] == '0') {
            $data['status'] = User::where('id', $request['employee_id'])->update([
                'status' => $request['status'],
                'active_date' => null
            ]);
            return response()->json($data);
        } else {
            $data['status'] = User::where('id', $request['employee_id'])->update([
                'status' => $request['status'],
                'active_date' => Carbon::now()
            ]);
            return response()->json($data);
        }
    }

    public function CustomerSearch(Request $request)
    {
        $phone = $request['phone'];
        if ($phone) {
            $this->validate($request, [
                'phone' => 'required|unique:users'
            ]);
            return view('employee.add-customer', compact('phone'));
        } else {
            return view('employee.search_customer');
        }
    }

    public function EmployeeSearch(Request $request)
    {
        $search = $request['search'];
        $data = [];
        if ($search) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name', '<>', 'admin'); // role with no admin
            })->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('phone', 'like', '%' . $search . '%');
                }
            })->get();
            return view('employee.search_employee', compact('data'));
        } else {
            return view('employee.search_employee', compact('data'));
        }
    }

    public function SearchShopKeeper(Request $request)
    {
        $phone = $request['phone'];
        if ($phone) {
            $this->validate($request, [
                'phone' => 'required|unique:users'
            ]);
            return redirect('employee/add-shopkeeper?phone=' . $phone);
        } else {
            return view('employee.search_shopkeeper');
        }
    }

    public function ShopkeeperSearch(Request $request)
    {
        $search = $request['search'];
        $data = [];
        if ($search) {
            $data = User::whereHas('roles', function ($query) {
                $query->where('name', '<>', 'admin'); // role with no admin
            })->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('phone', 'like', '%' . $search . '%');
                }
            })->get();
            return view('shopkeeper.search_shopkeeper', compact('data'));
        } else {
            return view('shopkeeper.search_shopkeeper', compact('data'));
        }
    }

    public function EmployeeNewEmployee()
    {
        $states = ModelsState::all();
        return view('employee.add-employee', compact('states'));
    }

    public function EmployeeStoreEmployee(Request $request)
    {

        $this->validate($request, [
            'employee_name'      => 'required',
            'employee_number'    => 'required|integer',
            'login_pin'  => 'required|integer',
        ]);
        $data = User::where('phone', $request->employee_number)->first();
        if ($data) {
            return back()->with('error', 'Employee Already Exist!');
        } else {

            try {
                $user = new User();
                $user->name = $request['employee_name'];
                $user->phone = $request['employee_number'];
                $user->login_pin = $request['login_pin'];
                $user->state = $request['state'];
                $user->city = $request['city'];
                $user->save();
                $user->assignRole(['employee', 'customer']);
                $employee_id = 'E-' . sprintf("%06d", mt_rand(1, 999999));

                $employee = new Employee();
                $employee->user_id = $user->id;
                $employee->employee_id =  $employee_id;
                $employee->employee_name = $request['employee_name'];
                $employee->state = $request['state'];
                $employee->city = $request['city'];
                $employee->employee_type = $request['employee_type'];
                $employee->employee_number = $request['employee_number'];
                $employee->ref_number = $request['ref_number'];
                $employee->status = '0';
                $employee->save();


                if ($request->hasFile('picture_document')) {
                    foreach ($request->file('picture_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/picture_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/picture_document/' . $filenametostore);
                        $data = new EmployePictureDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->picture_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('aadhar_document')) {
                    foreach ($request->file('aadhar_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/aadhar_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/aadhar_document/' . $filenametostore);
                        $data = new EmployeAadharDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->aadhar_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('driving_document')) {
                    foreach ($request->file('driving_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/driving_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/driving_document/' . $filenametostore);
                        $data = new EmployeDrivingDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->driving_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('cv_document')) {
                    foreach ($request->file('cv_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/cv_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/cv_document/' . $filenametostore);
                        $data = new EmployeCVDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->cv_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('passport_document')) {
                    foreach ($request->file('passport_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/passport_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/passport_document/' . $filenametostore);
                        $data = new EmployeePassportDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->passport_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('agreement_document')) {
                    foreach ($request->file('agreement_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/agreement_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/agreement_document/' . $filenametostore);
                        $data = new EmployeeAgrementDocument();
                        $data->user_id = $user->id;
                        $data->employee_id = $employee_id;
                        $data->agreement_document = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Employee Added Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }
    }

    public function EmployeeEditShopKeeper($id = null)
    {
        $states = ModelsState::all();
        $shop = Shop::with('GetLocalShop')->with('GetShopPicture')->with('GetShopMenu')->with('GetShopAdhar')->with('GetShopPanCard')->with('GetShopDriving')->with('GetShopPassport')->with('GetShopCv')->with('GetShopDeals')->with('GetShopAgreement')->where('user_id', $id)->first();
        return view('employee.update-shopkeeper', compact('states', 'shop'));
    }

    public function EmployeeUpdateShopKeeper($shop_id = null)
    {
        return back()->with('success', 'Shop Keeper Not Update yet');
    }

    public function EditEmployee($id = null)
    {
        try {
            $states = ModelsState::all();
            $employee = User::with('Employee')->with('GetEmployeeCV')->with('GetEmployeeAgreement')->with('GetEmployeeDriving')->with('GetEmployeePassPort')->with('GetEmployeeAadhar')->with('GetEmployeePicture')->where('id', $id)->first();
            return view('admin.employee.edit-employee', compact('states', 'employee'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function DeletePicture($id = null)
    {
        try {
            EmployePictureDocument::where('id', $id)->delete();
            return back()->with('success', 'Picture Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function DeleteAadhar($id = null)
    {
        try {
            EmployeAadharDocument::where('id', $id)->delete();
            return back()->with('success', 'Aadhar Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function DeleteDriving($id = null)
    {
        try {
            EmployeDrivingDocument::where('id', $id)->delete();
            return back()->with('success', 'Driving Licence Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function DeleteCv($id = null)
    {
        try {
            EmployeCVDocument::where('id', $id)->delete();
            return back()->with('success', 'CV Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function DeletePassport($id = null)
    {
        try {
            EmployeePassportDocument::where('id', $id)->delete();
            return back()->with('success', 'Passport Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
    public function DeleteAgreement($id = null)
    {
        try {
            EmployeeAgrementDocument::where('id', $id)->delete();
            return back()->with('success', 'Agreement Deleted Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function UpdateEmployee(Request $request, $id = null)
    {
        $employee           = User::where('id', $id)->first();
        $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        $ref_num            = User::where('phone', $request['ref_number'])->first();
        if (empty($ref_id)) {
            if (empty($ref_num)) {
                return back()->with('error', 'Refer Id/Ref Number Invalid');
            }
        }

        if ($employee) {
            $this->validate($request, [
                'employee_name'      => 'required',
                'employee_number'    => 'required|integer|digits:10',
                'login_pin'          => 'required|integer|digits:4',
                'ref_number'         => 'required',
            ]);
            try {
                $user = User::where('id', $id)->first();
                User::where('id', $id)->update([
                    'name'           => $request['employee_name'],
                    'login_pin'      => $request['login_pin'],
                    'state'          => $request['state'],
                    'city'           => $request['city'],
                    'ref_number'     => $request['ref_number']
                ]);

                Employee::where('user_id', $id)->update([
                    'employee_type' => $request['employee_type'],
                ]);
                if ($request->hasFile('picture_document')) {
                    foreach ($request->file('picture_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/picture_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/picture_document/' . $filenametostore);
                        EmployePictureDocument::updateOrCreate(
                            ['user_id' => $id],
                            [
                                'user_id'           => $id,
                                'employee_id'       => $user->customer_id,
                                'picture_document'  => $filenametostore
                            ]
                        );
                    }
                };
                if ($request->hasFile('aadhar_document')) {
                    foreach ($request->file('aadhar_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/aadhar_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/aadhar_document/' . $filenametostore);
                        $data = new EmployeAadharDocument();
                        $data->user_id = $id;
                        $data->employee_id = $user->customer_id;
                        $data->aadhar_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('driving_document')) {
                    foreach ($request->file('driving_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/driving_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/driving_document/' . $filenametostore);
                        $data = new EmployeDrivingDocument();
                        $data->user_id = $id;
                        $data->employee_id = $user->customer_id;
                        $data->driving_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('cv_document')) {
                    foreach ($request->file('cv_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/cv_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/cv_document/' . $filenametostore);
                        $data = new EmployeCVDocument();
                        $data->user_id = $id;
                        $data->employee_id = $user->customer_id;
                        $data->cv_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('passport_document')) {
                    foreach ($request->file('passport_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/passport_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/passport_document/' . $filenametostore);
                        $data = new EmployeePassportDocument();
                        $data->user_id = $id;
                        $data->employee_id = $user->customer_id;
                        $data->passport_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('agreement_document')) {
                    foreach ($request->file('agreement_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/agreement_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/agreement_document/' . $filenametostore);
                        $data = new EmployeeAgrementDocument();
                        $data->user_id = $id;
                        $data->employee_id = $user->customer_id;
                        $data->agreement_document = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Employee Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function UpdateProfile()
    {
        try {
            $states = ModelsState::all();
            $employee = User::with('Employee')->with('GetEmployeeCV')->with('GetEmployeeAgreement')->with('GetEmployeeDriving')->with('GetEmployeePassPort')->with('GetEmployeeAadhar')->with('GetEmployeePicture')->where('id', Auth::user()->id)->first();
            return view('employee.update-profile', compact('states', 'employee'));
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function UpdateProfileData(Request $request, )
    {
        $employee           = User::where('id', Auth::user()->id)->first();
        // $ref_id             = User::where('customer_id', $request['ref_number'])->first();
        // $ref_num            = User::where('phone', $request['ref_number'])->first();
        // if (empty($ref_id)) {
        //     if (empty($ref_num)) {
        //         return back()->with('error', 'Refer Id/Ref Number Invalid');
        //     }
        // }

        if ($employee) {
            $this->validate($request, [
                'employee_name'      => 'required',
                'employee_number'    => 'required|integer|digits:10',
                'login_pin'          => 'required|integer|digits:4',
                // 'ref_number'         => 'required',
            ]);
            try {
                $user = User::where('id', Auth::user()->id)->first();
                User::where('id', Auth::user()->id)->update([
                    'name'           => $request['employee_name'],
                    'login_pin'      => $request['login_pin'],
                    'state'          => $request['state'],
                    'city'           => $request['city'],
                    'ref_number'     => $request['ref_number']
                ]);

                if ($request->hasFile('picture_document')) {
                    foreach ($request->file('picture_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/picture_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/picture_document/' . $filenametostore);
                        EmployePictureDocument::updateOrCreate(
                            ['user_id' => Auth::user()->id],
                            [
                                'user_id'           => Auth::user()->id,
                                'employee_id'       => $user->customer_id,
                                'picture_document'  => $filenametostore
                            ]
                        );
                    }
                };
                if ($request->hasFile('aadhar_document')) {
                    foreach ($request->file('aadhar_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/aadhar_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/aadhar_document/' . $filenametostore);
                        $data = new EmployeAadharDocument();
                        $data->user_id = Auth::user()->id;
                        $data->employee_id = $user->customer_id;
                        $data->aadhar_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('driving_document')) {
                    foreach ($request->file('driving_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/driving_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/driving_document/' . $filenametostore);
                        $data = new EmployeDrivingDocument();
                        $data->user_id = Auth::user()->id;
                        $data->employee_id = $user->customer_id;
                        $data->driving_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('cv_document')) {
                    foreach ($request->file('cv_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/cv_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/cv_document/' . $filenametostore);
                        $data = new EmployeCVDocument();
                        $data->user_id = Auth::user()->id;
                        $data->employee_id = $user->customer_id;
                        $data->cv_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('passport_document')) {
                    foreach ($request->file('passport_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/passport_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/passport_document/' . $filenametostore);
                        $data = new EmployeePassportDocument();
                        $data->user_id = Auth::user()->id;
                        $data->employee_id = $user->customer_id;
                        $data->passport_document = $filenametostore;
                        $data->save();
                    }
                };
                if ($request->hasFile('agreement_document')) {
                    foreach ($request->file('agreement_document') as $image) {
                        $filenamewithextension = $image->getClientOriginalName();
                        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                        $extension = $image->getClientOriginalExtension();
                        $filenametostore = $filename . '_' . time() . '.' . $extension;
                        $image->storeAs('public/employee/agreement_document', $filenametostore);

                        $featureimagepath = public_path('storage/employee/agreement_document/' . $filenametostore);
                        $data = new EmployeeAgrementDocument();
                        $data->user_id = Auth::user()->id;
                        $data->employee_id = $user->customer_id;
                        $data->agreement_document = $filenametostore;
                        $data->save();
                    }
                };

                return back()->with('success', 'Profile Updated Successfully');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}
