{{--<div>--}}

{{--    @foreach($steps as $key => $step)--}}
{{--        <div class="repeatable-block" wire:key="{{$key}}">--}}
{{--            <button type="button" class="btn repeatable-remove" wire:click="remove({{$key}})"><i class="ti-close"></i></button>--}}
{{--            <div class="form-group" style="padding: 0 2rem">--}}
{{--                <label>{{$field['label']}}</label>--}}
{{--                <input class="form-control" type="text" value="<?php echo count($items) > $loop->index ? $items[$loop->index] : '';?>" name="{{$field['name']}}[]">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
{{--    <button type="button" class="btn btn-primary mt-3" wire:click="increment()">Add {{$field['label']}}</button>--}}
{{--</div>--}}
<div>
    <?php

    ?>
    <input type="hidden" name="{{$field['name']}}" id="{{$field['name']}}-repeatable-input" value="{{json_encode($items)}}">
    @foreach($steps as $key => $step)
        <div class="repeatable-block" wire:key="{{$key}}">
            <button type="button" class="btn repeatable-remove" wire:click="remove({{$key}})"><i class="ti-close"></i></button>

            <div class="row">
                @foreach($field['fields'] as $item)
                    <div class="form-group col-6" style="padding: 0 2rem">
                        <label>{{$item['label']}}</label>
                        <input class="form-control" type="text" wire:model="items.{{$key}}.{{$item['name']}}">
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
    <button type="button" class="btn btn-primary mt-3" wire:click="increment()">Add {{$field['label']}}</button>
</div>
<style>
    .repeatable-block {
        width: 100%;
        border: 1px solid rgba(170, 170, 170, .3);
        border-radius: .5rem;
        margin-top: 1rem;
        background-color: #f3f8fb;
        padding: .5rem;
    }
    .repeatable-remove {
        z-index: 2;
        position: absolute !important;
        margin-left: -24px;
        margin-top: 0px;
        height: 30px;
        width: 30px;
        border-radius: 15px;
        text-align: center;
        background-color: #e8ebf0 !important;
        padding: 0;
        opacity: 0.7;
    }
    .repeatable-remove:hover {
        opacity: 1;
    }
</style>

