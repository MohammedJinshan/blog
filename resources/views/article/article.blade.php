@extends('layout.master')
@section('content')
    <h1>Article</h1>
    <div class="text-end mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addarticle">
            <i class="bi bi-plus"></i> Add Article
        </button>
    </div>

    <table class="table" id="data-table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>

            </tr>

        </thead>

        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->id }}</td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->description }}</td>
                    <td><img src={{ $article->image }} alt="Girl in a jacket" width="50" height="50">
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editarticle{{ $article->id }}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deletearticle{{ $article->id }}">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Modal add-->
    <div class="modal fade" id="addarticle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New Article</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('article.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group d-flex align-items-center">
                            <label class="col-3">Title :- </label>
                            <input type="text" name="title" class="form-control col-8" placeholder="Enter Title">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-3">Description :- </label>
                            <input type="text" name="description" class="form-control col-8"
                                placeholder="Enter Description">
                        </div>
                        <div class="from-group d-flex align-items-center mt-1">
                            <label class="col-3">Image :- </label>
                            <input type="file" name="image" class="form-control col-8">
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


    @foreach ($articles as $article)
        <!-- Modal delete-->
        <div class="modal fade" id="deletearticle{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                        <a type="submit" class="btn btn-danger" href="{{ route('article.delete', $article->id) }}">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit-->
        <div class="modal fade" id="editarticle{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('article.edit') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $article->id }}" name="id">
                            <div class="from-group d-flex align-items-center">
                                <label class="col-3">Title :- </label>
                                <input type="text" value="{{ $article->title }}" name="title"
                                    class="form-control col-8">
                            </div>
                            <div class="from-group d-flex align-items-center mt-1">
                                <label class="col-3">Description :- </label>
                                <input type="text" value="{{ $article->description }}" name="description"
                                    class="form-control col-8">
                            </div>
                            <div class="from-group d-flex align-items-center mt-1">
                                <label class="col-3">Image :- </label>
                                <input type="file" value="{{ $article->title }}" name="image"
                                    class="form-control col-8">
                            </div>
                            <div class="mt-2">
                                <label>
                                    Current image
                                </label>
                                <img src="{{ asset($article->image) }}" alt="image" style="height:10vw;width:7vw" />
                            </div>
                            <div class="form-group mt-2">
                                <label>
                                    Upload New Image
                                </label>
                                <input type="file" name="image" class="form-control">
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
