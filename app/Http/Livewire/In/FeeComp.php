<?php

namespace App\Http\Livewire\In;

use App\Models\Fee;
use Livewire\Component;
use Illuminate\Support\Str;

class FeeComp extends Component
{
    public $label, $slug, $price, $type_id, $status, $small_description, $country_id;
    public $edit_var = false, $delete_id /** get id in order to delete it */;
    public $fee_type_id, $feeTypes = [];

    public function generateSlug() {
        $this->slug = Str::slug($this->label);
    }

    public function store() {
        $this->validate([
            'label'=>'required|min:2|unique:fees,label,'.$this->country_id,
            'price'=>'nullable|numeric',
        ]);
        //dd($this->label);
        Fee::create([
            'label'         =>  $this->label,
            'slug'          =>  $this->slug,
            'price'         =>  $this->price,
            'type_id'       =>  $this->type_id,
            'small_description'=>$this->small_description,
            'status'        =>  $this->status == true ? '1' : '0'
        ]);
        $this->showToastr('success', 'Enregistrement réussi.');
        $this->reset();
    }

    public function edit($id) {
        $this->country_id = $id;
        $this->edit_var = true;
        $country = Fee::findOrFail($id);
        $this->label = $country->label;
        $this->slug = $country->slug;
        $this->status = $country->status;
        $this->small_description = $country->small_description;
    }

    public function update() {
        $this->validate(['label'=>'required|min:2|unique:fees,label,'.$this->country_id]);
        //dd($this->label);
        $country = Fee::where('id', $this->country_id)->first();
        $country->update([
            'label'=>$this->label,
            'slug'=>$this->slug,
            'small_description'=>$this->small_description,
            'status'=>$this->status == true ? '1' : '0'
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
        $country = Fee::findOrFail($this->delete_id);
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
        $fees = Fee::orderBy('label', 'ASC')->get();
        return view('livewire.in.fee-comp', compact('fees'));
    }
}
