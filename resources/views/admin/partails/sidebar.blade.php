<ul class="nav sidebar_nav flex-column text-center sticky-top pt-5">
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.hero') ? 'active' : '' }}" href="{{ route('admin.hero') }}">Hero</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.about') ? 'active' : '' }}" href="{{ route('admin.about') }}">About</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.social') ? 'active' : '' }}" href="{{ route('admin.social') }}">Social</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.experience') ? 'active' : '' }} {{ Route::is('admin.experience.edit') ? 'active' : '' }}" href="{{ route('admin.experience') }}">Experience</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.education') ? 'active' : '' }} {{ Route::is('admin.education.edit') ? 'active' : '' }}" href="{{ route('admin.education') }}">Education</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.skill') ? 'active' : '' }} {{ Route::is('admin.skill.edit') ? 'active' : '' }}" href="{{ route('admin.skill') }}">Skill</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.language') ? 'active' : '' }} {{ Route::is('admin.language.edit') ? 'active' : '' }}" href="{{ route('admin.language') }}">Language</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.project') ? 'active' : '' }} {{ Route::is('admin.project.edit') ? 'active' : '' }}" href="{{ route('admin.project') }}">Project</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Route::is('admin.contact') ? 'active' : '' }} {{ Route::is('admin.contact.view') ? 'active' : '' }}" href="{{ route('admin.contact') }}">Contact 
            @php
                $contactCount = \Illuminate\Support\Facades\DB::table('contacts')->where('is_read', 0)->count();
            @endphp
            <span class="badge text-bg-secondary">{{ $contactCount }}</span>
        </a>
    </li>
</ul>
