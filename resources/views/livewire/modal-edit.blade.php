<div>
    <div class="modal fade @if ($show === true) show @endif" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="display: @if ($show === true) block
                        @else
                        none @endif;">
        <input type="hidden" wire:model='custId'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Customer</h1>
                    <button wire:click='doClose' type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body bg-warning">
                    <form wire:submit.prevent='update'>
                        <input type="hidden" wire:model='id'>
                        <label for="name" class="form-label">Nama Customer</label>
                        <input wire:model.debounce.500ms='name' type="text" class="form-control">
                        @error('name')
                            <span class="text-danger text-sm">{{ $message }}</span>
                        @enderror
                </div>
                <div class="modal-footer bg-warning">
                    <button wire:click='doClose' type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
