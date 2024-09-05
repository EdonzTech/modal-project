
@props([ 'name', 'title'])
<div 
                 
     x-data = "{ show : false, name : '{{ $name }}' }"
     x-show = "show"
     x-on:open-modal.window = " show = ($event.detail.name === name)"
     x-on:close-modal.window = " show = false"
     x-on:keydown.escape.window = " show = false"
     style="display: none;"
     x-transition.duration.300ms
     
     
     class="fixed x-50 inset-0"
>

   
    
    <!-- The Gray Background -->
    <div x-on:click=" show = false" class="fixed inset-0 bg-gray-300 opacity-40"> </div>
    
    <!-- The Modal -->
    <div class="bg-white rounded m-auto fixed inset-0 max-w-2xl overflow-y-auto" style="max-height: 500px;">
        
        <div>
            <button x-on:click="$dispatch('close-modal')"
                type="button" 
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 
                font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
                focus:outline-none dark:focus:ring-blue-800">Open Modal
            </button>
        </div>

        @if(isset($title))
            <div class="flex justify-center py-5">
                {{ $title }}
            </div>
        @endif
        <div >
            {{ $content }}
        </div>
        
    </div>
    <!-- Modal Ends -->
   
</div>