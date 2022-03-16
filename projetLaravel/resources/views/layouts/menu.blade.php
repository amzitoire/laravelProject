<li class="nav-item">
    <a href="{{ route('myUsers.index') }}"
       class="nav-link {{ Request::is('myUsers*') ? 'active' : '' }}">
        <p>My Users</p>
    </a>
</li>


