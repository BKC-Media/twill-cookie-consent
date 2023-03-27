window.addEventListener('load', function () {
    const settingsButton = document.getElementById('tcc__openSettings');
    const settingsClose = document.getElementById('tcc__closeSettings');
    const modal = document.getElementById('tcc__cookieSettings');

    settingsButton.addEventListener('click', () => {
        modal.classList.toggle('tcc__hidden');
    })

    settingsClose.addEventListener('click', () => {
        modal.classList.toggle('tcc__hidden');
    })

    const navItems = document.querySelectorAll('.tcc__nav__item');

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            const id = item.getAttribute('id');
            const content = document.getElementById(id + '_content');
            const activeContent = document.querySelector('.tcc__settings__content-cat:not(.tcc__hidden)');

            activeContent.classList.add('tcc__hidden');
            content.classList.remove('tcc__hidden');
        })
    });

    // Custom toggle
    const toggleCheckbox = document.querySelectorAll('.tcc__toggle-checkbox-input');

    toggleCheckbox.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            let id = checkbox.value;
            let target = document.getElementById(id);

            if (target.classList.contains('tcc__active-preference')) {
                target.classList.remove('tcc__active-preference');
            } else {
                target.classList.add('tcc__active-preference');
            }
        })
    });

});