<div >
    <x-slot name="title">{{ __('Employee') }}</x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('') }}
        </h2>
        <div class="max-w-6xl  py-10 sm:px-6 lg:px-8">
            <div class="flex mb-8 w-1/12" 

            >
                <a id="btnCreate" href="{{ route('emp.create') }}"  class="  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Create') }}</span>
                </a>

                {{-- <a id="btnCreate" href="{{ route('emp.create') }}"  class=" ml-5  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Excel') }}</span>
                </a> --}}
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>

            {{-- <div class="w-1/3 mb-5">
                <x-input1  type="text" wire:model.debounce.500ms="search" placeholder="{{ __('Search') }}"/>
            </div> --}}

          

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
                                                
                                                <x-table.heading.heading class="text-center">{{ __('Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('English Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('Role') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('Gender') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('Date Of Birth') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center">{{ __('Phone') }}</x-table.heading.heading>

                                                <x-table.heading.heading class="text-center">{{ __('Salary') }}</x-table.heading.heading>

                                                <x-table.heading.heading class="text-center">{{ __('Action') }}</x-table.heading.heading>

                                            </x-slot>
                
                                            <x-slot name="body">
                                                @php
                                                    $i=1
                                                @endphp
                                                @forelse ($emps as $s)
                                                    <x-table.row.row class="text-center">
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                        
                                                        <x-table.cell.cell>{{ $s->name_kh }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->name_en }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->role }}</x-table.cell.cell>
                                                        <x-table.cell.cell>@if($s->gender == 1) {{ __('Male') }} @else {{ __('Female') }} @endif</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->dob }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->phone }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $s->salary }}</x-table.cell.cell>

                                            

                                                        
                                                        
                                                        <x-table.cell.cell>


                                                            <div class="flex justify-between">
                                                                <div>
                                                                    <a href="{{ route('emp.edit',$s->id) }}"  class="focus:border-transparent " >
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 hover:text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                          </svg>
                                                                    </a>
                                                                </div>

                                                                
                                                                <div>
                                                                                                                       
                                                                <button wire:loading.attr="disabled" wire:click.prevent="deleteConfirm({{ $s->id }})">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 hover:text-red-700 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                                </button>
                                                                </div>
                                                            </div>

                                                                                                                            
                                 
        


                                                        </x-table.cell.cell>

                                                     </x-table.row.row>

                                                     
                                                     @empty

                                                     <x-table.cell.cell colspan="12" class="text-center bg-gray-200 dark:bg-gray-800 dark:text-white" >No data !</x-table.cell.cell>
                                                  


                                                 @endforelse  
                                                                                        
                                            </x-slot>
                                           
                                        </x-table.table>

                                    </div>
                                    {{-- <div class="mt-10">
                                        {{ $st->links('custom-pagination-links-view') }}     
                                    </div> --}}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>




</div>




