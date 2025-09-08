<div class="container-fluid web-map-container">
    EDITOR

    <div id="menu">
        <ul class="list-group mb-3">
            @if($this->webMenu()->isNotEmpty())
                @foreach($this->webMenu() as $webMenu)
                    @include('admin.web-menu.item', ['webMenu' => $webMenu])
                @endforeach
            @endif
        </ul>
        <div class="item-add text-center bg-warning-subtle p-2 border rounded cursor-pointer" data-bs-toggle="modal" data-bs-target="#MenuItemModal"
             @click="$wire.set('parentId', null)">
            <i class="fa fa-plus"></i>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="MenuItemModal" tabindex="-1" aria-labelledby="MenuItemModalLabel" aria-hidden="true" wire:ignore>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="MenuItemModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-2">
                        <label class="form-label">{{ __('Type') }}</label>
                        <select class="form-control" wire:model.live="itemType">
                            @foreach($itemTypes as $itemTypeValue)
                                <option value="{{ $itemTypeValue }}">{{ $itemTypeValue }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-2">
                        <label class="form-label">{{ __('Option') }}</label>
                        <select class="form-control" wire:model.live="itemId">
                            <option>-- EMPTY --</option>
                            @foreach($this->webPages() as $webPage)
                                <option value="{{ $webPage->id }}">[{{ $webPage->id }}] {{ $webPage->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    @foreach($itemCustom as $lang => $value)
                        <div class="mb-2">
                            <label class="form-label">{{ __('Title') }} [{{ $lang }}]</label>
                            <input type="text" class="form-control" wire:model="itemCustom.{{ $lang }}">
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" wire:click="add">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    @vite(['resources/js/admin/sortable.init.js'])
@endpush

@script
<script>
    $(function () {
        $('#menu').find('ul').each(function(){
            new Sortable(this, {
                group: 'shared',
                handle: '.handle',
                animation: 150,
                onEnd: () => {
                    // checkList();
                }
            });
        })
    })
</script>
@endscript
