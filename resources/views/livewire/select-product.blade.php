<div>

    <div class="form-group">
        <label for="category-select">Kategoriýa</label>
        <select class="form-control" wire:model="catId" name="categoryId" id="category-select">
            <option selected value> </option>
            @foreach(\App\Models\Category::all() as $category)
                <option value="{{$category['id']}}"

                >{{$category['name_tm']}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="subcategory-select">Subkategoriýa</label>
        <select class="form-control" wire:model="subcatId" name="subcategoryId" id="subcategory-select">
            <option selected value> </option>
            @foreach($dataSubcat as $subcategory)
                <option value="{{$subcategory['id']}}"

                >{{$subcategory['name_tm']}}</option>
            @endforeach
        </select>
    </div>
    {{-- <div class="form-group">
        <label for="subsubcategory-select">Subsubkategoriýa</label>
        <select class="form-control" wire:model="subsubcatId" name="subsubcategoryId" id="subsubcategory-select">
            <option selected value> </option>
            @foreach($dataSubsubcat as $item)
                <option value="{{$item['id']}}">{{$item['name_tm']}}</option>
            @endforeach
        </select>
    </div> --}}
    {{-- <div class="form-group"><label for=select-language>Wariasiýa</label> <select name="variationId" id="variation-select">
            <option disabled selected value> </option>
            @foreach($dataVariation as $variation)
                <option value="{{$variation['id']}}"
                    @if ($variationId == $variation->id)
                        selected
                    @endif
                >{{$variation['name_tm']}}</option>
            @endforeach
        </select>
    </div> --}}

    {{-- <div class="form-group">
        <label>
            Spesifikasiýa
        </label>

        @foreach($dataAttributes as $attribute)
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text">{{$attribute['name_tm']}}</span>
                </div>
                <select class="form-control" name="attribute-{{$attribute->id}}">

                    <option selected value> </option>

                    @foreach($attribute->values as $value)
                        <option value="{{$value['id']}}"

                        @if (array_key_exists($attribute->id, $dataValues))
                            @if ($dataValues[$attribute->id] == $value['id'])
                                selected
                            @endif
                        @endif

                        >{{$value['value_tm']}}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
    </div> --}}

</div>


