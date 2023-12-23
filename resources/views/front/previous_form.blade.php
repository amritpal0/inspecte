@extends('front.layouts.master')

@section('content')

<div class="wrapper previous_section">
    <table class="table bordered ">
        <thead>
            <tr>
                <th>Sno.</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($form as $f)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ date('d M, y', strtotime($f->created_at)) }}</td>
                <td><a href="{{route('download_pdf', ['id' => $f->id])}}">Download</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection