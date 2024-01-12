<?php

namespace App\Exports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BrandExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Brand::all();
    }

    public function headings(): array
    {
        return [
            'Ady tm',
            'Ady Ru',
            'Ady En',
            'Slug',
        ];
    }

    /**
     * @inheritDoc
     */
    public function map($row): array
    {
        return [
            $row->name_tm,
            $row->name_ru,
            $row->name_en,
            $row->slug,
        ];
    }
}
