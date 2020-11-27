<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class HomeController extends Controller
{   
    private $employee;
    private $company;

    public function __construct(Employee $employee, Company $company) {
        $this->employee = $employee;
        $this->company = $company;
    }

    public function index() {
        $companies = $this->company->withCount('employees')->paginate(10);
        return view('client.pages.index', compact('companies'));
    }

    public function companyInner($id, $slug) {
        $company = $this->company->findOrFail($id);
        $employees = $this->employee->where('company_id', $id)->paginate(10);
        return view('client.pages.company_inner', compact('company', 'employees'));
    }

    public function employeeInner($id, $slug) {
        $employee = $this->employee->with('company')->findOrFail($id);
        return view('client.pages.employee_inner', compact('employee'));
    }
}
