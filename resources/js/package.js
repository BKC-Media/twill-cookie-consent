window.addEventListener('load', function () {
    const settingsButton = document.getElementById('openSettings');
    const settingsClose = document.getElementById('closeSettings');
    const modal = document.getElementById('cookieSettings');

    settingsButton.addEventListener('click', () => {
        modal.classList.toggle('hidden');
    })

    settingsClose.addEventListener('click', () => {
        modal.classList.toggle('hidden');
    })

    const navItems = document.querySelectorAll('.nav__item');

    navItems.forEach(item => {
        item.addEventListener('click', () => {
            const id = item.getAttribute('id');
            const content = document.getElementById(id + '_content');
            const activeContent = document.querySelector('.settings__content-cat:not(.hidden)');

            activeContent.classList.add('hidden');
            content.classList.remove('hidden');
        })
    });

    // Custom toggle
    const toggleCheckbox = document.querySelectorAll('.toggle-checkbox-input');

    toggleCheckbox.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            let id = checkbox.value;
            let target = document.getElementById(id);

            if (target.classList.contains('active-preference')) {
                target.classList.remove('active-preference');
            } else {
                target.classList.add('active-preference');
            }
        })
    });

});