<link rel="stylesheet" href="{{ asset('vendor/twill-cookie-consent/package.css') }}">

<div class="cookie-consent bg-black/30 fixed inset-0 w-screen h-screen z-30">
    <!--- Cookie consent banner -->
    <div class="fixed bottom-9 inset-x-6 mx-auto z-40 bg-white max-w-7xl w-full shadow-2xl p-6 rounded flex items-center justify-between flex-wrap z-40">
        <div class="cookie-consent__content w-full lg:w-4/6 mb-5 lg:mb-0">
            {!! $cookiesData->cookie_banner_description !!}
        </div>
        <div class="cookie-consent__actions w-full lg:w-2/6 flex justify-start lg:justify-end items-center gap-3">
            <span class="cookie-consent__trigger underline cursor-pointer" id="openSettings">Cookie instellingen</span>
            <button class="cookie-consent__button bg-lime-600 font-bold text-white px-4 py-3 rounded-lg cursor-pointer" id="acceptAllCookies">Alle cookies accepteren</button>
        </div>
    </div>

    <!--- Cookie settings modal -->
    <div class="cookie-consent__modal-bg bg-black/30 fixed inset-0 w-screen hidden h-screen z-50 flex items-center justify-center" id="cookieSettings">
        <form action="{{ route('cookies.handle') }}" method="POST" class="cookie-consent__settings bg-white w-full max-w-4xl p-8 rounded shadow-2xl z-50 flex flex-col" style="height: 530px;">
            @csrf
            <div class="settings__header w-full flex items-center justify-end pb-4">
                <span class="cursor-pointer" id="closeSettings">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
            <div class="settings__body flex items-start justify-between gap-6 grow overflow-hidden">
                <div class="settings__nav flex flex-col w-2/6">
                    <div class="nav__item cursor-pointer mb-4 flex flex-row justify-between items-center" id="base">
                        <span class="text-sm">{{ $cookiesData->settings_title }}</span>
                    </div>
                    @foreach($cookiesBlocks as $block)
                        <div class="nav__item cursor-pointer mb-4 flex flex-row justify-between items-center @if($block->input('cookie_type') == 'required') active-preference @endif" id="{{ $block->getKey() }}">
                            <span class="text-sm">{{ $block->input('cookie_category_name') }}</span>
                            @if($block->input('cookie_type') == 'required')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#65a30d" class="w-6 h-6 active">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#DC2626" class="w-6 h-6 deactivated">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#65a30d" class="w-6 h-6 active">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="settings__content w-4/6 text-sm overflow-auto h-full">
                        <div class="settings__content-cat" id="base_content">
                            <span class="text-2xl font-bold block mb-3">{{ $cookiesData->settings_title }}</span>
                            {!! $cookiesData->settings_description !!}
                        </div>
                    @foreach($cookiesBlocks as $block)
                        <div class="settings__content-cat hidden" id="{{ $block->getKey() }}_content">
                            <span class="text-2xl font-bold block mb-3">{{ $block->input('cookie_category_name') }}</span>

                            @if($block->input('cookie_type') == 'required')
                                <div class="flex items-center gap-2 mb-3">
                                    <label class="flex items-center cookie--checkbox-toggle relative">
                                        <input type="checkbox" aria-label="Cookie selection" checked disabled name="faker" value="" class="hidden toggle-checkbox-input" />
                                        <span class="toggle"></span>
                                    </label>
                                    <span>Altijd actief</span>
                                </div>
                            @else
                                <label class="flex items-center cookie--checkbox-toggle relative mb-3">
                                    <input type="checkbox" name="cookie_preferences[]" aria-label="Cookie selection" value="{{ $block->getKey() }}" class="hidden toggle-checkbox-input" />
                                    <span class="toggle"></span>
                                </label>
                            @endif

                            {!! $block->input('cookie_category_text') !!}
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="settings__footer flex items-center justify-between pt-6">
                <button class="cookie-consent__button bg-gray-900 font-bold text-white px-4 py-3 rounded-lg cursor-pointer" type="submit" name="submit-action" value="acceptSelectedCookies">Bevestig mijn keuze</button>
                <button class="cookie-consent__button bg-lime-600 font-bold text-white px-4 py-3 rounded-lg cursor-pointer" type="submit" name="submit-action" value="acceptAllCookies">Alle cookies accepteren</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('vendor/twill-cookie-consent/package.js') }}"></script>

