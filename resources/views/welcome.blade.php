<x-layouts.app>
    <section class="grid grid-cols-1 gap-4 justify-items-center p-16">
        @auth
        
        <h2 class="mb-4 text-2xl font-bold text-gray-800 md:mb-8 lg:text-3xl">
            👉 {{ Auth::user()->name }}
        </h2>
        @endauth
        <a href="/add-meeting" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full">
            <img class="object-cover w-full rounded-t-lg h-48 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://images.unsplash.com/photo-1615326636917-94b09ddefded?q=80&w=1227&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Add New Meeting">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Add Meeting</h5>
            </div>
        </a>
        <a href="/member" class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full">
            <img class="object-cover w-full rounded-t-lg h-48 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="https://images.unsplash.com/photo-1516880711640-ef7db81be3e1?auto=format&fit=crop&q=80&w=2070&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Member Panel</h5>
            </div>
        </a>
    </section>
</x-layouts.app>
