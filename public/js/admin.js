const adminMenuToggle = document.getElementById('adminMenuToggle');
const adminSidebar = document.getElementById('adminSidebar');

if (adminMenuToggle && adminSidebar) {
    adminMenuToggle.addEventListener('click', () => {
        const expanded = adminMenuToggle.getAttribute('aria-expanded') === 'true';
        adminMenuToggle.setAttribute('aria-expanded', String(!expanded));
        adminSidebar.classList.toggle('open');
    });
}
