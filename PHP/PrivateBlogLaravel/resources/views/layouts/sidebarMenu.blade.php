@php

    $currentUrl = Request::url();

@endphp

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link {{ $currentUrl != url('/') ? 'collapsed' : '' }}" href="{{ route('home.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ !str_contains($currentUrl, 'sections') ? 'collapsed' : '' }}" href="{{ route('sections.index') }}">
          <i class="bi bi-puzzle"></i>
          <span>Secciones</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ !str_contains($currentUrl, 'blogs') ? 'collapsed' : '' }}" href="{{ route('blogs.index') }}">
          <i class="bi bi-card-text"></i>
          <span>Blogs</span>
        </a>
      </li>

    </ul>

  </aside>