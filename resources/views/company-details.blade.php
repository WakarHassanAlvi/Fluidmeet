<x-home-master>

    @section('content')

        <!-- Company Name -->
      <h1 class="mt-4">{{$company->name}}</h1>

        <hr>
        <p>A {{$company->company_type}} company with services offering in the following areas:</p>
        @foreach ($company->service as $key=>$service)
          <p class="mt-2">{{++$key.". ".$service}}</p>    
        @endforeach

        <hr>

        <!-- Preview Image -->
      <img class="img-fluid rounded" src="{{$company->image}}" alt="Company Image">

        <hr>
        
        <h4>Contact Us</h4>
        <!-- Company Contact Details -->
      <p>{{$company->email}}</p>
      <p>{{$company->contact}}</p>

      <hr>

      <label for="address"><strong>Address</strong></label>
      <div id="address-input" name="address" class="map-input">{{$company->address}}</div>
      <input type="hidden" name="latitude" id="address-latitude" value={{$company->latitude}} />
      <input type="hidden" name="longitude" id="address-longitude" value={{$company->longitude}} />

    <div id="address-map-container" style="width:100%;height:400px; ">
        <div style="width: 100%; height: 100%" id="address-map"></div>
    </div>

    <hr>
        <!-- Date/Time -->
      <p>This Company was created {{$company->created_at->diffForHumans()}}</p>

      <!--component-->
    <x-map-script.map></x-map-script.map>

    @endsection

</x-home-master>