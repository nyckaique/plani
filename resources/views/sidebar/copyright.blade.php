<div x-data="{ isOpen: false }" x-init="
        const sidebar = document.querySelector('.fi-sidebar');
        const check = () => {
            isOpen = sidebar?.classList.contains('fi-sidebar-open');
        };

        // Roda inicialmente
        check();

        // Observa mudanças na sidebar
        const observer = new MutationObserver(check);
        observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
    " x-show="isOpen" x-cloak
  class="p-4 text-center text-xs text-gray-500 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700">
  Esse projeto foi desenvolvido por
  <a href="https://nycollaskaique.netlify.app" target="_blank" class="underline hover:text-primary-600">
    Nycollas Kaique
  </a>
</div>