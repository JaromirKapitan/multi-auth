<li class="list-group-item" data-web-page-id="{{ $webPage->id }}" @if(!empty($webMenu)) data-id="{{ $webMenu->id }}" @endif>
    <i class="fas fa-arrows-alt handle cursor-move"></i>
    [{{ $webPage->id }}] {{ $webPage->title }}

    <span class="float-end">
                                @if($webPage->status == \App\Enums\ContentStatus::Published->value)
            <i class="fa fa-eye text-success"></i>
        @elseif($webPage->status == \App\Enums\ContentStatus::Draft->value)
            <i class="fa fa-eye-slash text-warning"></i>
        @else
            <i class="fa fa-eye-slash text-danger"></i>
        @endif

                            <i class="fa fa-trash-can text-hover-danger cursor-pointer item-remove"></i>
                        </span>

    @if(!empty($webMenu))
        <ul class="list-group">
            @foreach($webMenu->children as $child)
                @include('admin.web-page.map-item', ['webMenu' => $child, 'webPage' => $child->webPage])
            @endforeach
        </ul>
    @endif
</li>
