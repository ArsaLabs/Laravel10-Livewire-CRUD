<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoryTrx;

class ModalDeleteCatTrx extends Component
{
    public $name, $trxId, $status, $show;

    protected $listeners = ['deletetrx'];

    public function showModal($id) {
        $this->trxId = $id;

        $this->doShow();
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function deletetrx(CategoryTrx $category)
    {
        //dd($customer);
        $this->name = $category->name;
        $this->trxId = $category->id;        
        $this->doShow();
    }

    public function delete()
    {
        if ($this->trxId) {
            CategoryTrx::destroy($this->trxId);
        }

        
        //kosongkan inputan
        $this->name = null;
        
        $this->doClose();
        
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.modal-delete-cat-trx', ['name', 'trxId']);
    } 
}
