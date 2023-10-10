<?php

namespace App\Http\Livewire\In;

use App\Models\Operation;
use Livewire\Component;
use Livewire\WithPagination;

class SemenceComp extends Component
{
    use WithPagination;

    public $title, $status, $registration_date, $observations;
    public $semenceId;

    protected $rules = [
        'title' => 'required|string|min:5',
        'registration_date' => ['required', 'date'],
        'status' => ['nullable'],
        //'product_id' => 'required', 'semence_id' => 'required',
    ];

    public function edit($semenceId)
    {
        $this->semenceId = $semenceId;
        $semence = Operation::findOrFail($semenceId);
        $this->title = $semence->title;
        $this->registration_date = $semence->registration_date;
        $this->status = $semence->status;
        $this->observations = $semence->observations;
    }

    public function updateSemence()
    {
        $this->validate();
        //dd($this->semenceId);
        $semence = Operation::findOrFail($this->semenceId);
        //dd($semence);
        $semence->title = ucfirst($this->title);
        $semence->registration_date = $this->registration_date;
        $semence->status = $this->status;
        $semence->observations = $this->observations;
        $semence->update();
        //$this->render();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $operations = Operation::where('admin_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('livewire.in.semence-comp', compact(['operations']));
    }

    public function closeModal()
    {
        //$this->resetInput();
        $this->reset();
    }

}
