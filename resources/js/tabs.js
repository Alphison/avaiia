export function tabs() {
    const tab = document.querySelectorAll('.header-tab');

    if (!tab.length) return false;

    const header = document.querySelector('.admin-header');
    const tabContent = document.querySelectorAll('.tab');

    function hideTabContent(a) {
        for (let i = a; i < tabContent.length; i++) {
            tabContent[i].classList.remove('show');
            tabContent[i].classList.add('hide');
        }
    }

    hideTabContent(1);

    function showTabContent(b) {
        if (tabContent[b].classList.contains('hide')) {
            tabContent[b].classList.remove('hide');
            tabContent[b].classList.add('show');
        }
    }

    header.addEventListener('click', function(event) {
        let target = event.target;
        if (target && target.classList.contains('header-tab')) {
            for(let i = 0; i < tab.length; i++) {
                if (target == tab[i]) {
                    hideTabContent(0);
                    showTabContent(i);
                    break;
                }
            }
        }

    });
}
