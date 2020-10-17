@section('scripts')
        @parent
        <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>
        <script src="{{asset('js/mapInput.js')}}"></script>
@stop