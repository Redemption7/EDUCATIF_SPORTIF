@php
    $currentLocale = session('locale', config('app.locale', 'en'));
    $localeLabels = [
        'en' => __('messages.lang_english'),
        'fr' => __('messages.lang_french'),
        'pt' => __('messages.lang_portuguese'),
        'sw' => __('messages.lang_swahili'),
    ];
@endphp
<li class="lang-dropdown-wrapper">
    <div class="lang-dropdown">
        <button type="button" class="lang-dropdown-toggle" aria-haspopup="listbox" aria-expanded="false" aria-label="{{ __('messages.nav_language') }}">
            <span class="lang-icon" aria-hidden="true">🌐</span>
            <span class="lang-current">{{ $localeLabels[$currentLocale] ?? $currentLocale }}</span>
            <span class="lang-arrow">▼</span>
        </button>
        <ul class="lang-dropdown-menu" role="listbox">
            @foreach($localeLabels as $code => $label)
                <li role="option">
                    <a href="{{ route('locale.set', $code) }}" class="{{ $code === $currentLocale ? 'active' : '' }}">
                        {{ $label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
