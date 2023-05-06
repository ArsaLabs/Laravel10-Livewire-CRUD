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
                    <label for="name" class="form-label">Nama Transaksi</label>
                    <input wire:model.debounce.500ms='name' type="text" class="form-control" id="name"
                        placeholder="Masukkan nama Transaksi">
                    @error('name')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status Transaksi</label>
                    <select wire:model='status' class="form-select" aria-label="Default select example">
                        <option selected>Pilih Status Transaksi</option>
                        <option value="D">Debit</option>
                        <option value="C">Credit</option>
                      </select>
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
                        <th>Trx ID</th>
                        <th>Nama Customer</th>
                        <th>Status Trx</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status }}</td>
                                <td class="text-center">
                                    <button wire:click="$emit('edittrx', {{ $category->id }})" class="btn btn-warning" >Edit</button>
                                    <button wire:click="$emit('deletetrx', {{ $category->id }})" class="btn btn-danger">Delete</button>
                                </td>
                            </tr>

                        @empty
                        <tr rowspan="3" style="text-align: center">
                            <td>

                            </td>
                            <td>
                                Tidak ada data ditemukan!
                                
                            </td>
                            <td>

                            </td>
                            <td></td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    {{ $categories->links() }}
                </ul>
            </nav>
        </div>
    </div>

    @livewire('modal-edit-cat-trx', ['id' => 'id'])
    @livewire('modal-delete-cat-trx', ['id' => 'id'])

    
</div>
