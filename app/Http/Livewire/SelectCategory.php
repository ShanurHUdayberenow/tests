<?php

namespace App\Http\Livewire;

use App\Models\Attribute;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Livewire\Component;

class SelectCategory extends Component
{
    public $dataSubsubcat = [];
    public $dataSubcat = [];
    public $catId;
    public $subcatId;
    public $subsubcatId;
    public function mount($data = null) {
        if ($data) {
            $this->catId = $data->categoryId;
            $this->subcatId = $data->subcategoryId;
            $this->subsubcatId = $data->subsubcategoryId;
        }
    }
    public function render()
    {
        $this->dataSubcat = Subcategory::where('categoryId', $this->catId)->get();
        $this->dataSubsubcat = Subsubcategory::where('subcategoryId', $this->subcatId)->get();
        return view('livewire.select-category');
    }
}
