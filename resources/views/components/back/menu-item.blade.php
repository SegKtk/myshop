@props(['route', 'sub', 'icon'])

<li class="nav-item">
  <a href="{{ redirect()->back() }}" class="nav-link ">
    <i class="

      @isset($sub)
        far fa-circle
      @endisset

      nav-icon

      @isset($icon)
        fas fa-{{ $icon }}
      @endisset

    "></i>
    <p>Seg-{{ $slot }}</p>
  </a>
</li>
