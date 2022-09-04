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
        <form class="form-horizontal" role="search">
            <div class="form-group">
                <textarea name="name" id="" cols="30" rows="35" class="form-control _textarea">{{ $data['env'] }}</textarea>
            </div>
            <button type="submit" class="btn btn-default">Update</button>
        </form>
    </section>
@endsection
