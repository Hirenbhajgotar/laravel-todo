<div>
    <div class="my-1">
        <h3 wire:click="increment" class="cursor-pointer" style="display: inline-block;">Add step for task
            <span class="py-2 px-2">
                <i class="fa fa-plus"></i>
            </span>
        </h3>
    </div>



    @foreach ($steps as $step)
    <div wire:key="{{ $loop->index }}">
        <input
            class="shadow appearance-none border rounded w-4/5 py-3 my-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="title" name="stepName[]" type="text" value="{{$step['name']}}"
            placeholder="{{'Describe step'.($loop->index+1)}}">
        <input name="stepId[]" type="hidden" value="{{$step['id']}}">
        <span wire:click="remove({{$loop->index}})" class="text-red-400 cursor-pointer"><i class="fa fa-times"></i>
        </span>
    </div>
    @endforeach
</div>