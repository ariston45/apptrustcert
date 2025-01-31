{{-- <a class="dropdown-item" href="./docs/">
  Documentation
</a>
<a class="dropdown-item" href="./changelog.html">
  Changelog
</a>
<a class="dropdown-item" href="https://github.com/tabler/tabler" target="_blank" rel="noopener">
  Source code
</a> --}}

@foreach ($childs as $child)
<a href="{{ url($child->mn_slug) }}"
  @if (request()->is($child->mn_slug . '*') == true) class="dropdown-item active" @else class="dropdown-item" @endif >
  {{-- <i class="{{ $child->mn_icon_code }} nav-icon"></i> --}}
  {{-- <img src="{{ url('image/ar_items.svg') }}" class="nav-icon" alt="nav-icon"> --}}
  {{ $child->mn_title }}
</a>
@endforeach