<?php

namespace App\Interfaces;

interface CompanyInterface
{
    function getCompany();
    function getCompanyById($company);
    function createCompany($data);
    function updateCompany($company, $data);
    function deleteCompany($company);
}