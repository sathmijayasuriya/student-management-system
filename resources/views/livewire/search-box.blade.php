<div class="d-flex justify-content-between align-items-center">
    <input type="text" wire:model.live="search" placeholder="{{ $placeholder }}" class="form-control">
    <button wire:click="resetSearch" class="btn btn-light" type="button" title="Clear search"
        style="background-color: transparent !important; border-color: #ffffff !important; color: #000000 !important;">
        Clear
    </button>
</div>
