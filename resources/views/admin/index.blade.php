<x-admin-master>

    @section('content')
    
        <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

        <h3>Instructions:</h3>
        <p class="lead">1. Please select any of the options from the menu on the left.</p>
        <p class="lead">2. Please find the User Profile and Logout options by clicking the User Name OR User Picture at the top right of the screen.</p>
        <p class="lead">3. Please click on the Companies or Home Option from the left menu to see and search companies.</p>
        <br>
        <p class="lead"><strong>The following instructions are meant for Admin User only:</strong></p>
        <p class="lead">4. You can see and create Roles that would be assigned to all registered users by clicking on the Authorization->Roles link from the menu on the left.</p>
        <p class="lead">5. You can Update User Profile and attach/detach roles to users by going to the User Profile Page.</p>
        <p class="lead">6. Please click on the Companies Option on the left menu to perform CRUD opertaions on Companies.</p>

    @endsection
    
    @section('scripts')
    
              <!-- Page level plugins -->
            <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
            <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
    
                <!-- Page level custom scripts -->
            <!--<script src="{{asset('js/demo/datatables-demo.js')}}"></script>-->
            
    @endsection
    
    </x-admin-master>