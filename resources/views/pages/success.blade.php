@extends('defaults.default')

@section('content')
    <header>
        <nav>
            <a href="/">Back</a>
        </nav>
    </header>
    @if(isset($message))
        <p class="notice">
            {{ $message }}
        </p>
    @endif
@endsection
