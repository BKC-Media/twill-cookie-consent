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
        <div class="cookie-consent__settings bg-white w-full max-w-4xl p-8 rounded shadow-2xl z-50 flex flex-col">
            <div class="settings__header w-full flex items-center justify-end">
                <span class="cursor-pointer" id="closeSettings">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
            </div>
            <div class="settings__body flex items-start justify-between gap-6">
                <div class="settings__nav flex flex-col w-2/6">
                    <div class="nav__item cursor-pointer mb-4 flex flex-row justify-between items-center">
                        <span class="text-sm">{{ $cookiesData->settings_title }}</span>
                    </div>
                    @foreach($cookiesBlocks as $block)

                        <div class="nav__item cursor-pointer mb-4 flex flex-row justify-between items-center">
                            <span class="text-sm">{{ $block->input('cookie_category_name') }}</span>
                            @php($cooke_type = $block->input('cookie_type'))
                            @if($cooke_type == 'required')
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#DC2626" class="w-6 h-6 deactivated">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#DC2626" class="w-6 h-6 deactivated">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#65a30d" class="w-6 h-6 active hidden">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="settings__content w-4/6 text-sm">
                    <span class="text-xl font-bold block mb-2">{{ $cookiesData->settings_title }}</span>
                    {!! $cookiesData->settings_description !!}
                </div>
            </div>
            <div class="settings__footer flex items-center justify-between pt-6">
                <button class="cookie-consent__button bg-gray-900 font-bold text-white px-4 py-3 rounded-lg cursor-pointer" id="acceptSelectedCookies">Bevestig mijn keuze</button>
                <button class="cookie-consent__button bg-lime-600 font-bold text-white px-4 py-3 rounded-lg cursor-pointer" id="acceptAllCookies">Alle cookies accepteren</button>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener('load', function () {
        const settingsButton = document.getElementById('openSettings');
        const modal = document.getElementById('cookieSettings');

        settingsButton.addEventListener('click', () => {
            modal.classList.toggle('hidden');
        })
    });
</script>