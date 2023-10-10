<?php

namespace App\Http\Livewire\In;

use App\Models\Operation;
use App\Models\OperationType;
use Carbon\Carbon;
use Livewire\Component;

class SemenceCreateComp extends Component
{
    public $title, $number, $status,
        $registration_date, $observations, $qty_purchased, $amount;
    public $semence_id=null, $product_id=null, $quantity, $price, $description;
    public $operationTypes = [], $operation_type_id;

    protected $rules = [
        'qty_purchased' => 'required|numeric|min:1',
        'amount'         => 'required|numeric|min:500',
        'registration_date' => ['required', 'date'],
        'status' => ['nullable'],
    ];

    public function addOperation(Operation $operation) {
        //dd(Carbon::parse($this->registration_date)->format('ymd'));
        $this->number = now()->format('ymdHis');
        //dd($this->number);
        $this->validate();
        $formattedDate = Carbon::parse($this->registration_date)->format('ymd');
        $this->title = "Operation-".$formattedDate."-".$this->qty_purchased;
        //dd($this->title);
        $operation->title = $this->title;
        $operation->number = $this->number;
        $operation->quantity_purchased = $this->qty_purchased;
        $operation->amount = $this->amount;
        $operation->registration_date = $this->registration_date;
        $operation->operation_type_id = $this->operation_type_id;
        $operation->observations = $this->observations;
        $operation->admin_id = auth()->user()->id;
        $operation->save();
        $this->showToastr('success', 'Enregistrement réussi.');
        return redirect('admin/home');
        $this->reset();
    }

    public function update() {
        $this->validate();
    }


    public function showToastr($type, $message) {
        return $this->dispatchBrowserEvent('showToastr', [
            'type'  => $type,
            'message' => $message
        ]);
    }

    public function mount()
    {
        $this->operationTypes = OperationType::all();
    }

    public function render()
    {
        return view('livewire.in.semence-create-comp');
    }
}
