<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\SafeResponse;
use App\Http\Traits\Helper;
use App\Events\File;

use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Models\Employee;
use App\Models\Company;

class EmployeeController extends Controller {

    use SafeResponse, Helper;

    private $employee;
    private $company;

    public function __construct( Employee $employee, Company $company ) {
        $this->employee = $employee;
        $this->company = $company;
    }

    public function index(Request $request) {
        $employees = $this->employee->with('company')->paginate(10);
        return view('admin.pages.employee.index', compact('employees'));
    }
    
    public function create(Request $request) {
        $companies =  $this->company->get();
        return view('admin.pages.employee.create', compact('companies'));
    }
    
    public function edit(Request $request, $id) {
        $employee = $this->employee->findOrFail($id);
        $companies =  $this->company->get();
        return view('admin.pages.employee.edit', compact('employee', 'companies'));
    }

    public function store(EmployeeStoreRequest $request) {
        try{
            $data = $request->all();

            if(file_exists($data['image'])) {
                $data['image'] = event(new File($data['image'], 'storage/employee_images/'))[0];
            }

            $employee = $this->employee->create($data);

            return redirect()->route('employee.index')->with('success','Employee successfully created');
        } catch (\Throwable $e) {
            return back()->with('error','Failed to create Employee');
        }
    }

    public function update(EmployeeUpdateRequest $request, $id) {
        try{

            $data = $request->all();
            $employee = $this->employee->findOrFail($id);

            if( isset($data['image']) && file_exists($data['image'])){
                $this->deleteFile('storage/employee_images/', $employee->image);
                $data['image'] = event(new File($data['image'],'storage/employee_images/'))[0];
            }

            $employee->update($data);

            return back()->with('success','Employee successfully updated');
        } catch (\Throwable $e) {
            return back()->with('error','Failed to update Employee');   
        }
    }

    public function delete(Request $request, $id) {
        $messages = [
            'success' => "Employee deleted succesfuly",
            'error' => "Failed to delete Employee"
        ];
 
        return $this->safeResponse(function() use ($id) {
            
            $employee = $this->employee->findOrFail($id);
            $this->deleteFile('storage/employee_images/', $employee->image);
            $employee->delete();
            
            return [ "type" => 200, "errors" => []];
        }, $messages);
    }
}
