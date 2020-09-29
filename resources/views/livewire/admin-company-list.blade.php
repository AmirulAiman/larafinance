<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>List of Company Registered.</h3>
        <button
            type="button"
            class="btn btn-primary"
            wire:click="openModal"
        >
            <span class="fas fa-plus"></span>
        </button>
        <!-- The Modal -->
        <div wire:ignore.self  class="modal fade" id="newCompany">
            @if($edit)
                <form wire:submit.prevent="updateCompany">
                    <input type="hidden" wire:model="company_id">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Update Company</h4>
                                <button
                                    type="button"
                                    class="close"
                                    wire:click="closeModal"
                                >
                                    <span class="fas fa-times"></span>
                                </button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="company_name">Company Name: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="company_name"
                                    />
                                    @error('company_name') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="address1">Address1: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="address1"
                                    />
                                    @error('address1') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="address2">Address2: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="address2"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Postcode: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="postcode"
                                    />
                                    @error('postcode') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="city">City: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="city"
                                    />
                                    @error('city') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="state">Company Name: </label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Select state...</option>
                                        <option value="johor">Johor</option>
                                        <option value="kedah">Kedah</option>
                                        <option value="kelantan">Kelantan</option>
                                        <option value="melaka">Melaka</option>
                                        <option value="negeri sembilan">Negeri Sembilan</option>
                                        <option value="pahang">Pahang</option>
                                        <option value="penang">Penang</option>
                                        <option value="perak">Perak</option>
                                        <option value="perlis">Perlis</option>
                                        <option value="sabah">Sabah</option>
                                        <option value="sarawak">Sarawak</option>
                                        <option value="selangor">Selangor</option>
                                        <option value="terengganu">Terengganu</option>
                                        <option value="wilayah persekutuan">Wilayah Persekutuan</option>
                                    </select>
                                    @error('state') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="company_name">Person in Charge: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="name"
                                    />
                                    @error('name') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Email: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="email"
                                    />
                                    @error('email') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Username: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="username"
                                    />
                                    @error('username') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <form wire:submit.prevent="newCompany">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">New Company</h4>
                                <button
                                    type="button"
                                    class="close"
                                    wire:click="closeModal"
                                >
                                    <span class="fas fa-times"></span>
                                </button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="company_name">Company Name: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="company_name"
                                    />
                                    @error('company_name') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="address1">Address1: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="address1"
                                    />
                                    @error('address1') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="address2">Address2: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="address2"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Postcode: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="postcode"
                                    />
                                    @error('postcode') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="city">City: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="city"
                                    />
                                    @error('city') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="state">Company Name: </label>
                                    <select name="state" id="state" class="form-control">
                                        <option value="">Select state...</option>
                                        <option value="johor">Johor</option>
                                        <option value="kedah">Kedah</option>
                                        <option value="kelantan">Kelantan</option>
                                        <option value="melaka">Melaka</option>
                                        <option value="negeri sembilan">Negeri Sembilan</option>
                                        <option value="pahang">Pahang</option>
                                        <option value="penang">Penang</option>
                                        <option value="perak">Perak</option>
                                        <option value="perlis">Perlis</option>
                                        <option value="sabah">Sabah</option>
                                        <option value="sarawak">Sarawak</option>
                                        <option value="selangor">Selangor</option>
                                        <option value="terengganu">Terengganu</option>
                                        <option value="wilayah persekutuan">Wilayah Persekutuan</option>
                                    </select>
                                    @error('state') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="company_name">Person in Charge: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="name"
                                    />
                                    @error('name') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Email: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="email"
                                    />
                                    @error('email') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Username: </label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        wire:model="username"
                                    />
                                    @error('username') <span class="alert alert-danger">{{$message}}</span>@enderror
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                >Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif

        </div>
    </div>
    <div class="card-body">
        <div class="form">
            <div class="form-group">
                <label for="search">Search: </label>&nbsp;
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                    wire:model="search"
                />
            </div>
        </div>
        <hr>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Company Name</td>
                        <td>Location</td>
                        <td>Person In Charge</td>
                        <td>Email</td>
                        <td>Detail</td>
                    </tr>
                </thead>
                <tbody>
                    @if(count($companies) > 0)
                        @foreach($companies as $c)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$c->company_name}}</td>
                                <td>
                                    <p>
                                        {{$c->address1.','.$c->address2.','}}
                                        <br/>{{$c->city.','.$c->postcode.','}}
                                        <br/>{{$c->state}}
                                    </p>
                                </td>
                                <td>
                                    {{$c->users[0]->name}}
                                </td>
                                <td>
                                    {{$c->users[0]->email}}
                                </td>
                                <td>
                                    <button
                                        class="btn btn-info"
                                        type="button"
                                        wire:click="editCompany({{$c->id}})"
                                    >
                                        <span class="fas fa-info"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    window.addEventListener('closeModal',event => {
        $('#newCompany').modal('hide');
    });
    window.addEventListener('openModal',event => {
        $('#newCompany').modal('show');
    });
</script>
