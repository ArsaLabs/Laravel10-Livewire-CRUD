<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TransactionModels;
use App\Models\CustomerModels;
use App\Models\CategoryTrx;
use Illuminate\Support\Carbon;

class TransactionPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name, $amount, $trxId, $custName, $status;

    //validation rules
    protected $rules = [
        'name' => 'required',
        'custName' => 'required',
        'amount' => 'numeric|min:1000|max:99999999'
    ];


    public function mount()
    {
        $customers = CustomerModels::all();

    }

    public function save()
    {
        //validasi inputan
        $data = $this->validate();

        $custData = CustomerModels::find($data['custName']);

        $cat_trx = CategoryTrx::find($data['name']);

        if ($cat_trx->id == 2) {
            if ($data['amount'] < 10001) {
                $point = 0;
            } elseif ($data['amount'] > 30000) {
                $point = 2;
            } elseif ($data['amount'] >= 10001 && $data['amount'] <= 30000) {
                $point = 1;
            }
        } elseif ($cat_trx->id == 3) {
            if ($data['amount'] < 50001) {
                $point = 0;
            } elseif ($data['amount'] > 100000) {
                $point = 2;
            } elseif ($data['amount'] >= 50001 && $data['amount'] <= 100000) {
                $point = 1;
            }
        }
        $mix_data = [
            'customer_models_id' => $custData->id,
            'transaction_date' => Carbon::now()->toDateString(),
            'description' => $cat_trx->name,
            'debit_credit_status' => $cat_trx->status,
            'amount' => $data['amount'],
        ];

        //simpan data inputan yg sdh divalidasi
        TransactionModels::create($mix_data);

        //bikin alert kalo proses berhasil
        session()->flash('message', ' Transaksi dari customer '. $custData->name  .' berhasil dibuat!');

        //kosongkan inputan
        $this->name = null;
        $this->custName = null;
        $this->amount = null;

    }

    public function render()
    {
        return view('livewire.transaction-page',[
            'transactions' => TransactionModels::paginate(5),
            'customers' => CustomerModels::all(),
            'categories' => CategoryTrx::all()
        ]);
    }
}
