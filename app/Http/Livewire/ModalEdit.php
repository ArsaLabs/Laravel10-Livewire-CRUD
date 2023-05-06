<?php

namespace App\Http\Livewire;

use App\Models\CustomerModels;
use Livewire\Component;

class ModalEdit extends Component
{
    public $name, $custId, $show;

    protected $listeners = ['getCust'];

    protected $rules = [
        'custId' => 'required',
        'name' => 'required|min:6|max:50'
    ];

    // public function mount($id) {
    //     $this->custId = $id;
    //     $this->show = false;
    // }

    public function showModal($id) {
        $this->custId = $id;

        $this->doShow();
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }

    public function getCust(CustomerModels $customer)
    {
        //dd($customer);
        $this->name = $customer->name;
        $this->custId = $customer->id;
        $this->doShow();
    }

    public function update()
    {
        $data = $this->validate();

        //dd($data);

        if ($data) {
            $customer = CustomerModels::find($this->custId);
            $customer->update([
                'name' => $this->name
            ]);
        }

        
        //kosongkan inputan
        $this->name = null;
        
        $this->doClose();

        $this->emit('resync');
    }
    
    public function render()
    {
        return view('livewire.modal-edit', ['name', 'custId']);
    }
}
