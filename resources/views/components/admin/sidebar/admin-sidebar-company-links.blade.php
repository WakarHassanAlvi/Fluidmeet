<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-cog"></i>
      <span>Companies</span>
    </a>
    <div id="collapseCompany" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Companies:</h6>
        <a class="collapse-item" href="{{route('company.create')}}">Create Company</a>
      <a class="collapse-item" href="{{route('companies.index')}}">View All Companies</a>
      </div>
    </div>
  </li>