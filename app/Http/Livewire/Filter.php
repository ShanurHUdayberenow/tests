<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Filter extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $total = 10;
    public $data;
    public $columns;
    public $export;
    public $searchColumns;
    public $currentPage = 1;
    public $name;
    public $category;
    public $import;
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function mount($data, $columns, $searchColumns, $name, $export, $import, $category)
    {
        $this->export = $export;
        $this->import = $import;
        $this->data = $data;
        $this->name = $name;
        $this->category = $category;
        $this->searchColumns = $searchColumns;
        $this->columns = $columns;
    }

    public function render()
    {

        $query = '%'.$this->searchTerm.'%';
        $model = $this->data->query();
        foreach ($this->searchColumns as $key => $column) {
            if ($key == 0)
                $model->where($column, 'like', $query);
            else
                $model->orWhere($column, 'like', $query);
        }
        return view('livewire.filter', [
//            'dataList' => $this->data->where(function ($query) {
//                $query->orWhere($this->searchColumns, 'like', $query);
//            })->paginate($this->total),
            'dataList' => $model->orderBy('created_at', 'desc')->paginate($this->total),
            'columns'  => $this->columns
        ]);
    }

    public function setPage($url)
    {
        $this->currentPage = explode('page=', $url)[1];
        Paginator::currentPageResolver(function(){
            return $this->currentPage;
        });
        $this->render();
    }


}
