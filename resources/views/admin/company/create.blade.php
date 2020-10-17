<x-admin-master>

    @section('content')

        <h1>Create a Company</h1>   

<form action="{{route('company.store')}}" method="post" enctype="multipart/form-data">
            @csrf<!-- directive to stop cross site forgery -->

            <div class="form-group">
                <label for="name"><strong>Name</strong></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" aria-describedby="" placeholder="Company Name">
            </div>
            @error('name')
                <span><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" aria-describedby="" placeholder="Email">
            </div>
            @error('email')
                <span><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="contact"><strong>Contact</strong></label>
                <input type="text" name="contact" id="contact" class="form-control @error('contact') is-invalid @enderror" aria-describedby="" placeholder="Contact">
            </div>
            @error('contact')
                <span><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="file"><strong>Image</strong></label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <div class="form-group">
                <label for="num_employees"><strong>Number of Employees</strong></label>
                <select class="form-control @error('num_employees') is-invalid @enderror" id="num_employees" name="num_employees">
                    <option value="">Select Number of Employees</option>
                    <option value="1-20">1-20</option>
                    <option value="20-30">20-30</option>
                    <option value="30-50">30-50</option>
                    <option value="50+">50+</option>
                  </select>
            </div>
            @error('num_employees')
                <span><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="company_type"><strong>Sector</strong></label>
                <div class="radio">
                    <label><input type="radio" name="company_type" value="private" checked> Private</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="company_type" value="public"> Public</label>
                  </div>
            </div>
            @error('company_type')
                <span><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="service"><strong>Services</strong></label>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Information Technology"> Information Technology</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Hospitality"> Hospitality</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Investment"> Investment</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Travel Agency"> Travel Agency</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Financial Services"> Financial Services</label>
                </div>
            </div>
            @error('service')
                <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group mt-5">
                <label for="address"><strong>Address</strong></label>
                <input type="text" id="address-input" name="address" class="form-control map-input @error('address') is-invalid @enderror">
                <input type="hidden" name="latitude" id="address-latitude" />
                <input type="hidden" name="longitude" id="address-longitude" />
            </div>
            <div id="address-map-container" style="width:100%;height:400px; ">
                <div style="width: 100%; height: 100%" id="address-map"></div>
            </div>
            @error('address')
                <div class="mt-3"><span class="alert alert-danger"><strong>{{$message}}</strong></span></div>
            @enderror
            @error('longitude')
                <div class="mt-3"><span class="alert alert-danger"><strong>You must select the address from the dropdown list.</strong></span></div>
            @enderror

            <div class="mt-5"><button type="submit" class="btn btn-primary">Submit</button></div>




        </form>
        <!--component-->
        <x-map-script.map></x-map-script.map>

    @endsection

</x-admin-master>