 <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 220px; height: 100vh; position: fixed;">
            <h4 class="text-center mb-4">IMS</h4>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-white d-flex align-items-center py-3">
                        Home
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user-list.index') }}" class="nav-link text-white d-flex align-items-center py-3">
                        All Users
                    </a>
                </li>

             
                <li>
                       <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                              <a href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();" class="nav-link text-white d-flex align-items-center py-3">
                       Logout

                         </a>
                        </form>
                </li>
            </ul>
        </div>