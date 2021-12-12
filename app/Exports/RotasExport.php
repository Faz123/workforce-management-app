<?php

namespace App\Exports;

use App\Models\Rota;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RotasExport implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(string $date)
    {
        $this->date = $date;
    }

    public function headings(): array
    {
        return [
            'id',
            'created_at',
            'updated_at',
            'week_number',
            'week_ending',
            'shift_type',
            'shift_day',
            'duties',
            'start_time',
            'end_time',
            'holiday_approved',
            'holiday_requested',
            'store_code',
            'user_id'
        ];
    }

    public function query()
    {
        return Rota::query()->where('week_ending', $this->date);
    }
}
