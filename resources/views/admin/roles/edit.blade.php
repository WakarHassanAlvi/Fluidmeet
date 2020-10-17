<x-admin-master>

    @section('content')
        
        <h1>Edit the Role '{{$role->name}}'</h1>

        <div class="row">
            <div class="col-sm-6">

                <form method="post" action="{{route('role.update', $role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
        
                </form>
        
            </div>
        </div>


    @endsection

</x-admin-master>