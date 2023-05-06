<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CategoryTrx;

class ModalEditCatTrx extends Component
{
    public $name, $status, $trxId, $show;

    protected $listeners = ['edittrx'];

    protected $rules = [
        'trxId' => 'required',
        'name' => 'required|min:6|max:50',
        'status' => 'required'
    ];

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

    public function edittrx(CategoryTrx $category)
    {
        //dd($category);
        $this->name = $category->name;
        $this->trxId = $category->id;
        $this->status = $category->status;
        $this->doShow();
    }

    public function update()
    {
        $data = $this->validate();

        //dd($data);

        if ($data) {
            $customer = CategoryTrx::find($this->trxId);
            $customer->update([
                'name' => $this->name,
                'status' =>$this->status
            ]);
        }

        
        //kosongkan inputan
        $this->name = null;
        
        $this->doClose();

        $this->emit('resync');
    }

    public function render()
    {
        return view('livewire.modal-edit-cat-trx', ['name', 'trxId','status']);
    }
}
