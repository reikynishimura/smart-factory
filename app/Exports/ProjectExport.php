<?php

namespace App\Exports;

use App\Models\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Project::select('project_code', 'status_id', 'material', 'project_description', 'start_date', 'finish_date', 'qty')->get();
    }

    public function headings(): array
    {
        return [
            'Project Code',
            'Status',
            'Material',
            'Project Description',
            'Start Date',
            'Finish Date',
            'Qty',
        ];
    }
}


