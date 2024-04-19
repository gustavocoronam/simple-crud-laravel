@if (session('taskShow'))
<div class="card shadow-sm border-light mt-2 p-3">
        <h4>Taks Details</h4>
        <span><b>Task:</b> {{ session('taskShow')->task }}</span>
        <span><b>Description:</b> {{ session('taskShow')->desc }}</span>
        <span><b>Created At:</b> {{ session('taskShow')->created_at }}</span>
    </div>
@endif
