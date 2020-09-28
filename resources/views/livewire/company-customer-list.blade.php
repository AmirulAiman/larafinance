<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Invoice</h3>
        <button
            class="btn btn-secondary"
            data-toggle="modal"
            data-target="#newCustomer"
        >
            <span class="fas fa-plus"></span>
        </button>
        <div wire:ignore.self  class="modal fade" id="newCustomer">
            <form wire:submit.prevent="newCustomer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">New Customer</h4>
                            <button type="button" class="close" wire:click="closeModal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name:</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" wire:model="name" required>
                                @error('name') <div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label><span style="color: red;">*</span>
                                <input type="email" class="form-control" wire:model="email" required>
                                @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                            <div class="form-group">
                                <label for="username">Username:</label><span style="color: red;">*</span>
                                <input type="text" class="form-control" wire:model="username" required>
                                @error('username') <div class="invalid-feedback">{{$message}}</div> @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="submit"
                                class="btn btn-primary"
                            >Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-body">
        <table class="table">
            <thead style="font-weight: bold;">
            <tr>
                <td>#</td>
                <td>Customer Name</td>
                <td>Email</td>
                <td>Username</td>
                <td>Password</td>
                <td>Delete</td>
            </tr>
            </thead>
            <tbody>
            @if(count($customers) > 0)
                @foreach($customers as $c)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->email }}</td>
                        <td>{{ $c->username }}</td>
                        <td>{{ $c->password_unhash }}</td>
                        <td>
                            <button class="btn btn-danger" wire:click="deleteCustomer({{$c->id}})">
                                <span class="fas fa-trash"></span>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                        No Customer Registered
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
<script>
    window.addEventListener('closeModal',event => {
       $('#newCustomer').modal('hide');
    });
    window.addEventListener('openModal',event => {
        $('#newCustomer').modal('show');
    });
</script>
