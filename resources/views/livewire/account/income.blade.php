<div x-data="{openForm:''}"  x-init="openForm=false">
    <x-slot  name="title">{{ __('Income') }}</x-slot>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Income') }}
        </h2>

            <div class="flex mb-8 " 
        
            >
                {{-- <a id="btnCreate" href="{{ route('class.create') }}"  class="  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Create Class') }}</span>
                </a>

                <button @click="openForm = !openForm" id="btnCreate" wire:click.prevent="addStudent"  class="focus:outline-none ml-2 cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 dark:text-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                      
                    <span class="dark:text-black">{{ __('Add Student To Class') }}</span>
                </button> --}}
                
          
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>

        <div class="grid grid-cols-6 gap-2">
            <div class="cols-span-2">
                <x-input1 wire:model="from_date"  type="date"/>
            </div>

            <div class="cols-span-2">
                <x-input1 wire:model="to_date" type="date"/>
            </div>
        </div>


            

        <div class="flex flex-col px-6 py-4  transition">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class=" overflow-hidden border-b dark:border-transparent border-gray-200 sm:rounded-lg">
                        <div class="flex flex-col">
                            
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">

                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 h-screen">
                                    <div class="py-4 flex">
            
                                        <button  class="focus:outline-none ml-2 cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                                       
                                              
                                            <span class="dark:text-black">{{ __('Print') }}</span>
                                        </button> 

                                        <button  class="focus:outline-none ml-2 cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                                       
                                              
                                            <span class="dark:text-black">{{ __('Excel') }}</span>
                                        </button> 
                                    </div>
                                    
                                    <div class="shadow-lg  overflow-hidden  sm:rounded-lg">
                                        <x-table.table class="rounded-sm ">
                                            <x-slot name="header">
                                                <x-table.heading.heading class="text-center ">#</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Date') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Student Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Class') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Paid') }}</x-table.heading.heading>


                                            </x-slot>

                                            <x-slot name="body">
                                                @php
                                                    $i=1;
                                                    $amount=0;
                                                @endphp
                                                @forelse ($invd as $inv)
                                        
                                                    <x-table.row.row class="text-center">
                                                        @php
                                                        $amount += $inv->paid;
                                                        @endphp
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                            
                                                       
                                                        <x-table.cell.cell>{{ $inv->date }}</x-table.cell.cell>
                                                        
                                                        <x-table.cell.cell>{{ $inv->kh_name }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $inv->class_name }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $inv->paid }}</x-table.cell.cell>
              
                                                       
                                                    

                                                    </x-table.row.row>
                                                    <x-table.row.row >
                                                        <x-table.cell.cell colspan="12"   class="bg-gray-200 text-right"><span class="dark:text-blue-600">{{ __('Total') }} = ${{ $amount }}</span></x-table.cell.cell>
                                                    </x-table.row.row>
                                                @empty
                                                    <x-table.row.row >
                                                        <x-table.cell.cell colspan="12"  class="bg-gray-200 text-center ">{{ __('No Data!') }}</x-table.cell.cell>
                                                    </x-table.row.row>
                                                @endforelse
                                                                                        
                                            </x-slot>

                                        </x-table.table>


        

                                    </div>



                                </div>
                                <div class="px-6">
{{-- 
                                    {{ $classes->links('custom-pagination-links-view') }}      --}}
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        

    </div>


</div>

