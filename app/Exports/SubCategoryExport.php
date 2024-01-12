<?php

namespace App\Exports;

use App\Models\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class SubCategoryExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subcategory::all();
    }

    public function headings(): array
    {
        return [
            'Kategoriya',
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
            $row->category->name_tm,
            $row->name_tm,
            $row->name_ru,
            $row->name_en,
            $row->slug,
        ];
    }
}
