<div>
    <x-slot name="title">{{ __('Time') }}</x-slot>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Time') }}
        </h2>

        <div class="py-4 px-6 ">
            <div class="grid grid-cols-12 gap-6 ">
                <div class="col-span-12 sm:col-span-5 shadow-md rounded-md px-4 py-2 dark:bg-gray-200 h-48">
                
                    <div class="grid col-span-12 gap-6">
                        <form wire:submit.prevent="{{ $text=='Save'?'saveSection':'updateSection' }}">
                        <div class="col-start-12">
                           
                                <label for="">{{ __('Time') }}</label>
                                <x-input1 wire:model.debounce.500ms="name" type="text"/>
        
                                
        
                                
                            
                        </div>
                        <div class="col-span-12">
                            <div class="flex justify-end mt-5">

                                <div>
                                    <x-purple-button  type="submit"  wire:loading.attr="disabled"  class=" mb-5 ">{{ __($text) }}
                                    </x-purple-button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>

                </div>

                <div class="col-span-12 sm:col-span-7 shadow-md rounded-md  dark:bg-gray-200  ">
                    <x-table.table class=" w-full h-48 ">
                        <x-slot name="header">
                            <x-table.heading.heading class="text-center  bg-gray-100">#</x-table.heading.heading>
                            
                            <x-table.heading.heading class="text-center  bg-gray-100">{{ __('Time') }}</x-table.heading.heading>
                            

                            
                            <x-table.heading.heading class="text-center  bg-gray-100">{{ __('Action') }}</x-table.heading.heading>

                        </x-slot>

                        <x-slot name="body">
                            @php
                                $i=1
                            @endphp
                            @forelse ($sections as $s)
                                <x-table.row.row class="text-center">
                                    <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                    
                                    <x-table.cell.cell>{{ $s->name }}</x-table.cell.cell>

                                  

                        

                                    
                                    
                                    <x-table.cell.cell>
                                        <button wire:click="Edit({{ $s->id }})" class="focus:border-transparent focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 hover:text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                              </svg>
                                        </button>
                                        
                                        <button class="focus:outline-none" wire:loading.attr="disabled" wire:click.prevent="deleteConfirm({{ $s->id }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 hover:text-red-700 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg>
                                        </button>
                                    </x-table.cell.cell>
                                 </x-table.row.row>
                             @empty
                                 <x-table.row.row >
                                    <x-table.cell.cell colspan="4"  class="bg-gray-200 text-center ">{{ __('No Data!') }}</x-table.cell.cell>
                                 </x-table.row.row>
                              @endforelse
                                                                    
                        </x-slot>

                    </x-table.table>
                    <div>
                        
                        {{ $sections->links('custom-pagination-links-view') }}     
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>
