<!-- resources/views/components/theme-switch.blade.php -->
<div x-data="{ darkMode: false }" x-init="darkMode = JSON.parse(localStorage.getItem('darkMode')) || false; $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))">
    <button @click="darkMode = !darkMode" class="flex items-center justify-center w-10 h-10 rounded-full focus:outline-none">
        <svg x-show="!darkMode" class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
        </svg>
        <svg x-show="darkMode" class="w-6 h-6 text-gray-100" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
        </svg>
    </button>
</div>

<script>
    // Agregar este script en el layout principal o en un archivo JS separado
    function applyTheme() {
        if (JSON.parse(localStorage.getItem('darkMode'))) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    }
    
    // Aplicar el tema al cargar la página
    applyTheme();
    
    // Observar cambios en el almacenamiento local
    window.addEventListener('storage', applyTheme);
</script>