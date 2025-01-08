document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('theme-toggle');
    const body = document.body;

    if (toggleButton) {
        toggleButton.addEventListener('click', () => {
            body.classList.toggle('dark');
            toggleButton.textContent = body.classList.contains('dark') 
                ? 'Switch to Light Theme' 
                : 'Switch to Dark Theme';
        });
    } else {
        console.error('Il pulsante #theme-toggle non è stato trovato!');
    }
});