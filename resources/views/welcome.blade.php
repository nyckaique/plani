<!DOCTYPE html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <title>Plani — Gestão Inteligente para PMEs</title>
    <meta name="description" content="Solução SaaS desenvolvida por Nycollas Kaique para gestão de clientes e atendimentos">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 text-gray-800 font-[Oxygen] antialiased">

    {{-- Header com menu hamburger --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 md:justify-start md:space-x-10">
                <div class="flex justify-start lg:w-0 lg:flex-1">
                    <span class="text-2xl font-bold text-indigo-900">Plani</span>
                </div>
                
                {{-- Menu Hamburguer para mobile --}}
                <div class="-mr-2 -my-2 md:hidden">
                    <button type="button" id="mobile-menu-button" class="rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                        <span class="sr-only">Abrir menu</span>
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
                
                {{-- Menu Desktop --}}
                <nav class="hidden md:flex space-x-10">
                    <a href="#diferenciais" class="text-base font-medium text-gray-500 hover:text-indigo-900">Diferenciais</a>
                    <a href="#sobre" class="text-base font-medium text-gray-500 hover:text-indigo-900">Sobre</a>
                    <a href="#tecnologia" class="text-base font-medium text-gray-500 hover:text-indigo-900">Tecnologia</a>
                </nav>
                
                <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
                    <a href="#cadastro-form" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-900 hover:bg-indigo-800">
                        Criar Conta
                    </a>
                    <a href="/admin/login" class="ml-8 whitespace-nowrap inline-flex items-center justify-center px-4 py-2 rounded-md shadow-sm text-base font-medium text-indigo-900 border border-indigo-900 bg-white hover:bg-indigo-50">
                        Login
                    </a>
                </div>
            </div>
        </div>

        {{-- Menu Mobile --}}
        <div id="mobile-menu" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right hidden md:hidden z-50">
            <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50">
                <div class="pt-5 pb-6 px-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-xl font-bold text-indigo-900">Plani</span>
                        </div>
                        <div class="-mr-2">
                            <button id="close-menu-button" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none">
                                <span class="sr-only">Fechar menu</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="mt-6">
                        <nav class="grid gap-y-8">
                            <a href="#diferenciais" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <span class="ml-3 text-base font-medium text-gray-900">Diferenciais</span>
                            </a>
                            <a href="#sobre" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <span class="ml-3 text-base font-medium text-gray-900">Sobre</span>
                            </a>
                            <a href="#tecnologia" class="-m-3 p-3 flex items-center rounded-md hover:bg-gray-50">
                                <span class="ml-3 text-base font-medium text-gray-900">Tecnologia</span>
                            </a>
                            <a href="#cadastro-form" class="-m-3 p-3 flex items-center rounded-md bg-indigo-900 hover:bg-indigo-800">
                                <span class="ml-3 text-base font-medium text-white">Criar Conta</span>
                            </a>
                            <a href="/admin/login" class="-m-3 p-3 flex items-center rounded-md  border border-indigo-900 bg-white hover:bg-indigo-50">
                                <span class="ml-3 text-base font-medium text-indigo-900">Login</span>
                            </a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="bg-white pt-16 pb-24 sm:pt-24 sm:pb-32 lg:pt-40 lg:pb-48">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-indigo-900 sm:text-5xl md:text-6xl leading-[110%] mb-3">
                        Plani
                    </h1>
                    <h2 class="text-2xl tracking-tight font-extrabold text-gray-900 sm:text-3xl md:text-4xl leading-[110%]">
                        Gestão inteligente para seu negócio
                    </h2>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Solução completa desenvolvida com Laravel e Filament para gerenciar clientes, atendimentos e processos com eficiência.
                    </p>
                    <div class="mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0">
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="#cadastro-form" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-900 hover:bg-indigo-800 md:py-4 md:text-lg md:px-10">
                                    Comece gratuitamente
                                </a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#diferenciais" class="w-full flex items-center justify-center px-8 py-3 text-base font-medium rounded-md text-indigo-900 border border-indigo-900 bg-white hover:bg-indigo-50 md:py-4 md:text-lg md:px-10">
                                    Saiba mais
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-12 relative sm:max-w-lg sm:mx-auto lg:mt-0 lg:max-w-none lg:mx-0 lg:col-span-6 lg:flex lg:items-center">
                    <div class="relative mx-auto w-full rounded-lg shadow-lg overflow-hidden">
                        <div class="absolute top-0 left-0 w-full h-full bg-indigo-900 opacity-10"></div>
                        <img class="w-full" src="{{ asset('images/plani-print-1.png')}}" alt="Dashboard do Plani">
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-4">
                            <p class="text-white text-sm">Dashboard completo com todas as métricas do seu negócio</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Diferenciais --}}
    <section id="diferenciais" class="py-20" style="background-color:rgb(243, 243, 243)">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-900 font-semibold tracking-wide uppercase">Diferenciais</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                    Por que escolher o Plani?
                </p>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 lg:mx-auto">
                    Uma solução desenvolvida com as melhores práticas de desenvolvimento web moderno.
                </p>
            </div>

            <div class="mt-20">
                <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Performance</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Arquitetura escalável com Laravel, garantindo velocidade mesmo com muitos usuários.
                            </p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Segurança</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Autenticação segura e sistema de permissões com Spatie Permission.
                            </p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                            <i class="fas fa-mobile-alt"></i>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Responsivo</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Interface adaptável que funciona perfeitamente em qualquer dispositivo.
                            </p>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-900 text-white">
                            <i class="fas fa-code"></i>
                        </div>
                        <div class="ml-16">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">Código bem estruturado</h3>
                            <p class="mt-2 text-base text-gray-500">
                                Desenvolvido com padrões de código limpo e organizado.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Sobre o projeto --}}
    <section id="sobre" class="py-20 bg-white">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="mb-12 lg:mb-0">
                    <img class="rounded-lg shadow-xl" src="{{ asset('images/plani-print-2.png')}}" alt="Informações sobre o cliente">
                </div>
                <div>
                    <h2 class="text-3xl font-extrabold text-gray-900">Case de desenvolvimento</h2>
                    <p class="mt-4 text-lg text-gray-500">
                        O Plani foi desenvolvido como um projeto completo para demonstrar habilidades em:
                    </p>
                    <ul class="mt-6 space-y-4">
                        <li class="flex">
                            <i class="fas fa-check text-indigo-900 mt-1 mr-2"></i>
                            <span class="text-gray-700">Arquitetura de software para SaaS</span>
                        </li>
                        <li class="flex">
                            <i class="fas fa-check text-indigo-900 mt-1 mr-2"></i>
                            <span class="text-gray-700">Sistema multi-tenant (multi-empresas)</span>
                        </li>
                        <li class="flex">
                            <i class="fas fa-check text-indigo-900 mt-1 mr-2"></i>
                            <span class="text-gray-700">Controle de permissões granular</span>
                        </li>
                        <li class="flex">
                            <i class="fas fa-check text-indigo-900 mt-1 mr-2"></i>
                            <span class="text-gray-700">Implementação de container Docker</span>
                        </li>
                        <li class="flex">
                            <i class="fas fa-check text-indigo-900 mt-1 mr-2"></i>
                            <span class="text-gray-700">Deploy contínuo e monitoramento</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <a href="https://github.com/nyckaique/plani" target="_blank" class="inline-flex items-center text-indigo-900 hover:text-indigo-800">
                            Veja o código no GitHub
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Tecnologias utilizadas --}}
    <section id="tecnologia" class="py-20" style="background-color: rgb(243, 243, 243)">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Tecnologias utilizadas</h2>
                <p class="mt-4 max-w-2xl text-xl text-gray-500 mx-auto">
                    A união de stacks clássicas com o moderno Filament v3
                </p>
            </div>
            
            <div class="mt-12 grid grid-cols-2 gap-8 md:grid-cols-4">
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fab fa-laravel text-4xl text-red-500"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">Laravel</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center flex-wrap">
                        <img src="{{asset('images/filament.png')}}" alt="Filament" style="width: auto; height: 50px;">
                        <span class="ml-2 text-sm font-medium text-gray-900">Filament v3</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fas fa-database text-4xl text-blue-500"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">PostgreSQL</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fab fa-php text-4xl text-purple-500"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">PHP 8</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fab fa-docker text-4xl text-blue-400"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">Docker</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fab fa-js text-4xl text-yellow-400"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">JavaScript</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fab fa-html5 text-4xl text-orange-500"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">HTML5</span>
                    </div>
                </div>
                <div class="col-span-1 flex justify-center">
                    <div class="flex items-center">
                        <i class="fab fa-css3-alt text-4xl text-blue-600"></i>
                        <span class="ml-2 text-sm font-medium text-gray-900">CSS3</span>
                    </div>
                </div>
            </div>
            
            <div class="mt-8 text-center">
                <p class="text-gray-600">
                    Além de: Tailwind CSS, Spatie Permissions, Alpine.js, Livewire.
                </p>
            </div>
        </div>
    </section>

    {{-- Depoimento --}}
    <section class="py-20 bg-indigo-900 text-white">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="text-base text-indigo-300 font-semibold tracking-wide uppercase">Case de Sucesso</h2>
                <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight sm:text-4xl">
                    O que dizem sobre meu trabalho
                </p>
            </div>
            
            <div class="mt-12 max-w-3xl mx-auto">
                <blockquote class="bg-indigo-800 p-8 rounded-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://placehold.co/100?text=JVA" alt="Cliente">
                        </div>
                        <div class="ml-4">
                            <div class="text-base font-medium text-white">João Vitor Araujo</div>
                            <div class="text-base font-medium text-indigo-200">Araujo Advocacia</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-base text-indigo-100">
                            "Nycollas desenvolveu uma landing page e blog com WordPress que superou minhas expectativas. A qualidade do trabalho e a atenção aos detalhes foram excepcionais. Recomendo fortemente!"
                        </p>
                    </div>
                </blockquote>
                <blockquote class="bg-indigo-800 p-8 rounded-lg mt-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-12 w-12 rounded-full" src="https://placehold.co/100?text=GC" alt="Cliente">
                        </div>
                        <div class="ml-4">
                            <div class="text-base font-medium text-white">Gabriel Carati</div>
                            <div class="text-base font-medium text-indigo-200">Ilustrador</div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-base text-indigo-100">
                            "Recomendo fortemente o trabalho de Nycollas! Ele foi extremamente eficiente e adaptativo ao desenvolver o meu site de portfólio. Durante todo o processo, ele soube entender minhas necessidades e trouxe soluções personalizadas que elevaram o resultado final. Fiquei muito satisfeito com o site, que agora utilizo como portfólio para mostrar meu trabalho. O profissionalismo e a atenção aos detalhes que Nycollas demonstrou realmente fazem a diferença."
                        </p>
                    </div>
                </blockquote>
            </div>
            <div class="mt-12 max-w-3xl mx-auto">
                <p class="lg:text-center">
                    <a href="https://nycollaskaique.netlify.app" target="_blank" class="bg-white w-full lg:w-fit border border-transparent rounded-md shadow px-5 py-3 inline-flex items-center justify-center text-base font-medium text-indigo-900 hover:bg-indigo-50"> 
                        Portfólio
                    </a>
                </p>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section id="cadastro" class="py-20 bg-white">
        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-indigo-900 rounded-lg shadow-xl overflow-hidden grid lg:grid-cols-2 gap-4 py-10 px-6">
                <div class="col-span-1">
                    <div class="lg:self-center">
                        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                            <span class="block">Pronto para transformar</span>
                            <span class="block">seu negócio?</span>
                        </h2>
                        <p class="mt-4 text-lg leading-6 text-indigo-200">
                            Explore o Plani com as contas de teste disponíveis no login para conhecer todas as funcionalidades. Quando estiver pronto, crie sua conta gratuita e comece a usar no mesmo instante.
                        </p>
                        <div class="md:flex items-center justify-start md:flex-1 gap-4">
                            <a href="#cadastro-form" class="text-center mt-8 w-full md:w-fit bg-white border border-transparent rounded-md shadow px-5 py-3 inline-flex items-center justify-center text-base font-medium text-indigo-900 hover:bg-indigo-50">
                                Criar conta gratuita
                            </a>
                            <a href="/admin/login" class="text-center mt-8 w-full md:w-fit bg-white border border-transparent rounded-md shadow px-5 py-3 inline-flex items-center justify-center text-base font-medium text-indigo-900 hover:bg-indigo-50">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-span-1">
                    <img class="rounded-md w-full object-cover" src="{{asset('images/plani-print-3.png')}}" alt="Demonstração do Plani">
                </div>
            </div>
        </div>
    </section>

    {{-- Formulário de Cadastro --}}
    <section id="cadastro-form" class="py-20" style="background-color: rgb(243, 243, 243)">
        <div class="max-w-md mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold text-gray-900">Criar conta gratuita</h2>
                    <p class="mt-2 text-sm text-gray-600">
                        Cadastre sua empresa e comece a usar em minutos
                    </p>
                </div>
                <form method="POST" action="{{ route('cadastro.empresa') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="empresa" class="block text-sm font-medium text-gray-700">Nome da Empresa</label>
                        <div class="mt-1">
                            <input id="empresa" name="empresa" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-900 focus:border-indigo-900 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="nome" class="block text-sm font-medium text-gray-700">Seu nome completo</label>
                        <div class="mt-1">
                            <input id="nome" name="nome" type="text" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-900 focus:border-indigo-900 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-900 focus:border-indigo-900 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-900 focus:border-indigo-900 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirme a senha</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-900 focus:border-indigo-900 sm:text-sm">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-900 hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-900">
                            Criar conta e acessar painel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Rodapé --}}
    <footer style="background-color: rgb(243, 243, 243)">
        <div class="max-w-[1400px] mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div>
                <h3 class="text-sm font-semibold text-gray-300 tracking-wider uppercase">Meus contatos</h3>
                <div class="mt-4 grid lg:grid-cols-8 gap-4">
                    <a href="https://nycollaskaique.netlify.app" target="_blank" class="col-span-1 text-base text-indigo-900 hover:text-indigo-800"> 
                        <i class="fa-solid fa-globe"></i> Portfólio 
                    </a>
                    <a href="https://github.com/nyckaique" target="_blank" class="col-span-1 text-base text-indigo-900 hover:text-indigo-800"> 
                        <i class="fab fa-github fa-lg"></i> GitHub 
                    </a>
                    <a href="https://www.linkedin.com/in/nycollaskaique/?locale=pt_BR" target="_blank" class="col-span-1 text-base text-indigo-900 hover:text-indigo-800"> 
                        <i class="fab fa-linkedin fa-lg"></i> LinkedIn
                    </a>
                    <a href="mailto:nycollas.kaique@gmail.com" class="col-span-1 text-indigo-900 hover:text-indigo-800">
                        <i class="fas fa-envelope fa-lg"></i> E-mail
                    </a>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-700 pt-8">
                <p class="text-base text-gray-400 text-center">
                    &copy; <span id="year"></span> Plani. Desenvolvido por <a href="https://nycollaskaique.netlify.app" target="_blank" class="text-indigo-900 hover:text-indigo-800">Nycollas Kaique</a>
                </p>
            </div>
        </div>
    </footer>

    {{-- JavaScript para o menu mobile --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('hidden');
            });
            
            closeMenuButton.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
            });
        });
        document.getElementById("year").innerHTML = new Date().getFullYear();
    </script>
</body>
</html>