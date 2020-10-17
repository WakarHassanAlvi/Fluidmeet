<x-admin-master>

    @section('content')
     
        <h1>All Companies</h1>

        <!--@if(Session::has('delete_success')) thats one way of doing this

            <div class="alert alert-danger">{{Session::get('delete_success')}}</div>

        @endif-->

        @if(session('delete_success'))
            <div class="alert alert-danger">{{session('delete_success')}}</div>
            @elseif(session('create_success'))
            <div class="alert alert-success">{{session('create_success')}}</div>
            @elseif(session('update_success'))
            <div class="alert alert-success">{{session('update_success')}}</div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List of all Companies</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Posted</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>Image</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Posted</th>
                      <th>Updated At</th>
                      <th>Delete</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    @foreach ($companies as $company)
                    
                      <tr>
                        <td>
                            <div><img height="40px" src="{{$company->image}}" alt=""></div>
                        </td>
                        <td>
                            <a href="{{route('company.edit', $company->id)}}">{{$company->name}}</a>
                        </td>
                        <td>
                            {{$company->email}}
                        </td>
                        <td>
                            {{$company->contact}}
                        </td>
                        <td>
                            {{$company->created_at->diffForHumans()}}
                        </td>
                        <td>
                            {{$company->updated_at->diffForHumans()}}
                        </td>
                        <td>
                        @can('view', $company)<!-- authrize policy usage in blade using directive -->
                            
                        <form method="post" action="{{route('company.destroy', $company->id)}}">
                                @csrf
                                @method('DELETE')<!-- covention for http protocols -->

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        @endcan
                        </td>
                      </tr>

                      @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        <div class="d-flex">
                <div class="mx-auto">
                    {{$companies->links()}}<!-- pagination links on view -->
                    <!-- To find the code for this, execute php artisan vendor:publish -->
                </div>
        </div>
    @endsection

    @section('scripts')

          <!-- Page level plugins -->
        <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

            <!-- Page level custom scripts -->
        <!--<script src="{{asset('js/demo/datatables-demo.js')}}"></script>-->
        
    @endsection

</x-admin-master>