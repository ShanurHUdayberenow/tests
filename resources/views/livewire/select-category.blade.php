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
    <div class="form-group">
        <label for="subsubcategory-select">Subsubkategoriýa</label>
        <select class="form-control" wire:model="subsubcatId" name="subsubcategoryId" id="subsubcategory-select">
            <option selected value> </option>
            @foreach($dataSubsubcat as $item)
                <option value="{{$item['id']}}">{{$item['name_tm']}}</option>
            @endforeach
        </select>
    </div>
</div>
