
<div  wire:poll.keep-alive>

    <div wire:offline>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Network alert!</span> Please check your internet connection.
        </div>
    </div>    

    <div class="flex justify-around  flex-col px-20 ";>
    
        <!-- Search Bar Starts -->
        <div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
            <div class="flex justify-center items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                <input wire:model.live.debounce.500ms="search" type="text" placeholder="Search..."
                    class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
            </div>
            @error('search')
                <span class="text-red-500 text-xs block mt-2">{{ $message }}</span>
            @enderror

        </div>
        <!-- Search Bar Ends -->

        <!-- Looop Starts -->
        
        <ul  role="list" class="divide-y divide-gray-2">
            @foreach($this->users as $user)
            <li wire:offline.remove wire:key="{{ $user->id }}" class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">
                        <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}</p>
                    </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                    <button wire:click="viewUser({{ $user }})" type="button" 
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                        font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
                        focus:outline-none dark:focus:ring-blue-800">View
                    </button>
                </div>
            </li>
            @endforeach
        </ul>

        @if($selectedUser)
        <x-modal name="user_details" title="View User">
            <x-slot:content>
                Name: {{$selectedUser->name}}
                <br>
                Email: {{$selectedUser->email}}
            </x-slot:content>
        </x-modal>
        @endif
        <!-- Loop Ends -->
    </div>
</div>


