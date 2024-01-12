<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Livewire\Component;

class SelectProduct extends Component
{

    public $dataSubcat = [];
    public $dataSubsubcat = [];
    public $catId;
    public $subcatId;
    public $dataVariation = [];
    public $subsubcatId;
    public $dataAttributes = [];
    public $dataValues = [];
    public $variationId;
    public function mount($data = null) {

        if ($data) {
            $this->catId = $data->categoryId;
            $this->subcatId = $data->subcategoryId;
            $this->subsubcatId = $data->subsubcategoryId;
            if ($data->variationGroup)
                $this->variationId = $data->variationGroup->products()->first()->id;
            $this->dataValues = $data->specifications()->pluck('attributeValueId', 'attributeId')->toArray();

        }
    }
    public function render()
    {
        if ($this->subsubcatId) {
            $this->dataVariation = Product::where('subsubcategoryId', $this->subsubcatId)->get();
            $this->dataAttributes = Attribute::where('subsubcategoryId', $this->subsubcatId)->get();
        } else if ($this->subcatId) {
            if (Subcategory::find($this->subcatId)->subsubcategories->count() == 0) {
                $this->dataVariation = Product::where('subcategoryId', $this->subcatId)->get();
                $this->dataAttributes = Attribute::where('subcategoryId', $this->subcatId)->get();
            }
        } else if ($this->catId){
            if (Category::find($this->catId)->subcategories->count() == 0) {
                $this->dataVariation = Product::where('categoryId', $this->catId)->get();
                $this->dataAttributes = Attribute::where('categoryId', $this->catId)->get();
            }
        }
        $this->dataSubcat = Subcategory::where('categoryId', $this->catId)->get();
        $this->dataSubsubcat = Subsubcategory::where('subcategoryId', $this->subcatId)->get();
        $this->dispatchBrowserEvent('contentChanged');
        return view('livewire.select-product');
    }

}
