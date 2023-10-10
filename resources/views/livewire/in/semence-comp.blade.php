<div>
    <!-- -->
    @include("livewire.in.forms.modal-form")

    <div class="container mb-3">
        <h5 class="text-primary text-center">Liste des Opérations</h5>
    </div>

    <div class="container-fluid">
        <div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                {{-- <div class="pd-20">
                    <h4 class="text-blue h4">Data Table Simple</h4>
                    <p class="mb-0">
                        you can find more options
                        <a
                            class="text-primary"
                            href="https://datatables.net/"
                            target="_blank"
                            >Click Here</a
                        >
                    </p>
                </div> --}}
                <div class="pb-20 pd-30">
                    {{-- <table class="data-table table stripe hover nowrap"> --}}
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">Titre</th>
                                <th>Quantité</th>
                                <th>Etat</th>
                                <th>Date d'enregistrement</th>
                                <th class="datatable-nosort">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($operations as $operation)
                            <tr>
                                <td class="table-plus">{{ $operation->title }}</td>
                                <td>{{ $operation->quantity_purchased }}</td>
                                {{-- <td>{{ $operation->status == '0' ? 'en cours...' : 'clôturé' }}</td> --}}
                                <td class="text-bold">
                                    @if ($operation->status == '0')
                                        <span class="text-success">en cours...</span>
                                    @else
                                        <span class="text-danger">clôturé</span>
                                    @endif
                                </td>
                                {{-- <td>{{ $operation->registration_date }}</td> --}}
                                <td>{{ \Carbon\Carbon::parse($operation->registration_date)->format('d M Y') }}</td>
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
                                            <a class="dropdown-item" href="#" wire:click="edit({{ $operation->id }})" data-toggle="modal" data-target="#updateOperationModal"
                                                ><i class="dw dw-eye"></i> Modifier</a
                                            >
                                            <a class="dropdown-item" href="{{ route('admin.operation-edit', $operation->id) }}"
                                                ><i class="dw dw-edit2"></i> Voir</a
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
                                <td colspan="6" class="text-center text-orange">Aucun enregistrement trouvé dans le système.</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
        </div>
    </div>
</div>


@push('scripts')
    <script>
        window.addEventListener('close-modal', event => {
            $('#updateOperationModal').modal('hide')
        })
    </script>

@endpush
