<?php

namespace App\Http\Livewire\In;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\OperationType;

class OperationTypeComp extends Component
{
    public $label, $status, $country_id;
    public $edit_var = false, $delete_id /** get id in order to delete it */;
    public $fee_type_id, $feeTypes = [];

    public function store() {
        $this->validate([
            'label'=>'required|min:2|unique:operation_types,label,'.$this->country_id,
        ]);
        //dd($this->label);
        OperationType::create([
            'label'         =>  $this->label,
            //'status'        =>  $this->status == true ? '1' : '0'
        ]);
        $this->showToastr('success', 'Enregistrement réussi.');
        $this->reset();
    }

    public function edit($id) {
        $this->country_id = $id;
        $this->edit_var = true;
        $country = OperationType::findOrFail($id);
        $this->label = $country->label;
        //$this->status = $country->status;
    }

    public function update() {
        $this->validate(['label'=>'required|min:2|unique:operation_types,label,'.$this->country_id]);
        //dd($this->label);
        $country = OperationType::where('id', $this->country_id)->first();
        $country->update([
            'label'=>$this->label,
            //'status'=>$this->status == true ? '1' : '0'
        ]);
        $this->showToastr('success', 'Modification effectuée avec succès.');
        $this->reset();
    }

    public function setCountryID($id)
    {
        $this->delete_id = $id;
    }
    public function deleteCountry()
    {
        $country = OperationType::findOrFail($this->delete_id);
        $country->delete($this->delete_id);
        $this->showToastr('success', 'Ce frais a été supprimé avec succès.');
        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
    }

    public function cancelAction() {
        $this->reset();
    }

    public function showToastr($type, $message) {
        return $this->dispatchBrowserEvent('showToastr', [
            'type'  => $type,
            'message' => $message
        ]);
    }

    public function render()
    {
        $fees = OperationType::orderBy('label', 'ASC')->get();
        return view('livewire.in.operation-type-comp', compact('fees'));
    }
}
