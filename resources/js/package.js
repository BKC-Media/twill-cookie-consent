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
            const activeNavItem = document.querySelector('.tcc__nav__item.tcc__active');

            if (activeNavItem) {
                activeNavItem.classList.remove('tcc__active');
            }

            item.classList.add('tcc__active');

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

    // Get all the cookie__title elements
    const titles = document.querySelectorAll('.tcc__cookie-title');

    // Add a click event listener to each title
    titles.forEach(title => {
        title.addEventListener('click', () => {
            // Get the corresponding content element
            const content = title.nextElementSibling;

            // if title is already active, close it
            if (title.classList.contains('active')) {
                title.classList.remove('active');
                content.classList.add('tcc__hidden');
                title.querySelector('.tcc__icon-plus').classList.remove('tcc__hidden');
                title.querySelector('.tcc__icon-min').classList.add('tcc__hidden');

            } else {
                // Toggle the visibility of the content element and its icons
                title.classList.toggle('active');
                content.classList.toggle('tcc__hidden');
                title.querySelector('.tcc__icon-plus').classList.add('tcc__hidden');
                title.querySelector('.tcc__icon-min').classList.remove('tcc__hidden');
            }
        });
    });

});