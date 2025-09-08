<li class="list-group-item">
    <div class="d-flex">
        <span class="me-auto">
            <i class="fas fa-arrows-alt handle cursor-move"></i>
            {{ $webMenu->title }}
        </span>
        <span class="ms-auto d-flex">
            @if(empty($webMenu->target))
                <div class="text-hover-warning cursor-pointer" data-bs-toggle="modal" data-bs-target="#MenuItemModal"
                     @click="$wire.set('parentId', {{ $webMenu->id }})">
                    <i class="fa fa-pencil"></i>
                </div>
            @endif

            <div class="text-hover-success cursor-pointer" data-bs-toggle="modal" data-bs-target="#MenuItemModal"
               @click="$wire.set('parentId', {{ $webMenu->id }})">
                <i class="fa fa-plus"></i>
            </div>
        </span>
    </div>

    {{--    <span class="float-end">--}}
    {{--        @if($webPage->status == \App\Enums\ContentStatus::Published->value)--}}
    {{--            <i class="fa fa-eye text-success"></i>--}}
    {{--        @elseif($webPage->status == \App\Enums\ContentStatus::Draft->value)--}}
    {{--            <i class="fa fa-eye-slash text-warning"></i>--}}
    {{--        @else--}}
    {{--            <i class="fa fa-eye-slash text-danger"></i>--}}
    {{--        @endif--}}

    {{--        <i class="fa fa-trash-can text-hover-danger cursor-pointer item-remove"></i>--}}
    {{--    </span>--}}

    @if(!empty($webMenu))
        <ul class="list-group">
            @foreach($webMenu->childrens as $child)
                @include('admin.web-menu.item', ['webMenu' => $child, 'webPage' => $child->webPage])
            @endforeach
        </ul>
    @endif
</li>
