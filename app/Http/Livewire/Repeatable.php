<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Repeatable extends Component
{
    public $field;
    public $steps = [];
    public $items = [];
    public $fields = [];
    public function mount($field, $data_items = []) {
        $this->field = $field;


        foreach ($field['fields'] as $item) {
            $this->fields[$item['name']] = '';
        }

        if (count($data_items) > 0) {
            foreach ($data_items as $key => $item) {

                array_push($this->items, $this->fields);

                foreach (array_keys($this->fields) as $subItem) {
                    $this->items[$key][$subItem] = $item[$subItem];
                }
            }

            for ($i = 0; $i < count($data_items); $i++) {
                $this->steps[$i] = $i;
            }
        }
    }
    public function render()
    {

        return view('livewire.repeatable', [
            'steps' => $this->steps
        ]);
    }
    public function increment()
    {
        $this->steps[] = count($this->steps);

        array_push($this->items, $this->fields);
    }

    public function remove($index)
    {
        unset($this->steps[$index]);
        unset($this->items[$index]);
    }
}
