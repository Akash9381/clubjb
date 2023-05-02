<?php

namespace App\Http\Controllers;

use App\Models\city;
use App\Models\Employee;
use App\Models\EmployeeDocument;
use App\Models\state as ModelsState;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class EmployeeController extends Controller
{
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
            'login_pin'  => 'required|integer',
        ]);
        try {
            $user = new User();
            $user->name = $request['employee_name'];
            $user->phone = $request['employee_number'];
            $user->login_pin = $request['login_pin'];

            $user->save();
            $user->assignRole('employee');
            $employee_id = 'E-'.sprintf("%06d", mt_rand(1, 999999));
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
                    $data = new EmployeeDocument();
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
                    $data = new EmployeeDocument();
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
                    $data = new EmployeeDocument();
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
                    $data = new EmployeeDocument();
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
                    $data = new EmployeeDocument();
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
                    $data = new EmployeeDocument();
                    $data->user_id = $user->id;
                    $data->employee_id = $employee_id;
                    $data->agreement_document = $filenametostore;
                    $data->save();
                }
            };

            return back()->with('success','Employee add Successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function InactiveEmployees(){
        return view('admin.employee.inactive-employee');
    }
}
