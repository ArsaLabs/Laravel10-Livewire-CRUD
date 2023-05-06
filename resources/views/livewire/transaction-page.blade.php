<div class="row">
    <div class="col-lg-6 mb-3">
        @if (session()->has('message'))
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <i class="bi bi-check-circle mx-2"></i>
                <div class="text-success fw-bold fs-5">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        <div class="container">
            <form wire:submit.prevent='save'>
                <div class="mb-3">
                    <label for="custName" class="form-label">Customer Name</label>
                    <select wire:model='custName' class="form-select" aria-label="Default select example">
                        <option selected>Choose Customer</option>
                        @forelse ($customers as $customer)
                            
                           <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @empty
                        @endforelse
                      </select>
                    @error('custName')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Trx Name</label>
                    <select wire:model='name' class="form-select" aria-label="Default select example">
                        <option selected>Choose Trx Name</option>
                        @forelse ($categories as $category)
                        
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @empty
                        <option selected>Tidak ada data transaksi</option>
                        @endforelse
                    </select>
                    
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input wire:model.debounce.500ms='amount' type="text" class="form-control" id="name"
                        placeholder="Enter the amount of transaction">
                    @error('amount')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <div class="container">
                <table class="table table-striped table-hover">
                    <thead class="text-center bg-dark text-light">
                        <th>Trx ID</th>
                        <th>Account ID</th>
                        <th>Trx Date</th>
                        <th>Description</th>
                        <th>D / C</th>
                        <th>Amount</th>
                        
                    </thead>
                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>{{ $transaction->customer_models_id }}</td>
                                <td>{{ $transaction->transaction_date }}</td>
                                <td>{{ $transaction->description }}</td>
                                <td>{{ $transaction->debit_credit_status }}</td>
                                <td>{{ $transaction->amount }}</td>
                                
                            </tr>

                        @empty
                            <tr rowspan="3" style="text-align: center">
                                <td>

                                </td>
                                <td>
                                    
                                </td>
                                <td>
                                    Tidak ada data ditemukan!
                                    
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $transactions->links() }}
                </ul>
            </nav>
        </div>
    </div>

    @livewire('modal-edit', ['id' => 'id'])
    @livewire('modal-delete', ['id' => 'id'])

    
</div>
