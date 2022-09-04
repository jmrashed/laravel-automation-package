@extends('automation::automations.layouts')
@section('title', @$data['title'])
@section('breadcumb')
    @foreach ($data['breadcumb'] as $key => $breadcumb)
        <li><a href="{{ @$breadcumb['url'] }}" class="{{ isset($loop->last) ? 'active' : '' }}">{{ @$breadcumb['text'] }}</a>
        </li>
    @endforeach
@endsection
@section('content')

    <section>
        <h3>test </h3>
    </section>

@endsection
