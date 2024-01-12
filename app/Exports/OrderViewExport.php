<?php

namespace App\Exports;
use App\Models\OrderLines;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
class OrderViewExport implements FromCollection, WithHeadings, WithMapping
{
    use Exportable;

 
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $url = \Illuminate\Support\Facades\Request::url();
        $output = (int)filter_var($url, FILTER_SANITIZE_NUMBER_INT);
        return OrderLines::where('orderId',$output)->get();
    }

    public function headings(): array
    {
        return [
            'Ulanyjy ady',
            'Ulanyjy familiyasy',
            'Ulanyjy telefon belgisi',
            'Ulanyjy salgysy',
            'Haryt ady',
            'Haryt kody',
            'Haryt bahasy',
            'Haryt sany',
            'Haryt bahasy',
        ];
    }

    public function map($row): array
    {
        return [
            $row->order->name,
            $row->order->surname,
            $row->order->phoneNumber,
            $row->order->address,
            $row->product->name_tm,
            $row->product->code,
            $row->product->price,
            $row->quantity,
            $row->price * $row->quantity,
        ];
        
    }
}
