<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <!-- Styles -->
       
    </head>
    <body class=" py-4 px-4 font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="antialiased">

            <!-- The Modal1 -->
            <x-modal name="modalOne" title="The First Modal">
                <x-slot:content>
                    <livewire:user-form  />
                </x-slot:content>
            </x-modal>

            <!-- Button To Close Modal1 -->
            <button x-data x-on:click="$dispatch('open-modal', { name : 'modalOne'})"
                type="button" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
                focus:outline-none dark:focus:ring-blue-800">Open Modal
            </button>

            <!-- The Modal2 -->
            <x-modal name="modalTwo" title="The Second Modal">
                <x-slot:content>
                   
                </x-slot:content>
            </x-modal>
            <!-- Button To Open Via The  Modal2 -->
            <button x-data x-on:click="$dispatch('open-modal', { name : 'modalTwo'})"
                type="button" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
                focus:outline-none dark:focus:ring-blue-800">Open Modal Two
            </button>

            <livewire:user-list  />
        </div>
     
    </body>
</html>
