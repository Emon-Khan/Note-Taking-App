@extends('layouts.app')
  
@section('title', 'Edit Note')
  
@section('contents')
    <h1 class="mb-0">Edit Note</h1>
    <hr />
    <form action="{{ route('note.update', $note->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $note->title }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Content</label>
                <textarea class="form-control" name="content" placeholder="Content" >{{ $note->content }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection