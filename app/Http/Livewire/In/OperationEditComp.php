<?php

namespace App\Http\Livewire\In;

use App\Models\Fee;
use App\Models\Operation;
use App\Models\OperationDetail;
use Livewire\Component;
use Livewire\WithPagination;

class OperationEditComp extends Component
{
    use WithPagination;

    public $operation; // the operation_id
    public $operationData = array(), $operationDetails = [];
    public $title, $number, $status,
        $registration_date, $observations, $qty_purchased, $amount, $total_amount;

    public $feeSelected, $quantity, $price, $description, $fees = [];

    public function mount()
    {
        $this->total_amount = 0;
        //$this->operationData = Operation::findOrFail($this->operation);
        $this->operationData = Operation::where('id' ,$this->operation)->first();
        //dd($this->operationData->amount);
        $this->operationDetails = OperationDetail::orderBy('id','DESC')->where('operation_id', $this->operation)->get();
        foreach ($this->operationDetails as $operationDetail) {
            /* total = total + (prix * qte) */
            $this->total_amount += $operationDetail->price * $operationDetail->quantity;
        }
        $this->total_amount += $this->operationData->amount;
        $this->fees = Fee::all();
    }

    protected $rules = [
        'feeSelected' => 'required',
        'quantity' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
    ];

    public function render()
    {
        return view('livewire.in.operation-edit-comp')->extends('back.layouts.pages-layout');
    }


    public function addDetail()
    {
        //dd((int)$this->operation);
        $this->validate();
        OperationDetail::create([
            'operation_id' => $this->operation,
            'fee_id' => $this->feeSelected,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'description' => $this->description
        ]);
        $this->showToastr('success', 'Dépense ajoutée avec succès !.');
        //return redirect('admin/home');
        //$this->reset();
        //$this->calculLoad();
        //$this->render();
        $this->loadOperationDetails();
        $this->dispatchBrowserEvent('close-modal');
        $this->resetInputs();
        $this->mount();
    }

    public function showToastr($type, $message) {
        return $this->dispatchBrowserEvent('showToastr', [
            'type'  => $type,
            'message' => $message
        ]);
    }

    public function resetInputs() {
        $this->feeSelected = null;
        $this->quantity = null;
        $this->price = null;
        $this->description = null;
    }

    public function loadOperationDetails()
    {
        $this->operationDetails = OperationDetail::orderBy('id','DESC')->where('operation_id', $this->operation)->get();
    }

    public function closeModal()
    {
        //$this->resetInput();
        //$this->reset();
        $this->dispatchBrowserEvent('close-modal');
    }

}
