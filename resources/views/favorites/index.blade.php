@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Favorites <a href="{{ url('/favorites/create') }}" class="btn btn-primary btn-xs" title="Add New Favorite"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('favorites.user_id') }} </th><th> {{ trans('favorites.exercise_id') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($favorites as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->user_id }}</td><td>{{ $item->exercise_id }}</td>
                    <td>
                        <a href="{{ url('/favorites/' . $item->id) }}" class="btn btn-success btn-xs" title="View Favorite"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/favorites/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Favorite"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/favorites', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Favorite" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Favorite',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $favorites->render() !!} </div>
    </div>

</div>
@endsection
