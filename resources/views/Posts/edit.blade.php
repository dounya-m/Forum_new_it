@extends('layouts.app')

@section('content')

    <div class="container ">
        <div class="row justify-content-center rounded-lg border-0">
            <div class="col-md-12">
                <div class="card  border-0 w-3/4 mx-auto p-1 shadow-md rounded-lg ">
                    <div class=" font-semibold text-indigo-900  card-header border-0 bg-slate-5 0 shadow-md">
                        Update Your Post
                    </div>
                    <form class="card-body form-group" method="POST" enctype="multipart/form-data"
                        action="{{ route("Posts@update",$Post->id) }}">
                        @csrf
                        @method("PUT")
                        <label for="name">
                            Title :
                        </label>
                        <input type="text" class="form-control" value="{{$Post->title }}"  name="title" placeholder="Write Something ...">
                        <label for="price" class="mt-3">
                            Description :
                        </label>
                        <input type="text" class="form-control" value="{{$Post->description }}" name="description" placeholder="Write Something ...">

                        {{-- <label for="image" class="mt-3"> Image : </label>
                        <input type="file" class="form-control" name="image" placeholder="Write Something ..."> --}}

                        <label class="block mt-4 mb-4">
                            <span class="sr-only">Choose File</span>
                            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-300 hover:file:bg-blue-100 mt-2"/>
                        </label>

                        <label for="price" class="mt-3">
                            Category :
                        </label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                    {{ $item->id == $Post->category_id ? 'selected' : '' }}>{{ $item->name }}</option>

                            @endforeach
                        </select>
                        <label>Current Image :</label>
                        <img src="{{asset($Post->image)}}" class="img-fluid d-block" width="300" height="300" />
                        <input name="submit-form" value="update" type="submit" class="mt-2 text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" />
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

