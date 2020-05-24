@extends('todo.layout')

@section('content')
    <div class="grid grid-rows-1">
        <div class="grid grid-cols-6">
            <div class="col-start-3 col-span-4">
                <div class="w-3/5 rounded overflow-hidden shadow-lg">
                    <div class="px-6 py-4">
                        <p class="text-center text-xl mb-2">
                            Update this to-do list
                            {{-- {{$todo->id}} --}}
                        </p>
                        <div class="w-full ">
                            <form action="{{route('todo.update', $todo->id)}} " method="post" class="px-8 pt-6 pb-8 mb-4">
                            {{-- <form action="{{action('TodoController@edit', ['todo' => $todo->id])}} " method="post" class="px-8 pt-6 pb-8 mb-4"> --}}
                                <div class="py-2 pb-3">
                                    <x-alert /> {{-- Alert Component --}}
                                </div>
                                @csrf
                                @method('put')
                                <div class="mb-4">
                                    <input
                                        class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="title" name="title" type="text" placeholder="Enter text" 
                                        value="{{old('title', $todo->title)}} ">
                                </div>
                                <div class="mb-4">
                                    <textarea class="shadow appearance-none border rounded w-full py-3 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                                        name="description" 
                                        id="description" 
                                        cols="30" rows="3" 
                                        placeholder="Description">{{old('description', $todo->description)}} </textarea>
                                </div>
                                <div class="flex items-center ">
                                    <a href="/todo"
                                        class=" bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center"
                                        type="button"> Back
                                    </a>
                                    <button
                                        class="mx-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                        type="submit">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection