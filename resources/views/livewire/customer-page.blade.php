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
            <form wire:submit.prevent='simpan'>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Customer</label>
                    <input wire:model.debounce.500ms='name' type="text" class="form-control" id="name"
                        placeholder="Masukkan nama Customer">
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col">
            <div class="container">
                <table class="table table-striped table-hover">
                    <thead class="text-center">
                        <th>Customer ID</th>
                        <th>Nama Customer</th>
                        <th>Point</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($customers as $customer)
                            <tr>
                                <td>{{ $customer->id }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->point }}</td>
                                <td class="text-center">
                                    <button wire:click="$emit('getCust', {{ $customer->id }})" class="btn btn-warning" >Edit</button>
                                    <button wire:click="$emit('deleteCust', {{ $customer->id }})" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>

                        @empty
                        <tr rowspan="4" style="text-align: center">
                            <td>

                            </td>
                            <td>
                                Tidak ada data ditemukan!
                                
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
                    {{ $customers->links() }}
                </ul>
            </nav>
        </div>
    </div>

    @livewire('modal-edit', ['id' => 'id'])
    @livewire('modal-delete', ['id' => 'id'])

    
</div>
