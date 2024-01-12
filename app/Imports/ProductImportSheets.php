<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductImportSheets implements WithMultipleSheets
{

    /**
     * @inheritDoc
     */
    public function sheets(): array
    {
        return [
            // 0 => new CategoryImport(),
            // 1 => new SubcategoryImport(),
            // 2 => new SubsubcategoryImport(),
            // 3 => new AttributeImport(),
            // 4 => new UnitImport(),
            0 => new ProductImport()
        ];
    }
}
