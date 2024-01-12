<div>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <div class="d-inline-block">
                @if(\Illuminate\Support\Facades\Route::has($name.'.create'))
                <button onclick="location.href='{{route($name.'.create')}}'"
                    class="btn btn-custom mr-3">{{trans('message.add', ['name' => trans('message.'.$name, [])])}}</button>
                @endif
                @if($export != null)
                <button onclick="location.href='{{route($export)}}'" class="btn btn-custom mr-3"
                    style="background-color: #1F7246; border-color: #1F7246"> <i
                        class="ti-export mr-2"></i>{{trans('message.export')}}</button>
                @endif
                @if($import != null)
                <button class="btn btn-custom mr-3" data-toggle="modal" data-target="#importModal"
                    style="background-color: #1F7246; border-color: #1F7246"> <i
                        class="ti-import mr-2"></i>{{trans('message.import')}}</button>
                @endif
                @if($import != null)
                <button class="btn btn-custom mr-3" data-toggle="modal" data-target=".bd-example-modal-lg"
                    style="background-color: gray; border-color: gray"> <i class="ti-desktop mr-2"></i>Example
                    Import</button>
                @endif
                @if($category != null)
                <button class="btn btn-custom mr-3" data-toggle="modal" data-target=".bd-example-modal-lg"
                    style="background-color: gray; border-color: gray"> <i class="ti-desktop mr-2"></i>Example
                    Upload Image</button>
                @endif
            </div>
            <div class="dataTables_length d-inline-block" id="dataTable_length" style="float: none">
                <label>
                    {!! trans('message.show_entries', ['dropdown' => '<select wire:model="total" id="entries-select"
                        name="dataTable_length" aria-controls="dataTable"
                        class="custom-select custom-select-sm form-control form-control-sm">
                        <option value="10"><a>10</a></option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>']) !!}

                </label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <div id="dataTable_filter" class="dataTables_filter"><label>{{trans('message.search', [])}}:<input
                        type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"
                        wire:model="searchTerm"></label>
            </div>
        </div>
    </div>


    @if($import != null)
    <div class="col-lg-6 mt-5">
        <div class="card">
            <div class="modal fade" id="importModal">
                <div class="modal-dialog">
                    <form action="{{route($import)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{trans('message.import')}}</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <input name="importFile" class="form-control" type="file"
                                        accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary">{{trans('message.submit', [])}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($import != null)
    <div class="modal fade bd-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Example Excel Import</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="table_data">
                                <div class="container">
                                    <img src="\storage/images/import-examples.png">
                                </div><br><br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($category != null)
    <div class="modal fade bd-example-modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kategoriýa suratyny goşmak barada</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">

                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div id="table_data">
                                <div class="container">
                                    <p>Kategoriýa suraty goşulanda kompýuteriň (ctrl) <img src="{{('../storage/images/ctrl.jpg')}}" width="10%"> düwmesine basyp suratlary saýlamaly suratlar ikiden az ýa-da ikiden köp goşulmaly däl !</p>
                                </div><br><br>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-sm-12">
            <table id="datatable" class="text-center dataTable no-footer dtr-inline" role="grid"
                aria-describedby="dataTable_info">
                <thead class="bg-light text-capitalize">
                    <tr role="row">
                        @foreach($columns as $column)
                        <th tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1">
                            {{$column['label']}}
                        </th>
                        @endforeach
                        <th>{{trans('message.actions')}}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($dataList as $item)
                    <tr>
                        @foreach($columns as $column)
                        @include('columns.'.$column['type'], ['column' => $column, 'data_item' => $item])
                        @endforeach
                        <td>
                            @if(\Illuminate\Support\Facades\Route::has($name.'.show'))
                            <span class="action" onclick="location.href='{{route($name.'.show', $item)}}'"><i
                                    class="m-1 ti-eye"></i>{{trans('message.preview', [])}}</span>
                            @endif
                            @if(\Illuminate\Support\Facades\Route::has($name.'.edit'))
                            <span class="action" onclick="location.href='{{route($name.'.edit', $item)}}'"><i
                                    class="m-1 ti-pencil-alt"></i>{{trans('message.edit', [])}}</span>
                            @endif
                            @if(\Illuminate\Support\Facades\Route::has($name.'.destroy'))
                            <span class="action delete" data-toggle="modal" data-id="{{$item->id}}"
                                data-target="#deleteConfirm"><i
                                    class="m-1 ti-trash"></i>{{trans('message.delete', [])}}</span>
                            @endif
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="single-table">
        <div class="table-responsive">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">

                {{trans('message.showing_entries', ['total' => $dataList->total()])}}
            </div>
        </div>
        <div class="col-sm-12 col-md-7 align-items-end align-content-end" style="text-align: right !important;">
            {{ $dataList->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>

</div>