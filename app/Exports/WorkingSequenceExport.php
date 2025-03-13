<?php

namespace App\Exports;

use App\Models\WorkingSequence;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WorkingSequenceExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return WorkingSequence::select('working_sequence_code', 'person_required', 'multiwi_id', 'process_code', 'process_name', 'work_center_code', 'work_center_name')->get();
    }

    public function headings(): array
    {
        return [
            'Working Sequence Code',
            'Person Required',
            'Multi WI',
            'Process Code',
            'Process Name',
            'Work Center Code',
            'Work Center Name',
        ];
    }
}


