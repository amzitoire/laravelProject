<li class="nav-item">
    <a href="{{ route('myUsers.index') }}"
       class="nav-link {{ Request::is('myUsers*') ? 'active' : '' }}">
        <p>My Users</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('epreuves.index') }}"
       class="nav-link {{ Request::is('epreuves*') ? 'active' : '' }}">
        <p>Epreuves</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('corrections.index') }}"
       class="nav-link {{ Request::is('corrections*') ? 'active' : '' }}">
        <p>Corrections</p>
    </a>
</li>


