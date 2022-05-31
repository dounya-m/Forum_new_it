@extends('layouts.app')

@section('content')

    <div class="container  p-10 w-1/2 shadow-md rounded-lg mt-24    ">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card rounded-lg border-0 ">
                    <div class="card-header bg-slate-50 text-center font-semibold text-xl text-indigo-900">
                        Add Post
                    </div>
                    <form class="card-body form-group mx-auto " method="POST" enctype="multipart/form-data"
                        action="{{ route("Posts@store") }}">
                        @csrf
                        <label for="name">
                            Title :
                        </label>
                        <input type="text" class="form-control" name="title" placeholder="Write Something ...">
                        <label for="price" class="mt-3">
                            Description :
                        </label>
                        <input type="text" class="form-control" name="desc" placeholder="Write Something ...">

                        <label for="price" class="mt-3">
                            Category :
                        </label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        {{-- <label for="image" class="mt-3"> Image : </label>
                        <input type="file" class="form-control" name="image" placeholder="Write Something ..."> --}}

                        <label class="block mt-2 mb-6">
                            <span class="sr-only">Choose File</span>
                            <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-300 hover:file:bg-blue-100 mt-2"/>
                        </label>


                        {{-- <input class=" bg-sky-600 p-2 mt-2 text-white w-24 hover: " name="submit-form" value="Add" type="submit" class="btn btn-primary px-4 mt-3" /> --}}
                        <button name="submit-form" value="Add" type="submit" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Submit</button>

                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
