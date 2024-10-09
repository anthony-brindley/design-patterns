<?php

namespace App\Domain\Behavioral\Visitor;

use App\Domain\Behavioral\Visitor\Company;
use App\Domain\Behavioral\Visitor\Department;
use App\Domain\Behavioral\Visitor\Employee;

class ClientCode
{
    public function runCode(): array
    {
        // Setup demo company departments
        $mobileDev = new Department("Mobile Development", [
            new Employee("Albert Falmore", "designer", 100000),
            new Employee("Ali Halabay", "programmer", 100000),
            new Employee("Sarah Konor", "programmer", 90000),
            new Employee("Monica Ronaldino", "QA engineer", 31000),
            new Employee("James Smith", "QA engineer", 30000),
        ]);

        $techSupport = new Department("Tech Support", [
            new Employee("Larry Ulbrecht", "supervisor", 70000),
            new Employee("Elton Pale", "operator", 30000),
            new Employee("Rajeet Kumar", "operator", 30000),
            new Employee("John Burnovsky", "operator", 34000),
            new Employee("Sergey Korolev", "operator", 35000),
        ]);
        
        $company = new Company("SuperStarDevelopment", [$mobileDev, $techSupport]);

        return $company->accept(new ReportingVisitor);
    }
}
