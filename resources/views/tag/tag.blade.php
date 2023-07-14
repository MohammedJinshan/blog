@extends('layout.master')
@section('content')
    <h1>Tag</h1>
    <div class="text-end mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addtag">
            <i class="bi bi-plus"></i> Add Tag
        </button>
    </div>

    <table class="table" id="data-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Article</th>
                <th scope="col">Action</th>
            </tr>

        </thead>
        <tbody>
            @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td>{{ $tag->title }}</td>
                    @if ($tag->article)
                        <td>{{ $tag->article->title }}</td>
                    @else
                        <td>
                            No tag Found !
                        </td>
                    @endif
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#edittag{{ $tag->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deletetag{{ $tag->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Modal add-->
    <div class="modal fade" id="addtag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('tag.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group d-flex align-items-center">
                            <label class="col-3">Title :- </label>
                            <input type="text" name="title" class="form-control col-8" placeholder="Enter Title">
                        </div>
                        <div class="form-group d-flex align-items-center">
                            <label class="col-3">Article :-</label>
                            <div class="col-9">

                                <select class="form-select" aria-label="Default select" name="article_id">
                                    @foreach ($articles as $article)
                                        <option value="{{ $article->id }}">{{ $article->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @foreach ($tags as $tag)
        <!-- Modal delete-->
        <div class="modal fade" id="deletetag{{ $tag->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Do you want to delete
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>
                        <a type="submit" class="btn btn-danger" href="{{ route('tag.delete', $tag->id) }}">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Edit-->
        <div class="modal fade" id="edittag{{ $tag->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tag.edit') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $tag->id }}" name="id">
                            <div class="from-group d-flex align-items-center">
                                <label class="col-3">Title :- </label>
                                <input type="text" value="{{ $tag->title }}" name="title"
                                    class="form-control col-8">
                            </div>
                            <div class="form-group">
                                <label class="col-3">Article :-</label>
                                <select class="form-controll col-2" name="article_id" value="{{ $tag->article_id }}">
                                    @foreach ($articles as $article)
                                        <option @if ($article->id === $tag->article_id) selected @endif
                                            value="{{ $article->id }}">{{ $article->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
