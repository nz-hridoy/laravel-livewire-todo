<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class IndexComponent extends Component
{
    public $task_content;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'task_content' => 'required'
        ]);
    }

    public function store()
    {
        $this->validate([
            'task_content' => 'required'
        ]);

        $task = new Task();
        $task->content = $this->task_content;
        $task->save();

        session()->flash('success_message', 'New task added successfully');
        $this->task_content = '';
    }

    public function markAsComplete($task_id)
    {
        $task = Task::find($task_id);
        $task->status = $task->status == 1 ? 0 : 1;
        $task->save();

        session()->flash('success_message', 'Task updated successfully');
    }

    public function delete($task_id)
    {
        $task = Task::find($task_id);
        $task->delete();

        session()->flash('danger_message', 'Task deleted successfully');
    }

    public function render()
    {
        $tasks = Task::orderBy('id', 'DESC')->get();

        return view('livewire.index-component', ['tasks'=>$tasks])->layout('livewire.layouts.base');
    }
}
