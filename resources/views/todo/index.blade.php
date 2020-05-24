@extends('todo.layout')

@section('content')
    <div class="grid grid-rows-1">
        <div class="grid grid-cols-6">
            <div class="col-start-2 col-span-4">
                <div class="flex items-center ">
                    <h3 class="text-2xl my-6 mx-2 text-gray-800 leading-10 ">All Your Todos</h3>
                    <a href="{{ route('todo.create') }} "
                        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                        type="button"> Create Todo
                    </a>
                </div>
                
                <div class="py-2 pb-3">
                    <x-alert /> {{-- Alert Component --}}
                </div>
                <div class="divide-y divide-gray-400 border border-gray-600 rounded-md">
                    @forelse ($todos as $todo)
                        <div class="px-3 py-3 flex justify-between">
                            <div>
                                @include('todo.complete-button') 
                                <a href="{{route('todo.show', $todo->id)}} ">
                                    <span class="@if($todo->completed) {{"line-through"}} @endif px-3">{{$todo->title}}</span>
                                </a> 
                            </div>
                            <div>
                                <a href="{{route('todo.edit', $todo->id) }}"
                                    class=" bg-transparent text-yellow-500 font-semibold py-1 px-3 ">
                                    <span class="fas fa-pen"></span>
                                </a>
                                <span onclick="event.preventDefault();
                                    if(confirm('Are you really want to Delete?')) {
                                        document.getElementById('todo_delete_{{$todo->id}}').submit()
                                    }"
                                    class="fas fa-trash text-red-400 cursor-pointer"></span>
                                <form style="display: none" id="{{'todo_delete_'.$todo->id}}" action="{{ route('todo.destroy', $todo->id) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                </form>
                            </div>
                        </div>
                    @empty
                        <p class="py-5 px-5 text-center">There no TO-DO, Create one.</p>                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection