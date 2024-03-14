<div>
    <form wire:submit="create" class="mx-auto max-w-lg rounded-lg border bg-gray-50 dark:bg-gray-800 shadow-2xl">
        <div class="flex flex-col gap-4 p-4 md:p-8">
            <h2 class="mb-4 text-2xl font-bold text-gray-800 dark:text-gray-50 md:mb-8 lg:text-3xl">
                {{ Auth::user()->name }}
            </h2>

        {{ $this->form }}

            <button type="submit" class="flex items-center justify-center gap-2 rounded-lg bg-blue-500 px-8 py-3 text-center text-sm font-semibold text-white outline-none ring-blue-300 transition duration-100 hover:bg-blue-600 focus-visible:ring active:bg-blue-700 md:text-base">


                Save Meeting
            </button>
        </div>
    </form>

    <x-filament-actions::modals />
    </div>
</div>
