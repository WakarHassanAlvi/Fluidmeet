<div class="card my-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
    <form action="{{route('company.search')}}" method="get">
        @csrf
        @method('GET')
            <div class="input-group">
                <input type="text" name="search_company" id="search_company" class="form-control" placeholder="Search Company">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </div>
        </form>
    </div>
  </div>