<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CustomerModels;

class ModalDelete extends Component
{
    public $name, $custId, $show;

    protected $listeners = ['deleteCust'];

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

    public function deleteCust(CustomerModels $customer)
    {
        //dd($customer);
        $this->name = $customer->name;
        $this->custId = $customer->id;        
        $this->doShow();
    }

    public function delete()
    {
        if ($this->custId) {
            CustomerModels::destroy($this->custId);
        }

        
        //kosongkan inputan
        $this->name = null;
        
        $this->doClose();
        
        $this->emit('refresh');
    }

    public function render()
    {
        return view('livewire.modal-delete', ['name', 'custId']);
    }
}
