<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use App\Models\Offer;
use App\Models\OfferLines;
class ProductOfferExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Offer::all();
    }

    public function headings(): array
    {
        return [
            'Müşderiniň Ady',
            'Müşderiniň telefon belgisi',
            'Müşderiniň elektron poçtasy',
            'Teklip soralan Harytlaryň bahasy',
            'Teklip soralan Harytlaryň mukdary',
            'Teklip soralan Harytlaryň kody',
        ];
    }

    /**
     * @inheritDoc
     */
    public function map($row): array
    {

            foreach($row->offer_lines as $item){
                $productId[] = $item->price;
                $productQty[] = $item->quantity;
                $productCode[] = $item->code;
            }
        return [
            $row->name,
            $row->phoneNumber,
            $row->email,
            $productId,
            $productQty,
            $productCode,
        ];
    }
}
