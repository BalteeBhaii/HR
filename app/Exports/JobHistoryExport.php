<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Hash;
use Request;
use App\Models\JobHistory;

class JobHistoryExport implements FromCollection , withHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $request = Request::all();
        return JobHistory::getRecord($request);

    }

    protected $index = 0;

    public function map($user):array{
        $startDate = date('d-m-Y',strtotime($user->start_date));
        $endDate = date('d-m-Y',strtotime($user->end_date));
        $createdFormat = date('d-m-Y', strtotime($user->created_at));

        if($user->department_id == 0){
            $department = 'Developer department';
        }else{
            $department = 'App developer';
        }

        return [
            $user->id,
            $user->name,
            $startDate,
            $endDate,
            $user->job_title,
            $department,
            $createdFormat
        ];
    }

    public function headings():array{
        return [
            'Table ID',
            'Employee Name',
            'Start Date',
            'End Date',
            'Job title',
            'Department ID',
            'Created At'
        ];
    }
}
