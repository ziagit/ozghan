@extends('admin.layout')
@section('content')
<div class="actions"><h1 style="margin-right:auto">{{ $label }}</h1><a class="btn" href="{{ url('/admin/'.$type.'/create') }}">Add new</a></div>
<div class="admin-card">
  <table class="table">
    <thead><tr>
      @if($type !== 'works')<th>Name</th>@endif
      <th class="{{ $type === 'works' ? '' : 'hide-mobile' }}">Details</th>
      @if($type !== 'works' && $type !== 'services')<th class="hide-mobile">Active</th>@endif
      <th></th>
    </tr></thead>
    <tbody>
      @forelse($items as $item)
      <tr>
        @if($type !== 'works')<td><strong>{{ $item->title ?? $item->name ?? $item->label ?? $item->question }}</strong></td>@endif
        <td class="{{ $type === 'works' ? '' : 'hide-mobile' }}">
          @if($type === 'works')
            <div class="work-admin-details">
              @if($item->image_path)<img class="work-admin-image" src="{{ \Illuminate\Support\Str::startsWith($item->image_path, ['works/', 'services/']) ? '/storage/'.ltrim($item->image_path, '/') : asset(ltrim($item->image_path, '/')) }}" alt="">@endif
              <div><strong>{{ $item->category ?: 'Tiling project' }}</strong><small>{{ $item->description ?: 'No description' }}</small></div>
            </div>
          @else
            @if($type === 'areas' && $item->image_path)<img class="work-admin-image" src="/storage/{{ ltrim($item->image_path, '/') }}" alt="{{ $item->name }} service area image">@endif
            {{ $item->description ?? ($item->answer ?? ($item->option_group ?? '')) }}
            @if(isset($item->service_type))
              <br><small>{{ $item->service_type }}</small>
            @endif
            @if(isset($item->category))
              <br><small>{{ $item->category }}</small>
            @endif
          @endif
        </td>
        @if($type !== 'works' && $type !== 'services')<td class="hide-mobile">{{ $item->is_active ? 'Yes' : 'No' }}</td>@endif
        <td class="actions"><a class="btn btn-muted" href="{{ url('/admin/'.$type.'/'.$item->id.'/edit') }}">Edit</a><form method="post" action="{{ $type === 'works' ? route('admin.works.destroy', $item->id) : url('/admin/'.$type.'/'.$item->id) }}">@csrf @method('DELETE')<button type="submit" class="btn danger" onclick="return confirm('Delete this item?')">Delete</button></form></td>
      </tr>
      @empty
      <tr><td colspan="{{ $type === 'works' || $type === 'services' ? 3 : 4 }}">No records yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@if($type === 'works' && $items->hasPages())<div class="admin-pagination"><a @if($items->onFirstPage()) class="disabled" @else href="{{ $items->previousPageUrl() }}" @endif>Prev</a><a @if(!$items->hasMorePages()) class="disabled" @else href="{{ $items->nextPageUrl() }}" @endif>Next</a></div>@endif
@endsection
