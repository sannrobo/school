<div >
    <x-slot name="title">{{ __('Role') }}</x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Role') }}
        </h2>
        <div class="max-w-6xl  py-10 sm:px-6 lg:px-8">
            <div class="block mb-8" 

            >
                <button id="btnCreate"   wire:click="OpenModal" class="dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Create') }}</span>
                </button>
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>



            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b dark:border-transparent border-gray-200 sm:rounded-lg">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow-md overflow-hidden  sm:rounded-lg">
                                        <x-table.table>
                                            <x-slot name="header">
                                                <x-table.heading.heading class="text-center">#</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('ROLE NAME') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('Action') }}</x-table.heading.heading>
                                            </x-slot>
                
                                            <x-slot name="body">
                                                @php
                                                    $i=1
                                                @endphp
                                                @foreach ($roles as $role)
                                                    <x-table.row.row class="text-center">
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                        <x-table.cell.cell><a href="{{ route('roles.assign',$role->id) }}" class=" dark:text-white font-normal text-indigo-500 hover:underline hove:runderline-offset-1 hover:text-indigo-700 transition-all">{{$role->title }}</a></x-table.cell.cell>
                                                        
                                                        <x-table.cell.cell>
                                                            <button wire:click="Edit({{ $role->id }})" class="focus:border-transparent">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 hover:text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                  </svg>
                                                            </button>
                                                            @can('delete_role')
                                                            <button wire:loading.attr="disabled" wire:click.prevent="deleteConfirm({{ $role->id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 hover:text-red-700 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                              </svg>
                                                            </button>
                                                            @endcan('delete_role')
                                                        </x-table.cell.cell>
                                                     </x-table.row.row>
                                                 @endforeach  
                                                                                        
                                            </x-slot>
                                           
                                        </x-table.table>

                                    </div>
                                    <div class="mt-10">
                                        {{ $roles->links('custom-pagination-links-view') }}     
                                    </div>
                                </div>

                            </div>
                        </div>
                        {{-- show modal --}}
                        <x-dialog-modal wire:model.debounce.500ms="isModalOpen">
                            <x-slot  name="title">
                                {{ __('Create Role') }}
                                
                            </x-slot>
                
                            <x-slot name="content">
                             
                                <div class="mt-10" >
                                    <label class="text-base" for="rolename">{{ __('Role Name') }}</label>
                                    <x-input id="rolename" type="text" class="block w-3/4 mt-1"  autofocus  wire:model.debounce.500ms="rolename" wire:keydown.enter="saveRole" />
                                    <x-input-error for="rolename" class="mt-2" />
                                </div>
                            </x-slot>
                
                            <x-slot name="footer">
                                <x-secondary-button wire:click="$toggle('isModalOpen')" wire:loading.attr="disabled">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                
                                <x-purple-button class="ml-2" wire:click="{{ $text=='Save' ? 'saveRole':'updateRole' }}" wire:loading.attr="disabled">
                                    {{ __($text) }}
                                </x-purple-button>
                            </x-slot>
                        </x-dialog-modal>
                        {{-- end --}}
                    </div>
                </div>
            </div>

        </div>




</div>


