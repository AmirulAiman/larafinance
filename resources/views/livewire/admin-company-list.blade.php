<div class="card">
    <div class="card-header">
        <h3>List of Company Registered.</h3>
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
                            </tr>
                        @endforeach
                    @else

                    @endif
                    <tr>

                    </tr>
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
