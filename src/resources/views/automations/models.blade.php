@extends('automation::automations.layouts')
@section('title', @$data['title'])
@section('breadcumb')
    @foreach ($data['breadcumb'] as $key => $breadcumb)
        <li><a class="text-capitalize" href="{{ @$breadcumb['url'] }}"
                class="{{ isset($loop->last) ? 'active' : '' }}">{{ @$breadcumb['text'] }}</a>
        </li>
    @endforeach
@endsection
@section('content')
    <section>
        <table class="table table-striped">
            <thead>
                <tr class="text-uppercase">
                    <th>SL</th>
                    <th>File Name</th>
                    <th>Type</th>
                    {{-- <th>Name</th> --}}
                    <th>Size</th>
                    <th>Last Update</th>
                    <th>Permission</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['models'] as $key => $value)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value['basename'] }}</td>
                        <td>{{ $value['extension'] }}</td>
                        {{-- <td>{{ $value['filename'] }}</td> --}}
                        <td>{{ $value['filesize'] }}</td>
                        <td>{{ date('jS \of F Y, h:i A', $value['filemtime']) }}</td>
                        <td>{{ $value['fileperms'] }}</td>
                        <td>
                            <a href="#" class="text-secondary btn btn-xs btn-info"> <i class="fa fa-pencil"></i> </a>
                            <a href="#" class="text-secondary btn btn-xs btn-danger"> <i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>



    </section>

@endsection
