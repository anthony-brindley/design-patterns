<?php

namespace App\Domain\Behavioral\Visitor;
use App\Domain\Behavioral\Visitor\Contracts\Visitor;

class ReportingVisitor implements Visitor
{
    public function visitCompany(Company $company): array
    {
        $output = [];
        $total = 0;

        foreach ($company->getDepartments() as $department) {
            $total += $department->getCost();
            $output[$company->getName()]['departments'][] = $this->visitDepartment($department);
        }

        $output[$company->getName()]['cost'] = $total;

        return $output;
    }

    public function visitDepartment(Department $department): array
    {
        $output = [];

        foreach ($department->getEmployees() as $employee) {
            $output[$department->getName()]['employees'][] = $this->visitEmployee($employee);
        }

        $output[$department->getName()]['cost'] = $department->getCost();

        return $output;
    }

    public function visitEmployee(Employee $employee): array
    {
        return [
            'name'      => $employee->getName(),
            'position'  => $employee->getPosition(),
            'salary'    => $employee->getSalary()
        ];
    }
}
