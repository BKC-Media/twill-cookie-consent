<div class="cookie-consent bg-black/30 fixed inset-0 w-screen h-screen z-30">
    <div class="fixed bottom-9 inset-x-6 mx-auto z-50 bg-white max-w-6xl w-full shadow-2xl p-6 rounded flex items-center justify-between flex-wrap z-40">
        <div class="cookie-consent__content w-full lg:w-3/4 mb-5 lg:mb-0">
            {!! $cookiesData->cookie_banner_description !!}
        </div>
        <div class="cookie-consent__actions w-full lg:w-1/4 flex justify-start lg:justify-end items-center gap-3">
            <span class="cookie-consent__trigger underline" id="opemSettings">Cookie instellingen</span>
            <button class="cookie-consent__button bg-green text-white px-4 py-3 rounded-lg" id="acceptAllCookies">Alle cookies accepteren</button>
        </div>
    </div>
</div>