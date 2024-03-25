<?php

namespace App\Exports;

use App\Models\EmployeeJob;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Maatwebsite\Excel\Concerns\WithMapping;
// use Maatwebsite\Excel\Concerns\WithHeadings;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Hash;
use Request;

class JobsExport implements FromCollection,  WithHeadings
{
    public function collection(){
        $request = Request::all();
    return EmployeeJob::getRecord($request);
    }

    protected $index = 0;

    public function map($user):array{
        $createdAtFormat = date('d-m-Y', strtotime($user->created_at));
        return [
            ++$this->index,
            $user->id,
            $user->job_title,
            $user->min_salary,
            $user->max_salary,
            $createdAtFormat
        ];
    }

    public function headings():array{
        return [
            'S.No',
            'Id',
            'Job Title',
            'Min Salary',
            'Max Salary',
            'Created Date'
        ];
    }

}
