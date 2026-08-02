@extends('admin.layout')
@section('content')
<h1>Dashboard</h1>
<div class="admin-grid">@foreach($counts as $label => $count)<div class="admin-card"><div>{{ $label }}</div><div class="admin-stat">{{ $count }}</div></div>@endforeach</div>

<div class="admin-card order-chart-card">
    <div class="chart-heading"><div><h2>Orders</h2><p>All quote requests received.</p></div><a class="btn btn-muted" href="/admin/orders">View orders</a></div>
    <div class="chart-wrap">
        <svg viewBox="0 0 {{ $orderChart['chartWidth'] }} {{ $orderChart['chartHeight'] }}" role="img" aria-label="Orders over the last 14 days">
            <defs><linearGradient id="orders-area" x1="0" x2="0" y1="0" y2="1"><stop offset="0" stop-color="#b8541f" stop-opacity=".35"/><stop offset="1" stop-color="#b8541f" stop-opacity=".03"/></linearGradient></defs>
            @for($grid = 0; $grid <= 4; $grid++)
                @php($gridY = $orderChart['top'] + ($orderChart['plotHeight'] * $grid / 4))
                <line x1="{{ $orderChart['left'] }}" x2="{{ $orderChart['chartWidth'] - 18 }}" y1="{{ $gridY }}" y2="{{ $gridY }}" stroke="#d8d0c6" stroke-width="1" />
            @endfor
            <polygon points="{{ $orderChart['areaPoints'] }}" fill="url(#orders-area)" />
            <polyline points="{{ $orderChart['linePoints'] }}" fill="none" stroke="#b8541f" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
            @foreach($orderChart['orderChart'] as $index => $day)
                @if($day['count'] > 0)
                    @php($point = $orderChart['points'][$index])
                    <circle cx="{{ $point['x'] }}" cy="{{ $point['y'] }}" r="6" fill="#fff" stroke="#b8541f" stroke-width="3"><title>{{ $day['count'] }} order(s) on {{ $day['label'] }}</title></circle>
                    <text x="{{ $point['x'] }}" y="{{ $point['y'] - 12 }}" text-anchor="middle" fill="#b8541f" font-size="12" font-weight="bold">{{ $day['count'] }}</text>
                @endif
                @if(in_array($index, $orderChart['labelIndexes'], true))
                    @php($point = $orderChart['points'][$index] ?? null)
                    @if($point)<text x="{{ $point['x'] }}" y="{{ $orderChart['chartHeight'] - 12 }}" text-anchor="middle" fill="#5b564f" font-size="12">{{ $day['label'] }}</text>@endif
                @endif
            @endforeach
        </svg>
    </div>
</div>

<div class="admin-card"><h2>Getting started</h2><p>Use the navigation to update public services, service areas, completed work, quote choices, or review submitted orders.</p></div>
@endsection
