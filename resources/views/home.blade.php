<x-home-master>

  @section('content')
  
  <h1 class="my-4">List of all Registered Companies</h1>

  @if(count($companies)>0)

    @foreach ($companies as $company)
        <!-- Blog Post -->
        <div class="card mb-4">
        <img class="card-img-top" src="{{$company->image}}" alt="Card image cap">
          <div class="card-body">
          <h2 class="card-title">{{$company->name}}</h2>
          <p class="card-text">{{$company->email}}</p>
          <p class="card-text">{{$company->contact}}</p>
          <p class="card-text">{{Str::limit($company->address, 100, '...')}}</p>
            <a href="{{route('company.view', $company->id)}}" class="btn btn-primary">View Details &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Created {{$company->created_at->diffForHumans()}}
            <!--<a href="#">Start Bootstrap</a>-->
          </div>
        </div>
    @endforeach

    @else
        <h4 class="alert alert-danger">No companies found.</h4>
    @endif

    <!-- Pagination -->
    <ul class="pagination justify-content-center mb-4">
      <li class="page-item">
        <a class="page-link" href="#">&larr; Older</a>
      </li>
      <li class="page-item disabled">
        <a class="page-link" href="#">Newer &rarr;</a>
      </li>
    </ul>

    <div class="d-flex">
      <div class="mx-auto">
          {{$companies->links("pagination::bootstrap-4")}}<!-- pagination links on view -->
          <!-- To find the code for this, execute php artisan vendor:publish -->
      </div>
    </div>
  
  @endsection
  
  </x-home-master>