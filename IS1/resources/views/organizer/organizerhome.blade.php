<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('oganizer Dashboard') }}
        </h2>
    </x-slot>
    <style>
    .container {
        display: grid;
        place-items: center;
        height: 20vh; /* Adjust the height as needed */
    }
</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in as organizer!") }}
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("What would you like to do???") }}
                    
        <!-- Inside your HTML element -->
        <div class="container">
        
        <style>
    .button-container {
        display: flex;
        justify-content: center;
    }

    .button-container a {
        display: inline-block;
        text-decoration: none;
        background-color: #343a40;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        margin-top: 10px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }

    .button-container a:hover {
        background-color: #212529;
    }
</style>

<!-- Inside your HTML element -->
<div class="button-container">
    <a href="events/create">Add Event</a>
</div>

<div class="button-container">
    <a href="#" class="btn btn-dark mt-2">View Your Events</a>
</div>

                </div>
            </div>
        </div>
    </div>
    
    
</x-app-layout>