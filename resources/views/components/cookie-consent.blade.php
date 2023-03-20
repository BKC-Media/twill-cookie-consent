<div class="cookie-consent bg-black/30 fixed inset-0 w-screen h-screen">
    <div class="fixed bottom-9 inset-x-6 mx-auto z-50 bg-white max-w-6xl shadow-2xl p-6 flex items-center justify-between flex-wrap">
        <div class="cookie-consent__content w-full lg:w-1/2 mb-5 lg:mb-0">
            {!! $cookiesData->cookie_banner_description !!}
        </div>
        <div class="cookie-consent__actions w-full lg:w-1/2 flex justify-start lg:justify-end items-center gap-3">
            <span class="cookie-consent__trigger underline" id="opemSettings">Cookie instellingen</span>
            <button class="cookie-consent__button bg-green text-white px-4 py-2 rounded-lg" id="acceptAllCookies">Alle cookies accepteren</button>
        </div>
    </div>
</div>