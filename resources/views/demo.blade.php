<link rel="stylesheet" href="{{ asset('style.css') }}">

<ul>
    @foreach ($games as $item)
        <li>
            第 {{ $loop->iteration }} 個 - {{ $item }} <br>
            First:{{ $loop->first }}    Last:{{ $loop->last }}
        </li>
    @endforeach
</ul>

{!! $global !!} <br>
{!! $multi !!}

<a href="{{ url('/paint') }}">畫廊</a>

@include('include')