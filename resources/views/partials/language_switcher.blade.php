@foreach ($available_locales as $locale_name => $available_locale)
    @if ($available_locale === $current_locale)
        <li class="nav-item ">
            <a class="nav-link" href="language/{{ $available_locale }}" onclick="switchLang()">
                @if ($current_locale === 'ar')
                    <img src="{{ asset('img/flag/sa.png') }}">
                    {{ $locale_name }}
                @else
                    <img src="{{ asset('img/flag/us.png') }}">
                    {{ $locale_name }}
                @endif
            </a>
        </li>
    @else
        <li class="nav-item ">
            <a class="nav-link" href="language/{{ $available_locale }}" onclick="switchLang()">
                @if ($available_locale === 'ar')
                    <img src="{{ asset('img/flag/sa.png') }}">
                    {{ $locale_name }}
                @else
                    <img src="{{ asset('img/flag/us.png') }}">
                    {{ $locale_name }}
                @endif
            </a>
        </li>
    @endif
@endforeach
