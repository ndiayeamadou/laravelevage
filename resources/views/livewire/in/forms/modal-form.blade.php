<!-- Operation Update Modal -->
<div
    wire:ignore.self
    class="modal fade bs-example-modal-lg"
    id="updateOperationModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="myLargeModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="myLargeModalLabel">
                    Edition du suivi des semences [{{ $title }}]
                </h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-hidden="true"
                >
                    ×
                </button>
            </div>

            <div wire:loading class="text-center">
                <div class="spinner-border text-primary" role="status">
                </div> Chargement...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="updateSemence">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="">Titre</label>
                            <input type="text" wire:model.defer="title" class="form-control">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <label for="">Date d'enregistrement</label>
                                <input type="date" wire:model.defer="registration_date" class="form-control">
                                @error('registration_date') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-6">
                                <label for="">Date de récolte prévue</label>
                                <input type="date" wire:model.defer="expected_harvest_date" class="form-control">
                                @error('expected_harvest_date') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>
                        <div class="">
                            <label for="">Status</label> <span class="text text-info">(coché=Clôturé; décoché=En cours)</span>
                            <br>
                            <input type="checkbox" wire:model.defer="status" style="width: 70px;height:70px;">
                        </div>
                        <div class="col-md-12 my-3">
                            <label for="">Observation(s) Globale(s)</label>
                            <textarea wire:model.defer="observations" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

