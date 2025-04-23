<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class UserExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting
{
    public function collection()
    {
        return User::select('nip', 'name', 'email', 'plant_id', 'id_cards', 'role_id')->get();
    }

    public function headings(): array
    {
        return [
            'NIP',
            'Name',
            'Email',
            'Plant',
            'ID Card',
            'Role',
        ];
    }

    public function map($user): array
    {
        return [
            "'".$user->nip,
            $user->name,
            $user->email,
            optional($user->plant)->name,
            $user->id_cards,
            optional($user->role)->name,
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT, // Kolom A adalah NIP
        ];
    }
}
