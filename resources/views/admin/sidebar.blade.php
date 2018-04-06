<div class="col-md-3">
    <div class="card" id="sidebarCard">
        <div class="card-header">
            Sidebar
        </div>

        <div class="card-body">
            <ul  role="tablist">
                <li role="presentation">
                    <a href="{{ url('/home') }}">
                        Home
                    </a>
                </li>
                @can('index', App\User::class)
                <li role="presentation">
                    <a href="{{ url('/admin/users') }}">
                        Users
                    </a>
                </li>
                @endcan
                @can('fullAccess', App\Privilege::class)
                <li role="presentation">
                    <a href="{{ url('/admin/section') }}">
                        Policies groups
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/privileges') }}">
                        Roles
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/admin/policies') }}">
                        Policies
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
