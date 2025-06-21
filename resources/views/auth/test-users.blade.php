<div class="mt-4 space-y-2 text-center">
  <p class="text-sm text-gray-500">Ou preencha com um dos usuários de teste:</p>

  <div class="flex flex-wrap justify-center gap-2 mt-2">
    <button type="button" onclick="fillLogin('admin@exemplo.com')"
      style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
      class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
      Admin
    </button>

    <button type="button" onclick="fillLogin('gerente@exemplo.com')"
      style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
      class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
      Gerente
    </button>

    <button type="button" onclick="fillLogin('funcionario@exemplo.com')"
      style="--c-400:var(--primary-400);--c-500:var(--primary-500);--c-600:var(--primary-600);"
      class="fi-btn relative grid-flow-col items-center justify-center font-semibold outline-none transition duration-75 focus-visible:ring-2 rounded-lg fi-color-custom fi-btn-color-primary fi-color-primary fi-size-md fi-btn-size-md gap-1.5 px-3 py-2 text-sm inline-grid shadow-sm bg-custom-600 text-white hover:bg-custom-500 focus-visible:ring-custom-500/50 dark:bg-custom-500 dark:hover:bg-custom-400 dark:focus-visible:ring-custom-400/50 fi-ac-action fi-ac-btn-action">
      Funcionário
    </button>
  </div>
</div>

<script>
function fillLogin(email) {
  const emailInput = document.querySelector('input[type="email"]');
  const passwordInput = document.querySelector('input[type="password"]');
  if (emailInput && passwordInput) {
    emailInput.value = email;
    passwordInput.value = 'password';
    emailInput.dispatchEvent(new Event('input'));
    passwordInput.dispatchEvent(new Event('input'));
  }
}
</script>