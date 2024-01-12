<div class="container">
    @if(session('errors'))
    <div class="alert alert-danger" style="padding: 1rem 2rem">
        <ul style="list-style-type: circle">
            @foreach($errors->all() as $error)
            <li style="font-size: 14px">{{$error}}</li>
            @endforeach
        </ul>
    </div>

    @endif

    <input type="text" id="search-products" class="form-control" placeholder="Start search">
    <table class="table table-condensed">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product name</th>
            </tr>
        </thead>


        <tbody id="dynamic-row">
            @foreach($searchs as $search)
            <tr>
                <td>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="checkbox[]" id="{{$search->id}}"
                            value="{{$search->id}}">
                        <label class="custom-control-label" for="{{$search->id}}">{{$search->id}}</label>
                    </div>
                </td>
                <td>{{$search->name_tm}}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $searchs->links() }}
</div>