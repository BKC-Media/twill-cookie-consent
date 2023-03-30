@cookieNotConsented
    <link rel="stylesheet" href="{{ asset('vendor/twill-cookie-consent/package.css') }}">

    <div class="tcc__cookie-consent tcc__bg-black/30 tcc__fixed tcc__inset-0 tcc__w-screen tcc__h-screen tcc__z-30">
        <!--- Cookie consent banner -->
        <div class="tcc__fixed tcc__bottom-9 tcc__inset-x-6 tcc__mx-auto tcc__z-40 tcc__bg-white tcc__max-w-7xl tcc__shadow-2xl tcc__p-6 tcc__rounded tcc__flex tcc__flex-col tcc__flex-wrap tcc__z-40">
            <div class="tcc__cookie-consent__content tcc__w-full tcc__lg:w-4/6 tcc__mb-5 tcc__lg:mb-0">
                {!! $cookiesData->cookie_banner_description !!}
            </div>
            <div class="tcc__-cookie-consent__actions tcc__w-full tcc__lg:w-2/6 tcc__flex tcc__items-center tcc__justify-end tcc__gap-3">
                <span class="tcc__cookie-consent__trigger tcc__underline tcc__cursor-pointer" id="tcc__openSettings">Cookie instellingen</span>
                <button class="tcc__cookie-consent__button tcc__bg-lime-600 tcc__font-bold tcc__text-white tcc__px-4 tcc__py-3 tcc__rounded-lg tcc__cursor-pointer" id="tcc__acceptAllCookies">Alle cookies accepteren</button>
            </div>
        </div>

        <!--- Cookie settings modal -->
        <div class="tcc__cookie-consent__modal-bg tcc__bg-black/30 tcc__hidden tcc__fixed tcc__inset-0 tcc__w-screen tcc__h-screen tcc__z-50 tcc__flex tcc__items-center tcc__justify-center" id="tcc__cookieSettings">
            <form action="{{ route('cookies.handle') }}" method="POST" class="tcc__cookie-consent__settings tcc__bg-white tcc__w-full tcc__max-w-4xl tcc__p-8 tcc__rounded tcc__shadow-2xl tcc__z-50 tcc__flex tcc__flex-col" style="min-height: 530px;">
                @csrf
                <div class="tcc__settings__header tcc__w-full tcc__flex tcc__items-center tcc__justify-end tcc__pb-2">
                    <span class="tcc__cursor-pointer" id="tcc__closeSettings">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tcc__w-6 tcc__h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                </div>
                <div class="tcc__settings__body tcc__flex tcc__items-start tcc__justify-between tcc__gap-6 tcc__grow tcc__overflow-hidden">
                    <div class="tcc__settings__nav tcc__flex tcc__flex-col tcc__w-2/6">
                        <div class="tcc__nav__item tcc__cursor-pointer tcc__mb-4 tcc__flex tcc__flex-row tcc__justify-between tcc__items-center" id="base">
                            <span class="tcc__text-sm">{{ $cookiesData->settings_title }}</span>
                        </div>
                        @foreach($cookiesBlocks as $block)
                            <div class="tcc__nav__item tcc__cursor-pointer tcc__mb-4 tcc__flex tcc__flex-row tcc__justify-between tcc__items-center @if($block->input('cookie_type') == 'required') tcc__active-preference @endif" id="{{ $block->getKey() }}">
                                <span class="tcc__text-sm">{{ $block->input('cookie_category_name') }}</span>
                                @if($block->input('cookie_type') == 'required')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#65a30d" class="tcc__w-6 tcc__h-6 tcc__active">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#DC2626" class="tcc__w-6 tcc__h-6 tcc__deactivated">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#65a30d" class="tcc__w-6 tcc__h-6 tcc__active">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="tcc__settings__content tcc__w-4/6 tcc__text-sm">
                            <div class="tcc__settings__content-cat" id="base_content">
                                <span class="tcc__text-2xl tcc__font-bold tcc__block tcc__mb-3">{{ $cookiesData->settings_title }}</span>
                                {!! $cookiesData->settings_description !!}
                            </div>
                        @foreach($cookiesBlocks as $block)
                            <div class="tcc__settings__content-cat tcc__hidden" id="{{ $block->getKey() }}_content">
                                <span class="tcc__text-2xl tcc__font-bold tcc__block tcc__mb-3">{{ $block->input('cookie_category_name') }}</span>

                                @if($block->input('cookie_type') == 'required')
                                    <div class="tcc__flex tcc__items-center tcc__gap-2 tcc__mb-3">
                                        <label class="tcc__flex tcc__items-center tcc__cookie--checkbox-toggle tcc__relative">
                                            <input type="checkbox" aria-label="Cookie selection" checked disabled name="faker" value="" class="tcc__hidden tcc__toggle-checkbox-input" />
                                            <span class="tcc__toggle"></span>
                                        </label>
                                        <span>Altijd actief</span>
                                    </div>
                                @else
                                    <label class="tcc__flex tcc__items-center tcc__cookie--checkbox-toggle tcc__relative tcc__mb-3">
                                        <input type="checkbox" name="cookie_preferences[]" aria-label="Cookie selection" value="{{ $block->getKey() }}" class="tcc__hidden tcc__toggle-checkbox-input" />
                                        <span class="tcc__toggle"></span>
                                    </label>
                                @endif

                                {!! $block->input('cookie_category_text') !!}

                                <div class="cookies__list">
                                    @foreach($block->children->where('type', 'cookie') as $cookie)
                                        <div class="tcc__cookie tcc__bg-slate-100 tcc__rounded tcc__p-3 tcc__mt-6 tcc__mb-3">
                                            <span class="tcc__cookie-title tcc__flex tcc__justify-between tcc__item-center tcc__cursor-pointer">
                                                <strong>{{ $cookie->input('cookie_name') }}</strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tcc__icon-plus w-6 h-6">
                                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m6-6H6" />
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tcc__icon-min tcc__hidden w-6 h-6">
                                                  <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                                </svg>
                                            </span>
                                            <div class="tcc__cookie-content tcc__text-xs tcc__hidden tcc__pt-3">
                                                {!! $cookie->input('text') !!}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="tcc__settings__footer tcc__flex tcc__items-center tcc__justify-between tcc__pt-6">
                    <button class="tcc__cookie-consent__button tcc__bg-gray-900 tcc__font-bold tcc__text-white tcc__px-4 tcc__py-3 tcc__rounded-lg tcc__cursor-pointer" type="submit" name="submit-action" value="acceptSelectedCookies">Bevestig mijn keuze</button>
                    <button class="tcc__cookie-consent__button tcc__bg-lime-600 tcc__font-bold tcc__text-white tcc__px-4 tcc__py-3 tcc__rounded-lg tcc__cursor-pointer" type="submit" name="submit-action" value="acceptAllCookies">Alle cookies accepteren</button>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('vendor/twill-cookie-consent/package.js') }}"></script>
@endcookieNotConsented

