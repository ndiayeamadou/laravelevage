<div>
    <div class="profile-tab height-100-p">
        <div class="tab height-100-p">
            <ul class="nav nav-tabs customtab" role="tablist">
                <li class="nav-item">
                    <a
                        wire:click.prevent="selectTab('personal_details')"
                        class="nav-link {{ $tab == 'personal_details' ? 'active' : '' }}"
                        data-toggle="tab"
                        href="#personal_details"
                        role="tab"
                        >Détails personnels</a
                    >
                </li>
                <li class="nav-item">
                    <a
                        wire:click.prevent='selectTab("update_password")'
                        class="nav-link {{ $tab == 'update_password' ? 'active' : '' }}"
                        data-toggle="tab"
                        href="#update_password"
                        role="tab"
                        >Changement mot de passe</a
                    >
                </li>
            </ul>
            <div class="tab-content">
                <!-- Personal details Tab start -->
                <div
                    class="tab-pane fade {{ $tab == 'personal_details' ? 'active show' : '' }}"
                    id="personal_details"
                    role="tabpanel"
                >
                    <div class="pd-20">
                        <form wire:submit.prevent='updateAdminPersonalDetails()'>
                            <ul class="profile-edit-list">
                                <li class="weight-500">
                                    <h4 class="text-blue h5 mb-20">
                                        Editer mes détails personnels
                                    </h4>
                                    <div class="row justify-content-between">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input
                                                    class="form-control form-control-lg"
                                                    type="text" wire:model="name"
                                                />
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>Nom d'utilisateur</label>
                                                <input
                                                    class="form-control form-control-lg"
                                                    type="text" wire:model="username"
                                                />
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input
                                            class="form-control form-control-lg"
                                            type="email" wire:model="email"
                                        />
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Date of birth</label>
                                        <input
                                            class="form-control form-control-lg date-picker"
                                            type="text"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="d-flex">
                                            <div
                                                class="custom-control custom-radio mb-5 mr-20"
                                            >
                                                <input
                                                    type="radio"
                                                    id="customRadio4"
                                                    name="customRadio"
                                                    class="custom-control-input"
                                                />
                                                <label
                                                    class="custom-control-label weight-400"
                                                    for="customRadio4"
                                                    >Male</label
                                                >
                                            </div>
                                            <div
                                                class="custom-control custom-radio mb-5"
                                            >
                                                <input
                                                    type="radio"
                                                    id="customRadio5"
                                                    name="customRadio"
                                                    class="custom-control-input"
                                                />
                                                <label
                                                    class="custom-control-label weight-400"
                                                    for="customRadio5"
                                                    >Female</label
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select
                                            class="selectpicker form-control form-control-lg"
                                            data-style="btn-outline-secondary btn-lg"
                                            title="Not Chosen"
                                        >
                                            <option>United States</option>
                                            <option>India</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>State/Province/Region</label>
                                        <input
                                            class="form-control form-control-lg"
                                            type="text"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input
                                            class="form-control form-control-lg"
                                            type="text"
                                        />
                                    </div>
                                    <div class="form-group">
                                        <label>Adresse</label>
                                        <textarea class="form-control"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input
                                            type="submit"
                                            class="btn btn-primary"
                                            value="Modifier mes informations"
                                        />
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- Personal details Tab End -->

                <!-- Update Password Tab start -->
                <div class="tab-pane fade {{ $tab == 'update_password' ? 'active show' : '' }}"
                    id="update_password" role="tabpanel"
                >
                    <div class="pd-20 profile-task-wrap">
                        <form wire:submit.prevent='changePassword()'>
                            <ul class="profile-edit-list">
                                <li class="weight-500">
                                    <h4 class="text-blue h5 mb-20">
                                        Changer mon mot de passe
                                    </h4>
                                    <div class="row justify-content-between">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Ancien mot de passe</label>
                                                <input
                                                    class="form-control form-control-lg"
                                                    type="password" wire:model="old_password"
                                                />
                                                @error('old_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Nouveau</label>
                                                <input
                                                    class="form-control form-control-lg"
                                                    type="password" wire:model="new_password"
                                                />
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Confirmation</label>
                                                <input
                                                    class="form-control form-control-lg"
                                                    type="password" wire:model="new_password_confirmation"
                                                />
                                                @error('new_password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input
                                            type="submit"
                                            class="btn btn-primary"
                                            value="Changer mon mot de passe"
                                        />
                                    </div>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <!-- Tasks Tab End -->
            </div>
        </div>
    </div>
</div>
