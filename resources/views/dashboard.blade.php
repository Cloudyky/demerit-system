<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if (session('login_message'))
        <div class="py-7" id="message-container">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        {{ session('login_message') }}
                    </div>
                </div>
            </div>
        </div>

        <script>
            setTimeout(() => {
                const messageContainer = document.getElementById('message-container');
                if (messageContainer) {
                    messageContainer.remove();
                }
            }, 3000);
        </script>
    @endif

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="">
                        <b>Sistem Merit Demerit KV'DSAZI</b>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="quick-action">
                        Quick Action
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
