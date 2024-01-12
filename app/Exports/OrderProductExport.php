<?php

namespace App\Exports;
use App\Models\Order;
use App\Models\OrderLines;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrderProductExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::all();
    }

    public function headings(): array
    {
        return [
            'Müşderiniň Ady',
            'Müşderiniň Familiýasy',
            'Müşderiniň telefon belgisi',
            'Müşderiniň elektron poçtasy',
            'Müşderiniň salgysy',
            'Müşderiniň goşmaça salgysy',
            'Sargyt edilen Harytlaryň bahasy',
            'Sargyt edilen Harytlaryň mukdary',
            'Sargyt edilen Harytlaryň kody'
        ];
    }

    /**
     * @inheritDoc
     */
    public function map($row): array
    {

            foreach($row->order_lines as $item){
                $productId[] = $item->price;
                $productQty[] = $item->quantity;
                $productCode[] = $item->code;
            }
        return [
            $row->name,
            $row->surname,
            $row->phoneNumber,
            $row->email,
            $row->address,
            $row->address2,
            $productId,
            $productQty,
            $productCode,
        ];
    }
}
