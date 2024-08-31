<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Interfaces\CompanyInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    private $companyRepository;
    function __construct(CompanyInterface $companyInterface)
    {
        $this->companyRepository = $companyInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'companies' => $this->companyRepository->getCompany(),
        ];
        return view('dashboard.vendor-destinations.vendor-destination', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyRequest $request)
    {
        $request->validate([
            'name' => 'unique:destination_companies,name'
        ], [
            'name.unique' => 'Company name already exists'
        ]);
        $this->companyRepository->createCompany($request->all());
        return redirect()->route('vendor.index')->with('success', 'Company created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = $this->companyRepository->getCompanyById($id);
        if (!$data) {
            return redirect()->route('vendor.index')->with('error', 'Company not found');
        }
        $data = [
            'company' => $data,
        ];
        return view('dashboard.vendor-destinations.vendor-destination-edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyRequest $request, string $id)
    {
        $request->validate([
            'name' => 'unique:destination_companies,name'
        ], [
            'name.unique' => 'Company name already exists'
        ]);
        $this->companyRepository->updateCompany($id, $request->all());
        return redirect()->route('vendor.index')->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->companyRepository->getCompanyById($id)) {
            return redirect()->route('vendor.index')->with('error', 'Company not found');
        }
        if ($this->companyRepository->getCompanyById($id)->destinations != null) {
            return redirect()->route('vendor.index')->with('error', 'Company cannot be deleted because it has destinations');
        }
        if ($this->companyRepository->deleteCompany($id)) {
            return redirect()->route('vendor.index')->with('success', 'Company deleted successfully');
        } else {
            return redirect()->route('vendor.index')->with('error', 'Company could not be deleted');
        }
    }
}