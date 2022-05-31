@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- toolbar --}}

        <div class="row border-0">
            <div class="col-md-3 border-0">
                <div class="list-group border-0">
                    <a class=" font-semibold border-t-blue-900 text-xl	 " href="{{ route('Posts@index') }}" class="list-group-item list-group-item-action">
                        All
                    </a>
                    @foreach ($categories as $item)
                        <a class=" border-0 border-b-2 border-l-indigo-700 shadow-md shadow-neutral-200 p-4" href="{{ route('Posts@index') . '?category=' . $item->id }}"
                            class="list-group-item list-group-item-action">
                            {{ $item->name }}
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="col-md-8 row ">
                @if (count($Posts) > 0)
                    @foreach ($Posts as $Post)
                        {{-- begin of column --}}

                        <div class="col-12  mb-3">
                            <div class="card mb-3 shadow-md ">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="{{ asset($Post->image) }}" class="card-img"
                                            style="height: 100%;object-fit: cover" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-titlet font-semibold text-indigo-900 mb-3 ">{{ $Post->title }}</h5>
                                            <p class="card-text mb-4">{{ $Post->description }}</p>
                                            <a class="mt-2 text-slate-500 rounded-lg p-2 " href="{{ route('Posts@show', $Post->id) }}"
                                                class="btn btn-primary d-block">Read More</a>
                                            @auth

                                                <div class="flex gap-4 ">
                                                    @if (Auth::user()->role === 'admin' || auth()->user()->id == $Post->user_id)
                                                    <a href="{{ route('Posts@edit', $Post->id) }}"
                                                        class="btn bg-sky-500 text-gray-50 mt-2 ">Edit</a>
                                                    <form action="{{ route('Posts@destroy') }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn bg-rose-700 text-gray-50 mt-2 " type="submit">Delete</button>
                                                        <input type="hidden" name="id" value="{{ $Post->id }}" />
                                                    </form>
                                                @endif
                                                </div>


                                            @endauth
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- end of column --}}
                    @endforeach
                @else
                    <div class="col-12 text-center mt-4">
                        <h2>No Posts Found</h2>
                    </div>
                @endif



            </div>
        </div>
    </div>
@endsection
