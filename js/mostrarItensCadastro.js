document.getElementById('search-categorias').addEventListener('input', function () {
    const filter = this.value.toLowerCase();
    const categorias = document.querySelectorAll('.categoria-item');

    categorias.forEach(categoria => {
        const text = categoria.textContent.toLowerCase();
        categoria.style.display = text.includes(filter) ? 'block' : 'none';
    });
});