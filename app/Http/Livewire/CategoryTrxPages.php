<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CategoryTrx;

class CategoryTrxPages extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $status, $trxId;

    protected $rules = [
        'name' => 'required|min:6|max:50',
        'status' => 'required'
    ];

    protected $listeners = ['refresh','resync'];

    public function simpan()
    {
        //validasi inputan
        $data = $this->validate();
        
        //simpan data inputan yg sdh divalidasi
        CategoryTrx::create($data);

        //bikin alert kalo proses berhasil
        session()->flash('message', ' Data Transaksi '. $this->name  .' berhasil dibuat!');

        //kosongkan inputan
        $this->name = null;

    }

    public function refresh()
    {
        //bikin alert kalo proses berhasil
        session()->flash('message', ' Data Kategori Transaksi berhasil dihapus!');

        //kosongkan inputan
        $this->name = null;
    }

    public function resync()
    {
        //bikin alert kalo proses berhasil
        session()->flash('message', ' Data Kategori Transaksi berhasil diupdate!');

        //kosongkan inputan
        $this->name = null;
    }

    public function render()
    {
        return view('livewire.category-trx-pages', [
            'categories' => CategoryTrx::paginate(5)
        ]);
    }
}
