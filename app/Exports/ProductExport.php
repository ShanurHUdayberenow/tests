<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::all();
    }

    /**
     * @inheritDoc
     */
    public function headings(): array
    {
        return [
            'Kategoriýa',
            'Ady tm',
            'Bahasy',
            'Harydyň kody'
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
            $row->price,
            $row->code
        ];
    }
}
