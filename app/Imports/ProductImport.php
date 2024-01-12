<?php

namespace App\Imports;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use App\Models\Unit;
use App\Models\VariationGroup;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel, WithHeadingRow, WithValidation
{

    /**
     * @inheritDoc
     */
    public function model(array $row): array
    {
    //    dd($row);

        $product = Product::updateOrCreate(
            [
                'slug' => $row['name_tm']
            ],
            [
            'categoryId'     => $row['category_id'],
            'subcategoryId'     => $row['subcategory_id'],
            'brandId'        => $row['brand_id'],
            'name_tm'        => $row['name_tm'       ],
            'name_ru'        => $row['name_ru'       ],
            'name_en'        => $row['name_en'       ],
            'code' => $row['code'],
            'price' => $row['price'],
            'isNew_tm' => $row['is_new_tm'],
            'isNew_ru' => $row['is_new_ru'],
            'isNew_en' => $row['is_new_en'],
            'description_tm'        => $row['description_tm'],
            'description_ru'        => $row['description_ru'],
            'description_en'        => $row['description_en'],
            'quantity' => $row['quantity'],
            'guestPrice' => $row['guest_price'],
            'guestDiscount' => $row['guest_discount'],
            'price_usd' => $row['price_usd'],
            'specificprice_tm' => $row['specificprice_tm'],
            'specificprice_usd' => $row['specificprice_usd'],
        ]);

        return [$product];
    }

    /**
     * @inheritDoc
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required',
            'name_tm' => 'required',
            'name_ru' => 'required',
            'name_en' => 'required',
            'description_tm' => 'required',
            'description_ru' => 'required',
            'description_en' => 'required',
            'price' => 'required',
            'code' => 'required',
            'quantity' => 'required',
            'guest_price' => 'required',
        ];
    }
}
