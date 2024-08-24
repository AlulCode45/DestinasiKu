<?php

namespace App\Repositories\Company;

use App\Interfaces\CompanyInterface;
use App\Models\DestinationCompany;

class CompanyRepository implements CompanyInterface
{
    private $model;
    function __construct(DestinationCompany $model)
    {
        $this->model = $model;
    }
    function getCompany()
    {
        return $this->model
            ->with('destinations')
            ->get();
    }
    function getCompanyById($company)
    {
        $company = $this->model
            ->with('destinations')
            ->find($company);
        return $company;
    }
    function createCompany($data)
    {
        $company = $this->model->create($data);
        return $company;
    }
    function updateCompany($company, $data)
    {
        $company = $this->model->findOrFail($company);
        $company->update($data);
        return $company;
    }
    function deleteCompany($company)
    {
        $company = $this->model->findOrFail($company);
        $company->delete();
        return $company;
    }
}