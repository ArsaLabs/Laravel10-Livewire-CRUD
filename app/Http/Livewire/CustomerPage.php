<?php

namespace App\Http\Livewire;

use App\Models\CustomerModels;
use Livewire\Component;
use Livewire\WithPagination;

class CustomerPage extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $cari;

    //validation rules
    protected $rules = [
        'name' => 'required|min:6|max:50'
    ];

    protected $listeners = ['refresh', 'resync'];

    public function simpan()
    {
        //validasi inputan
        $data = $this->validate();

        $mix_data = [
            'name' => $data['name'],
            'point' => 0
        ];

        //simpan data inputan yg sdh divalidasi
        CustomerModels::create($mix_data);

        //bikin alert kalo proses berhasil
        session()->flash('message', ' Customer '. $this->name  .' berhasil dibuat!');

        //kosongkan inputan
        $this->name = null;

    }

    public function refresh()
    {
        //bikin alert kalo proses berhasil
        session()->flash('message', ' Data Customer berhasil dihapus!');

        //kosongkan inputan
        $this->name = null;
    }

    public function resync()
    {
        //bikin alert kalo proses berhasil
        session()->flash('message', ' Data Customer berhasil diupdate!');

        //kosongkan inputan
        $this->name = null;
    }

    public function getcustomer($id)
    {
              
        $getCust = CustomerModels::find($id);

        $this->emit('getCust', $getCust);
    }
    
    public function render()
    {
        return view('livewire.customer-page', [
            'customers' => CustomerModels::paginate(5)
        ]);
    }
}
