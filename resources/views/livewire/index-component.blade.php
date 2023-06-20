<div>
    <style>
        .list-scroll::-webkit-scrollbar-track
        {
            background-color: #ffffff;
        }

        .list-scroll::-webkit-scrollbar
        {
            width: 3px;
            background-color: #ffffff;
        }

        .list-scroll::-webkit-scrollbar-thumb
        {
            background-color: #cecece;
        }

        .form-control:focus{
            outline: 0;
            box-shadow: none;
            border: 1px solid #DEE2E6;
        }
    </style>
    <div class="container-sm">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-10">

                <div class="card">
                    <div class="card-header pb-1">
                        <h5><strong>NzCoding - ToDo App</strong></h5>
                    </div>
                    <div class="card-body">
                        <form wire:submit.prevent='store'>
                            <div class="input-group">
                                <input type="text" class="form-control @error('task_content') border-danger @enderror" placeholder="Add new task" wire:model='task_content'>
                                <button type="submit" class="btn btn-dark input-group-append">
                                    <i class="fa fa-plus-circle"></i>
                                </button>
                            </div>
                        </form>

                        <hr>

                        <ul class="list-group list-scroll" style="user-select: none; height: 67vh; overflow-y: scroll;">
                            @if ($tasks->count() > 0)
                                @foreach ($tasks as $task)
                                    <li class="list-group-item d-flex justify-content-between align-items-center mb-2" style="border: 1px solid #DEE2E6;">
                                        @if ($task->status == 1)
                                            <del>{{ $task->content }}</del>
                                        @else
                                            {{ $task->content }}
                                        @endif

                                        <span>
                                            <a href="#" class="text-{{ $task->status == 0 ? 'secondary':'success' }}" wire:click.prevent='markAsComplete({{ $task->id }})'><i class="fa fa-check"></i></a>
                                            <a href="#" class="text-danger" wire:click.prevent='delete({{ $task->id }})'><i class="fa fa-times"></i></a>
                                        </span>
                                    </li>
                                @endforeach
                            @else

                            @endif
                        </ul>
                    </div>

                    <div class="card-footer text-center pt-1">
                        <small class="text-muted">Coded by <b>NzCodinG</b></small>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
