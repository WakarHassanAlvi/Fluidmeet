<x-admin-master>

    @section('content')
     
        <h1>Users</h1>

        @if(session('user_deleted'))
          <div class="alert alert-danger">{{session('user_deleted')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users Table</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="users-table" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>Registered Date</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                      <th>Avatar</th>
                      <th>Name</th>
                      <th>Registered Date</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach ($users as $user)
                    
                      <tr>
                        <td>{{$user->id}}</td>
                        <td>
                            <img height="50px" src="{{$user->avatar}}" alt="">
                        </td>
                        <td><a href="{{route('user.profile.show', $user)}}">{{$user->name}}</a></td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td>
                            <form action="{{route('user.destroy', $user->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                      </tr>

                      @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

    @endsection


    @section('scripts')

          <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
        <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
        
    @endsection

</x-admin-master>