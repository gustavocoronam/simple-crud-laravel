<h3 class="mt-4">Task list</h3>
<table class="table table-borderless">
    <thead>
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($tasks))
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->desc }}</td>
                    <td>
                        <div class="d-flex">
                            <form  action="{{ route('task.show', ['id' => $task->id]) }}" method="GET">
                                @csrf
                                <button class="btn btn-outline-dark mx-2" type="submit">Details</button>
                            </form>
                            <form method="GET" action="{{ route('task.edit', ['id' => $task->id]) }}">
                                @csrf
                                <button class="btn btn-outline-dark mx-2" type="submit">Edit</button>
                            </form>
                            <form method="POST" action="{{ route('task.delete', ['id' => $task->id]) }}">
                                @method('delete')
                                @csrf
                                <button class="btn btn-outline-dark mx-2" type="submit">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
