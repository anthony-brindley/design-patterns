<?php

namespace App\Domain\Behavioral\Visitor\Contracts;

use App\Domain\Behavioral\Visitor\Company;
use App\Domain\Behavioral\Visitor\Department;
use App\Domain\Behavioral\Visitor\Employee;

interface Visitor
{
    public function visitCompany(Company $company): array;
    public function visitDepartment(Department $department): array;
    public function visitEmployee(Employee $employee): array;
    
}
