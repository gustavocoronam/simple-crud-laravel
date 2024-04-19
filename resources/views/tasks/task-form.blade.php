<h1>Laravel Crud</h1>
<form method="POST" action="{{ isset($task) ? route('task.update', $task->id) : route('task.store') }}">
    @csrf
    @isset($task)
        @method('put')
    @endisset
    <h3>{{ isset($task) ? 'Update Task' : 'Add Task' }}</h3>
    <div class="w-100">
        <input type="text" class="form-control my-2" name="task" id="task" placeholder="Task..."
        value="{{ old('task', isset($task) ? $task->task : '') }}" />
        <textarea type="text" class="form-control my-2" name="desc" id="desc" placeholder="Description"
            style="height: 100px;">{{ old('task', isset($task) ? $task->desc : '') }}</textarea>
    </div>
    <button class="btn btn-outline-dark" type="submit">{{ isset($task) ? 'Update' : 'Add' }}</button>
</form>
