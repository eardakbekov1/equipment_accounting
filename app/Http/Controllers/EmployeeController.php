<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Requests\EmployeeRequest;
use App\Models\Device;
use App\Models\Employee;
use App\Models\History;
use App\Models\Location;
use App\Models\Organization;
use App\Models\Position;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PharIo\Version\Exception;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        $titles = ['Employees', 'employee', 'employees'];

        return view('employees.index', compact('employees', 'titles'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $organizations = Organization::all();
        $positions = Position::all();
        $titles = ['Employees', 'employee', 'employees', 'Create'];

        return view('employees.create', compact('employees', 'organizations', 'positions', 'titles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->all());

        $employee->save();

        return redirect()->route('employees.index')
            ->with('success','Employee successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $cart = session()->get('cart', []);
        $cartDevices = [];
        $cartEmployees = [];

        if(isset($cart['devices'])){
            $cartDevices = $cart['devices'];
        }
        if(isset($cart['deviceHolders'])){
            $cartEmployees = $cart['deviceHolders'];
        }

        $devices = Device::whereHas('status', function ($query) {
            $query->where('name', '=', 'Storage');
        })->get();

         $assignedDeviceIds = History::select('device_id')
             ->where('employee_id', '=', $employee->id)
             ->where(function ($query) {
                 $query->where('received_date', '=', null)
                     ->orWhere('received_date', '=', '');
             })
            ->get();

        $assignedDevices = [];

         foreach ($assignedDeviceIds as $deviceId){
            $assignedDevice = Device::where('id', '=', $deviceId->device_id)->first();
             $assignedDevices[] = $assignedDevice;
        }

         $histories = History::where('employee_id', '=', $employee->id)->get();

        $titles = ['Employees', 'employee', 'employees', 'About'];

        return view('employees.show',compact('employee', 'devices', 'cartDevices', 'cartEmployees', 'assignedDevices', 'titles', 'histories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $organizations = Organization::all();
        $positions = Position::all();
        $titles = ['Employees', 'employee', 'employees', 'Edit'];

        return view('employees.edit',compact('employee', 'organizations', 'positions', 'titles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success','Employee successfully edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')
            ->with('success','Employee successfully deleted!');
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|Response
     */
    public function cart()
    {
        $cart = session()->get('cart', []);
        $cartDevices = [];
        $cartEmployees = [];

        if(isset($cart['devices'])){
            $cartDevices = $cart['devices'];
        }

        if(isset($cart['deviceHolders'])){
            $cartEmployees = $cart['deviceHolders'];
        }

        $titles = ['Boxes', 'box', 'boxes'];

        return view('cart', compact('cartDevices', 'cartEmployees', 'titles'));
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function addToCart(Request $request)
    {
        $deviceId = $request->device_id;

        $device = Device::findOrFail($deviceId);

        $cart = session()->get('cart', []);

        if(isset($cart['devices'][$deviceId])) {
            $result = 'The device exists in the box!';

        } else {
            $cart['devices'][$deviceId] = [
                "d_name" => $device->d_name->name ?? '',
                "manufacturer" => $device->d_model->manufacturer->name ?? '',
                "d_model" => $device->d_model->name ?? '',
                "serial_number" => $device->serial_number,
                "implementer_inventory" => $device->implementer_inventory,
                "sponsor_inventory" => $device->sponsor_inventory,
                "purpose" => $device->purpose->name ?? '',
                "location" => $device->location->address ?? '',
                "condition" => $device->condition->name ?? '',
                "notes" => $device->notes,
                "status" => $device->status->name
            ];

            session()->put('cart', $cart);

            $result = 'The device added to the box successfully!';

        }

        return response()->json(['success' => true, 'result' => $result]);
    }

    public function addEmployeeToCart(Request $request)
    {
        $employeeId = $request->employee_id;

        $employee = Employee::findOrFail($employeeId);

        $cart = session()->get('cart', []);

        if(isset($cart['deviceHolders'])) {
            $result = 'The device holder exists in the box!';
        }
        else {
            $cart['deviceHolders'][$employeeId] = [
                "first_name" => $employee->first_name,
                "last_name" => $employee->last_name,
                "surname" => $employee->surname,
                "organization" => $employee->organization->name ?? '',
                "position" => $employee->position->name ?? '',
                "phone_number" => $employee->phone_number,
                "username" => $employee->username,
                "email" => $employee->email
            ];

        session()->put('cart', $cart);

        $result = 'The employee successfully selected to accept equipment!';

    }

return response()->json(['success' => true, 'result' => $result]);
    }


    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart['devices'][$request->id])) {
                unset($cart['devices'][$request->id]);
                session()->put('cart', $cart);
            }

            session()->flash('success', 'Device removed from box successfully');
        }
    }

    public function removeEmployee(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart['deviceHolders'])) {
                unset($cart['deviceHolders']);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'The device holder removed from box successfully');
        }
    }

    public function clearBox()
    {
            $cart = session()->get('cart', []);
            if(isset($cart['devices'])) {
                unset($cart['devices']);
            }

        if(isset($cart['deviceHolders'])) {
            unset($cart['deviceHolders']);
        }
        session()->put('cart', $cart);

        return redirect()->route('cart')
            ->with('success','The box successfully cleared!');
    }

    /**
     * Write code on Method
     *
     * @return \Illuminate\Http\JsonResponse()
     */
    public function sendToStorage(Request $request)
    {
        try {


        $deviceId = $request->device_id;

        $device = Device::findOrFail($deviceId);

        $statusId = Status::select('id')
            ->where('name', '=', 'Storage')
            ->first();

        $device->status_id = $statusId->id;

        $device->save();

        $history = History::where('device_id', '=', $device->id)
            ->where('employee_id', '=', $request->employee_id)
            ->where(function ($query) {
                $query->where('received_date', '=', null)
                    ->orWhere('received_date', '=', '');
            })
            ->first();

        $history->received_date = Carbon::now()->toDateString();
        $history->save();

        $result = 'The device sent to storage!';
        } catch (Exception $ex){
            dd($ex->getMessage());
        }

        return response()->json(['success' => true, 'result' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CartRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cartStore(CartRequest $request)
    {
        $history =[
            'handovered_date' => $request->handovered_date,
            'received_date' => '',
            'device_id' => 0,
            'employee_id' => 0,
            'notes' => $request->notes
        ];

        $cart = session()->get('cart', []);

        if(isset($cart['deviceHolders'])){
            foreach($cart['deviceHolders'] as $employeeId => $fields){
                $history['employee_id'] = $employeeId;
            }
        }
        else{
            return redirect()->route('cart')
                ->with('error', 'The device holder is not set!');
        }

        if(isset($cart['devices'])){
            foreach($cart['devices'] as $deviceId => $fields){
                $inUse = History::where('received_date', '')
                    ->where('device_id', $deviceId)
                    ->get();

                if(!$inUse->isEmpty()){
                    $d_name = $fields['d_name'];
                    $manufacturer = $fields['manufacturer'];
                    $d_model = $fields['d_model'];
                    $serial_number = $fields['serial_number'];
                    $e_name = Employee::select('first_name', 'last_name')
                        ->where('id', $history['employee_id'])
                        ->first();

                    $first_name = $e_name->first_name;
                    $last_name = $e_name->last_name;

                    return redirect()->route('cart')
                        ->with('error', "The $manufacturer $d_model $serial_number $d_name is already in use by $first_name $last_name, please, return the device to the storage, then you can assign the device to another device holder!");
                }
                else{
                    $history['device_id'] = $deviceId;

                    History::create($history);

                    $device = Device::where('id', '=', $deviceId)->first();

                    $statusId = Status::select('id')
                    ->where('name', '=', 'Handovered')
                        ->first();

                    $device->status_id = $statusId->id;

                    $device->save();
                }
            }
        }
        else{
            return redirect()->route('cart')
                ->with('error', 'The devices are not chosen, please put devices to the Box!');
        }

        return redirect()->route('cart')
            ->with('success', 'The devices are successfully assigned to user!');
    }
}
