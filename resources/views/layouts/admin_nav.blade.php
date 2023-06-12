<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{url('dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tutorial" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Tutorials</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tutorial" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('tutorial')}}">
          <i class="bi bi-circle"></i><span>All Tutorials</span>
        </a>
      </li>
      <li>
        <a href="{{url('tutorial/create')}}">
          <i class="bi bi-circle"></i><span>Add Tutorial </span>
        </a>
      </li>
      <li>
        <a href="{{url('tutorialepisode')}}">
          <i class="bi bi-circle"></i><span>All Tutorial Videos</span>
        </a>
      </li>
      <li>
        <a href="{{url('tutorialepisode/create')}}">
          <i class="bi bi-circle"></i><span>Add Tutorial Video</span>
        </a>
      </li>
   
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#review" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Reviews</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="review" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('review')}}">
          <i class="bi bi-circle"></i><span>All Reviews</span>
        </a>
      </li>
      
   
    </ul>
  </li>

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#user" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>User</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="user" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('user')}}">
          <i class="bi bi-circle"></i><span>All Users</span>
        </a>
      </li>
      <li>
        <a href="{{url('user/create')}}">
          <i class="bi bi-circle"></i><span>Add New </span>
        </a>
      </li>
      
   
    </ul>
  </li>
  -->
 
 

</ul>

</aside>
