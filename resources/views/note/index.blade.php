@extends('layouts.app')
@section('title', 'NoteHub')
@section('contents')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">List Note</h1>
    <a href="{{ route('note.create') }}" class="btn btn-primary">Add Note</a>
</div>
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">CreateDate</th>
                <th scope="col">UpdateDate</th>
            </tr>
        </thead>
        <tbody>
            @if($note->count() > 0)
            @foreach($note as $iter)
            <tr>
                <td class="align-middle">{{ $loop->iteration }}</td>
                <td class="align-middle">{{ $iter->title }}</td>
                <td class="align-middle">{{ $iter->content }}</td>
                <td class="align-middle">{{ $iter->created_at }}</td>
                <td class="align-middle">{{ $iter->updated_at }}</td>
                <td class="align-middle">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('note.show', $iter->id) }}" type="button" class="btn btn-secondary">Detail</a>
                        <a href="{{ route('note.edit', $iter->id)}}" type="button" class="btn btn-warning">Edit</a>
                        <form action="{{ route('note.destroy', $iter->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td class="text-center" colspan="5">Note not found</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection