@foreach($items as $item)
<li{{$item->builder->attributes($item->attr())}}@if($item->hasChildren()) class="dropdown" @endif>
@if($item->link)<a{{$item->builder->attributes($item->link->attr())}} href="{{ $item->url() }}" @if($item->hasChildren()) class="dropdown-toggle" data-toggle="dropdown" @endif>
{{ $item->title }}
@if($item->hasChildren()) <b class="caret"></b> @endif
</a>
@else
{{$item->title}}
@endif
@if($item->hasChildren())
<ul class="dropdown-menu">

    {{{-- REVERSE --}}
    @include('layouts.menu-list', array('items' => $item->children()))

</ul>
@endif
</li>
@if($item->divider)
<li{{$item->builder->attributes($item->divider)}}></li>
@endif
@endforeach