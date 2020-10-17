<x-admin-master>

    @section('content')

        <h1>View & Edit Company</h1>   

<form action="{{route('company.update', $company->id)}}" method="post" enctype="multipart/form-data">
            @csrf<!-- directive to stop cross site forgery -->
            @method('PATCH')

            <div class="form-group">
                <label for="name"><strong>Name</strong></label>
                <input type="text" name="name" id="name" 
                value="{{$company->name}}"
                class="form-control @error('name') is-invalid @enderror" 
                aria-describedby="" 
                placeholder="Company Name">
            </div>
            @error('name')
            <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="email" id="email" 
                value="{{$company->email}}"
                class="form-control @error('email') is-invalid @enderror" 
                aria-describedby="" 
                placeholder="Email">
            </div>
            @error('email')
            <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="contact"><strong>Contact</strong></label>
                <input type="text" name="contact" id="contact" 
                value="{{$company->contact}}"
                class="form-control @error('contact') is-invalid @enderror" 
                aria-describedby="" 
                placeholder="Contact">
            </div>
            @error('contact')
            <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror


            <div class="mt-4">
                <img height="80px" class="img-profile rounded-circle" src="{{$company->image}}">
            </div>
            <div class="form-group">
                <label for="image"><strong>Image</strong></label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>
            @error('image')
            <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="num_employees"><strong>Number of Employees</strong></label>
                <select class="form-control @error('num_employees') is-invalid @enderror" id="num_employees" name="num_employees">
                    <option value="">Select Number of Employees</option>
                    <option value="1-20" {{ $company->num_employees == '1-20' ? 'selected' : '' }}>1-20</option>
                    <option value="20-30" {{ $company->num_employees == '20-30' ? 'selected' : '' }}>20-30</option>
                    <option value="30-50" {{ $company->num_employees == '30-50' ? 'selected' : '' }}>30-50</option>
                    <option value="50+" {{ $company->num_employees == '50+' ? 'selected' : '' }}>50+</option>
                  </select>
            </div>
            @error('num_employees')
            <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="company_type"><strong>Sector</strong></label>
                <div class="radio">
                    <label><input type="radio" name="company_type" value="private" {{ ($company->company_type=="private")? "checked" : "" }}> Private</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="company_type" value="public" {{ ($company->company_type=="public")? "checked" : "" }}> Public</label>
                  </div>
            </div>
            @error('company_type')
            <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror

            <div class="form-group">
                <label for="service"><strong>Services</strong></label>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Information Technology" @foreach ($services as $service) @if($service == 'Information Technology' ) checked @endif @endforeach> Information Technology</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Hospitality" @foreach ($services as $service) @if($service == 'Hospitality' ) checked @endif @endforeach> Hospitality</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Investment" @foreach ($services as $service) @if($service == 'Investment' ) checked @endif @endforeach> Investment</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Travel Agency" @foreach ($services as $service) @if($service == 'Travel Agency' ) checked @endif @endforeach> Travel Agency</label>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="service[]" value="Financial Services" @foreach ($services as $service) @if($service == 'Financial Services' ) checked @endif @endforeach> Financial Services</label>
                </div>
            </div>
            @error('service')
                <span class="alert alert-danger"><strong>{{$message}}</strong></span>
            @enderror


            <div class="form-group mt-5">
                <label for="address"><strong>Address</strong></label>
                <input type="text" id="address-input" name="address" 
                value="{{$company->address}}"
                class="form-control map-input @error('address') is-invalid @enderror">
                <input type="hidden" name="latitude" id="address-latitude" value={{$company->latitude}} />
                <input type="hidden" name="longitude" id="address-longitude" value={{$company->longitude}} />
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