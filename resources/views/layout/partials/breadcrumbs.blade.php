@if (count($breadcrumbs))
    <ol class="page-breadcrumb breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li>
                    <a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                    <i class="fa fa-circle"></i>
                </li>
            @else
                <li>
                    <span>{{ $breadcrumb->title }}</span>
                </li>
            @endif
        @endforeach
    </ol>
@endif
