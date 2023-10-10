<div class="container-fluid">
    <!-- -->
    @include("livewire.in.forms.modal-form-operation-details")

    <div class="row bg-white mb-4 align-items-center">
        <a href="{{ url('admin/home') }}" class="btn btn-dark btn-sm">retour</a>
        <h5 class="col text-center text-primary py-2">{{ $operationData->title }}
            <i><svg width="18px" height="18px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M40.9999 27.0007L40.9999 15.0007L29 15.0007" stroke="#22b904" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 37.0002L16.3385 24.5002L26.1846 30.5002L41 15.0002" stroke="#22b904" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
            <i><svg width="20px" height="20px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M29 34.9999L41 34.9999L41 23" stroke="#ed0202" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 13L16.3385 25.5L26.1846 19.5L41 35" stroke="#ed0202" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
        </h5>
        <span class="text-orange">N°: #{{ $operationData->number }}</span><i class="mx-1">|</i>
        <span class="text-orange">{{ $operationData->quantity_purchased }}</span><i class="mx-1">></i>
        <span class="text-orange">{{ $operationData->amount }}</span><i class="mx-1">|</i>
        <span class="{{ $operationData->status == 0 ? 'text-success' : 'text-danger' }}">
            Etat : {{ $operationData->status == 0 ? 'Ouvert' : 'Fermé' }}</span><i class="mx-1">|</i>
        <span class="mr-3 text-secondary">{{ $operationData->registration_date }}</span>
    </div>
    <div class="row">
        <div class="col-md-7">
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Détails des opérations</h4>
                    <div class="row justify-content-between">
                        {{-- <h6 class="text-success">Qté Totale : {{ number_format(1000, 2) }}</h6> --}}
                        <h6 class="text-danger">Dépense Totale : {{ number_format($total_amount, 2) }}</h6>
                        {{-- <h6 class="text-success">Surface Cultivée : {{ number_format(1000, 2) }}</h6> --}}
                    </div>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Frais</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($operationDetails as $value)
                            <tr>
                                <td class="table-plus">{{ $value->fee->label }}</td>
                                <td class="table-plus">{{ $value->quantity, 2 }}</td>
                                <td class="table-plus">{{ number_format($value->price, 2) }}</td>
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
                                        <div
                                            class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
                                        >
                                            <a class="dropdown-item" href="#" wire:click="edit({{ $value->id }})"
                                                ><i class="dw dw-eye"></i> Modifier</a
                                            >
                                            <a class="dropdown-item" href="#"
                                                ><i class="dw dw-delete-3"></i> Supprimer</a
                                            >
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-orange">Aucun enregistrement trouvé.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                    @if($operationDetails)
                    {{-- <div>{{ $operationDetails->links() }}</div> --}}
                    @endif
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div><!-- Col-md-7 End -->

        <!-- -->
        <div class="row col-md-5 justify-content-between align-content-between">
            <a href="" class="btn btn-dark" data-backdrop="static" data-toggle="modal" data-target="#sellingOperationModal">
                Ajouter une entrée
                <i><svg width="20px" height="20px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M29 34.9999L41 34.9999L41 23" stroke="#ed0202" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 13L16.3385 25.5L26.1846 19.5L41 35" stroke="#ed0202" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
            </a>
            <a href="" class="disabled btn btn-light" data-backdrop="static" data-toggle="modal" data-target="#sellingOperationModal">
                Ajouter une sortie
                <i><svg width="18px" height="18px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M40.9999 27.0007L40.9999 15.0007L29 15.0007" stroke="#22b904" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 37.0002L16.3385 24.5002L26.1846 30.5002L41 15.0002" stroke="#22b904" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></i>
            </a>
            {{-- <div class="card">
                <div class="card-header">Détails</div>
                <div class="card-body">
                    <form wire:submit.prevent="addDetail()">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="feeSelected">Frais</label>
                                <select name="" wire:model="feeSelected" class="form-control">
                                    <option value="-1" selected>choisir une dépense</option>
                                    @foreach ($fees as $value)
                                        <option value="{{ $value->id }}">{{ $value->label }}</option>
                                    @endforeach
                                </select>
                                @error('feeSelected')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="">Prix Unitaire</label>
                                <input type="text" wire:model.defer="price" id="" class="form-control">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="quantity"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    title="Quantité"
                                >Quantité</label>
                                <input type="text" wire:model.defer="quantity" id="" class="form-control">
                                @error('quantity')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-md-12 my-4">
                            <label for="description">Description(s)</label>
                            <textarea wire:model.defer="description" id="" class="form-control" rows="1"></textarea>
                            @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <button type="submit" class="btn btn-primary float-end mt-3">
                            Sauvegarder les données</button>
                    </form>
                </div>
            </div> --}}
        </div>
        <!-- Col-md-5 End -->
    </div>

</div>


@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#sellingOperationModal').modal('hide')
        })
    </script>

@endpush
