<div>
    <div class="my-3">
        <h1 class="text-primary text-center border-bottom border-primary mb-4">
            Gestion des Frais
        </h1>
        <div class="row">
            <div class="col-md-4">
                <form @if($edit_var) wire:submit.prevent="update" @else wire:submit.prevent="store" @endif>
                    <div class="card">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <h4 class="card-title mb-0">@if($edit_var) Edition du frais @else Ajout de frais @endif</h4>
                            <a href="" class="btn btn-dark btn-sm">Retour</a>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Type de frais (optionnel)</label>
                                <select name="fee_type_id" wire:model="fee_type_id" class="form-control">
                                    <option value="-1">-- - --</option>
                                    @foreach ($feeTypes as $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach
                                </select>
                                @error('fee_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Libellé</label>
                                <input type="text" wire:model.defer="label" wire:keyup="generateSlug" class="form-control" placeholder="Entrer le libellé du frais...">
                                @error('label')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Prix Unitaire</label>
                                <input type="text" wire:model.defer="price" class="form-control">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="small_description">Petite description</label>
                                <textarea wire:model.defer="small_description" class="form-control" style="height: 80px"></textarea>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            @if($edit_var)
                            <div class="form-check form-switch">
                                <input type="checkbox" wire:model.defer="status" id="status" class="form-check-input">
                                <label for="status" class="form-check-label">Suspendre?</label>
                            </div>
                            @endif
                            @if($edit_var)
                                <a href="" wire:click.prevent="cancelAction()" class="btn btn-secondary float-right">Annuler</a>
                                <button type="submit" class="btn btn-outline-primary float-right col-5">Modifier</button>
                            @else
                                <button type="submit" class="btn btn-outline-primary float-right col-6">Enregistrer</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div><!--End col-md-4 -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-white bg-primary text-center">Liste des différentes dépenses</div>
                    <div class="card-body">
                        <!-- Simple Datatable start -->
                        <div class="card-box mb-30">
                            <div class="pd-20">
                                <h6 class="text-blue h5">Classement par ordre alphabétique</h6>
                            </div>
                            <div class="pb-20">
                                <table class="data-table table stripe hover nowrap">
                                    <thead>
                                        <tr>
                                            <th class="table-plus">Désignation</th>
                                            <th class="datatable-nosort">Etat</th>
                                            <th>Petite description</th>
                                            <th class="datatable-nosort">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($fees as $country)
                                            <tr>
                                                <td class="table-plus">{{ $country->label }}</td>
                                                <td><span class="text-white px-3 rounded py-1 fw-bold {{ $country->status == '1' ? 'bg-danger':'bg-success' }}">{{ $country->status == '1' ? 'X' : 'V' }}</span></td>
                                                <td>{{ $country->small_description }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a
                                                            class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                            href="#"
                                                            role="button"
                                                            data-toggle="dropdown"
                                                        >
                                                            <i class="dw dw-more"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                            <a class="dropdown-item" href="#"
                                                                ><i class="dw dw-eye"></i> Voir</a
                                                            >
                                                            <a class="dropdown-item" href="#" wire:click="edit({{ $country->id }})"
                                                                ><i class="dw dw-edit2"></i> Modifier</a
                                                            >
                                                            <a class="dropdown-item" href="#"
                                                                data-toggle="modal"
                                                                data-target="#confirmation-modal"
                                                                type="button"
                                                                wire:click="setCountryID({{ $country->id }})"
                                                                ><i class="dw dw-delete-3"></i> Supprimer
                                                            </a>
                                                            {{-- <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteModal" href="#"
                                                                ><i class="dw dw-delete-3"></i> Supprimer
                                                            </a> --}}
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">
                                                    <h6 class="text-warning text-bold">Aucun frais n'est actuellement enregistré dans le système.</h6>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Simple Datatable End -->
                    </div>
                </div>
            </div><!--End col-md-4 -->
        </div>
    </div>


    <!-- Confirmation modal Start -->
    <div
        class="modal fade"
        id="confirmation-modal"
        tabindex="-1"
        role="dialog"
        aria-hidden="true"
        wire:ignore.self
    >
        <div
            class="modal-dialog modal-dialog-centered"
            role="document"
        >
            <div class="modal-content">
                <div class="modal-body text-center font-18">
                    <h4 class="padding-top-30 mb-30 weight-500">
                        Êtes-vous sûr de vouloir supprimer ce pays?
                    </h4>
                    <div
                        class="padding-bottom-30 row"
                        style="max-width: 170px; margin: 0 auto"
                    >
                        <div class="col-6">
                            <button
                                type="button"
                                class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"
                            >
                                <i class="fa fa-times"></i>
                            </button>
                            NON
                        </div>
                        <div class="col-6">
                            <button
                                type="button" wire:click="deleteCountry()"
                                class="btn btn-primary border-radius-100 btn-block confirmation-btn"
                                data-dismiss="modal"
                            >
                                <i class="fa fa-check"></i>
                            </button>
                            OUI
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Confirmation Delete modal End -->

</div>


@push('scripts')
    <script>
        window.addEventListener('close-modal', function() {
            $('#confirmation-modal').modal('hide')
        })
    </script>
@endpush
