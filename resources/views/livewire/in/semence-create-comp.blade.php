<div>
    <form wire:submit.prevent="addOperation()">
    <div class="container">
        <h5 class="text-primary text-center">Création d'une nouvelle opération</h5>
        <div class="row">
            <div class="col-md-3">
                <label for="">Date d'enregistrement</label>
                <input type="date" wire:model="registration_date" class="form-control">
                @error('registration_date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-3">
                <label for="">Type d'opération</label>
                <select name="operation_type_id" wire:model="operation_type_id" class="form-control">
                    <option value="">-- - --</option>
                    @foreach ($operationTypes as $value)
                        <option value="{{ $value->id }}">{{ $value->label }}</option>
                    @endforeach
                </select>
                @error('operation_type_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="">Quantité</label>
                <input type="text" wire:model.defer="qty_purchased" class="form-control">
                @error('qty_purchased')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="">Price</label>
                <input type="text" wire:model.defer="amount" class="form-control">
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-md-12 my-3">
                <label for="">Observation(s) Globale(s)</label>
                <textarea wire:model.defer="observations" class="form-control" rows="2"></textarea>
            </div>
        </div>
    </div>
    {{--
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">Détails</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Produit</label>
                        <select name="" id="" class="form-control">
                            <option value="" selected disabled>choisir un produit</option>
                            <option value="">choisir un produit</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="">Quantité</label>
                        <input type="text" wire.model.defer="quantity" id="" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <label for="">Prix</label>
                        <input type="text" wire.model.defer="price" id="" class="form-control">
                    </div>
                </div>
                <div class="row col-md-12 my-4">
                    <label for="">Description(s)</label>
                    <textarea wire.model.defer="description" id="" class="form-control" rows="1"></textarea>
                </div>
            </div>
        </div>
    </div>
     --}}
    <div class="row col-md-12 my-4">
        <button type="submit" class="btn btn-primary">Créer l'opération</button>
    </div>

    </form>

</div>
