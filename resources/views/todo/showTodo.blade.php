@extends('todo.layout')

@section('content')
<div class="grid grid-rows-1">
    <div class="grid grid-cols-6 ">
        <div class="col-start-2 col-span-4">
            <div class="flex items-center justify-between border-b border-gray-600">
                <h3 class="text-2xl my-6 mx-2 text-gray-800 leading-10 ">{{$todo->title}} </h3>
                <a href="{{ route('todo.index') }} "
                    class="bg-transparent text-gray-500 font-semibold py-2 px-4"
                    type="button"> <span class="fa fa-arrow-left"></span>
                </a>
            </div>
            <div class="py-4">
                <p><address><b>Description</b> : </address> {{$todo->description}} </p>
            </div>

            @if($todo->steps->count() > 0)
                @foreach ($todo->steps as $step)
                    <div class="py-2">
                        <address><b>Steps</b> : </address>
                        <p>
                             {{$step->name}}
                        </p>
                    </div>
                @endforeach
            @endif
            
        </div>
    </div>
</div>
@endsection