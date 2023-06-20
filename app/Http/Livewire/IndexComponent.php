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

        $this->task_content = '';
    }

    public function render()
    {
        return view('livewire.index-component')->layout('livewire.layouts.base');
    }
}
