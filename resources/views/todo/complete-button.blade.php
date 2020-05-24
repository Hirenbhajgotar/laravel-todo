@if($todo->completed)
<span onclick="event.preventDefault();document.getElementById('todo_incomplete_{{$todo->id}}').submit() "
    class="fas fa-check text-green-500 cursor-pointer"></span>
<form style="display: none" id="{{'todo_incomplete_'.$todo->id}}" action="{{ route('todo.incomplete', $todo->id) }}"
    method="post">
    @csrf
    @method('put')
</form>
@else
<span onclick="event.preventDefault();document.getElementById('todo_complete_{{$todo->id}}').submit() "
    class="fas fa-check text-gray-400 cursor-pointer"></span>
<form style="display: none" id="{{'todo_complete_'.$todo->id}}" action="{{ route('todo.complete', $todo->id) }}"
    method="post">
    @csrf
    @method('put')
</form>
@endif