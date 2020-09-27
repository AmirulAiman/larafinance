<div class="card">
    <div class="card-header">
        <h3>List of Company</h3>
        <p>Select the checkbox and click Save to join the company as Customer.</p>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label for="search">Filter: </label>
            <input class="form-control" type="text" wire:model="searchText">
        </div>
        <hr>
        <form wire:submit.prevent="save">
            <table class="table">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Company Name</td>
                        <td>Invoice Issued By</td>
                        <td>Email</td>
                    </tr>
                </thead>
                <tbody>
                @if(count($companies) > 0)
                    @foreach($companies as $company)
                        <tr>
                            <td>
                                <input
                                    wire:model="selected"
                                    type="checkbox"
                                    class="form-check-input"
                                    value="{{ $company->id }}"
                                    key="{{$company->id}}"
                                >
                            </td>
                            <td>{{ $company->company_name }}</td>
                            <td>{{ $company->users[0]->name }}</td>
                            <td>{{ $company->users[0]->email }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No companies currently available in the system.</td>
                    </tr>
                @endif
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</div>
