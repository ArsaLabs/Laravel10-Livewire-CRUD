<div>
    <div class="modal fade @if ($show === true) show @endif" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        style="display: @if ($show === true) block
                        @else
                        none @endif;">
        <input type="hidden" wire:model='trxId'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Customer</h1>
                    <button wire:click='doClose' type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body bg-danger">
                    <form wire:submit.prevent='delete'>
                        <input type="hidden" wire:model='id'>
                        <h2 class="text-light fw-bold">Apakah anda yakin menghapus data transaksi {{ $name }}</h2>
                </div>
                <div class="modal-footer bg-danger">
                    <button wire:click='doClose' type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
