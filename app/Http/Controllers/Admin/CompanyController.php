<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Traits\SafeResponse;
use App\Http\Traits\Helper;
use App\Events\File;

use App\Http\Requests\CompanyStoreRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Models\Company;

class CompanyController extends Controller
{
    use SafeResponse, Helper;

    private $company;
    
    public function __construct( Company $company ) {
        $this->company = $company;
    }

    public function index(Request $request) {
        $companies = $this->company->withCount('employees')->paginate(10);
        return view('admin.pages.company.index', compact('companies'));
    }

    
    public function create(Request $request) {
        return view('admin.pages.company.create');
    }
    
    public function edit(Request $request, $id) {
        $company = $this->company->findOrFail($id);
        return view('admin.pages.company.edit', compact('company'));
    }

    public function store(CompanyStoreRequest $request) {
        try{
            $data = $request->all();

            if(file_exists($data['logo'])) {
                $data['logo'] = event(new File($data['logo'], 'storage/company_logos/'))[0];
            }

            $company = $this->company->create($data);

            return redirect()->route('company.index')->with('success','Company successfully created');
        } catch (\Throwable $e) {
            return back()->with('error','Failed to create Company');
        }
    }

    public function update(CompanyUpdateRequest $request, $id) {
        try{
            $data = $request->all();
            $company = $this->company->findOrFail($id);

            if( isset($data['logo']) && file_exists($data['logo'])){
                $this->deleteFile('storage/company_logos/', $company->logo);
                $data['logo'] = event(new File($data['logo'],'storage/company_logos/'))[0];
            }

            $company->update($data);

            return back()->with('success','Company successfully updated');
        } catch (\Throwable $e) {
            return back()->with('error','Failed to update Company');   
        }
    }

    public function delete(Request $request, $id) {
        $messages = [
            'success' => "Company deleted succesfuly",
            'error' => "Failed to delete Company"
        ];
 
        return $this->safeResponse(function() use ($id) {
            $company = $this->company->withCount('employees')->findOrFail($id);
            if($company->employees_count) {
                return [ "type" => 422, "errors" => ['The company has employees, remove them first.'] ];
            }
            
            $this->deleteFile('storage/company_logos/', $company->logo);
            $company->delete();
            return [ "type" => 200, "errors" => []];
        }, $messages);
    }
}
