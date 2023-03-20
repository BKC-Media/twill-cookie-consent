<div class="cookie-consent bg-black/30 fixed inset-0 w-screen h-screen z-30">
    <!--- Cookie consent banner -->
    <div class="fixed bottom-9 inset-x-6 mx-auto z-40 bg-white max-w-7xl w-full shadow-2xl p-6 rounded flex items-center justify-between flex-wrap z-40">
        <div class="cookie-consent__content w-full lg:w-4/6 mb-5 lg:mb-0">
            {!! $cookiesData->cookie_banner_description !!}
        </div>
        <div class="cookie-consent__actions w-full lg:w-2/6 flex justify-start lg:justify-end items-center gap-3">
            <span class="cookie-consent__trigger underline" id="openSettings">Cookie instellingen</span>
            <button class="cookie-consent__button bg-lime-600 font-bold text-white px-4 py-3 rounded-lg" id="acceptAllCookies">Alle cookies accepteren</button>
        </div>
    </div>

    <!--- Cookie settings modal -->
    <div class="cookie-consent__modal-bg bg-black/30 fixed inset-0 w-screen h-screen z-50 flex items-center justify-center">
        <div class="cookie-consent__settings bg-white w-full max-w-4xl p-6 rounded shadow-2xl z-50">
            <div class="settings__body flex items-start justify-between">
                <div class="settings__nav flex flex-col w-1/4">
                    <div class="nav__item">
                        <span>{{ $cookiesData->settings_title }}</span>
                    </div>
                </div>
                <div class="settings__content w-3/4 text-sm">
                    <span class="text-xl font-bold block mb-2">{{ $cookiesData->settings_title }}</span>
                    {!! $cookiesData->settings_description !!}
                </div>
            </div>
            <div class="settings__footer flex items-center justify-between pt-6">
                <button class="cookie-consent__button bg-gray-900 font-bold text-white px-4 py-3 rounded-lg" id="acceptSelectedCookies">Bevestig mijn keuze</button>
                <button class="cookie-consent__button bg-lime-600 font-bold text-white px-4 py-3 rounded-lg" id="acceptAllCookies">Alle cookies accepteren</button>
            </div>
        </div>
    </div>
</div>