    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_prof"> {{ Auth::user()->name }} </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="side-nav">
            <div> 
                <a href="{{ route('dashboard') }}" class="nav_logo"> 
                    <i class='bi bi-fire'></i> 
                    <span class="nav_logo-name">FlameSpace </span> 
                </a>
                <div class="nav_list"> 
                    <a href="{{ route('dashboard') }}" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> 
                    </a> 
                    <a href="{{ route('user') }}" class="nav_link"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">Users</span> 
                    </a> 

                    <a href="{{ route('rooms') }}" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 

                        <span class="nav_name">Rooms</span> 
                    </a> 
                    <a href="{{ route('schedules') }}" class="nav_link"> 
                        <i class='bi bi-calendar-event'></i> 
                        <span class="nav_name">Schedules</span> 
                    </a> 
                    <a href="{{ route('calendar') }}" class="nav_link"> 
                        <i class='bi bi-calendar'></i> 
                        <span class="nav_name">Calendar</span> 
                    </a>
                </div>

                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
                        
                </li>
            </div>
        </nav>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>