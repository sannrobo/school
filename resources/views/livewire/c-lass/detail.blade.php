<div x-data="{openForm:''}"  x-init="openForm=false">
    <x-slot  name="title">{{ __('Class Detail') }}</x-slot>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Class Detail') }}
        </h2>

        <div class="grid grid-cols-2 gap-4 shadow-lg px-4 py-6 mb-4 rounded-md">
            <div>
                <label class="text-semibold" for="">Class : {{ $room->class_name }}</label>
            </div>
            <div>
                <label class="text-semibold" for="">Room : {{ $room->room_name }}</label>
            </div>
            <div>
                <label class="text-semibold" for="">Course : {{ $course->cname }}</label>
            </div>
            <div>
                <label class="text-semibold" for="">Time : {{ $time->time }}</label>
            </div>
            <div>
                <label class="text-semibold" for="">Teacher : {{ $teacher->tname }}</label>
            </div>

            <div>
                <label class="text-semibold" for="">All Student : {{ $count }}</label>
            </div>
        </div>

            <div class="flex mb-8 " 
        
            >


                <button @click="openForm = !openForm" id="btnCreate"   class="focus:outline-none ml-2 cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 dark:text-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                      
                    <span class="dark:text-black">{{ __('Add Student To Class') }}</span>
                </button>

                <a href="{{ route('export-excel',$class_id) }}"  class="focus:outline-none ml-2 cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m6.75 12l-3-3m0 0l-3 3m3-3v6m-1.5-15H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                      </svg>
                      
                      
                    <span class="dark:text-black">{{ __('Excel') }}</span>
                </a>
                
          
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>

            



            <div @click.outside="openForm = false"
           x-show="openForm"
           x-collapse
           @is-open.window="openForm = false"
           @is-close.window="openForm = true"
            class="px-6 border-t ">
                <div class="  dark:bg-white">
                    <div class="h-80">

                    
                    <form action="" class="px-4 py-4  " wire:submit.prevent="assignStudent">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 sm:col-span-3 relative">
                                
                                    <label class="dark:text-black text-base text-black font-semibold  " for="name">{{ __('Student Name') }}</label>
                                    <x-input1 wire:model="student"  type="text" autofocus placeholder="{{ __('Search') }}"></x-input1>
                               

                               
                
                                        @if(count($studata)>0)
                                        <div class="absolute w-full  rounded-md shadow-xs py-1 bg-white ml-30">
                                            @forelse($studata as $s)
                                            <a class="z-50 block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" href="#"
                                               wire:click.prevent="getStudent({{ $s->id }}, '{{ $s->st_name_kh }}')"
                                               wire:keydown.enter="getStudent({{ $s->id }}, '{{ $s->st_name_kh }}')"
                                            >
                                                {{ $s->st_name_kh }}

                                            </a>
                                             @empty
                                        
                                            @endforelse
                                        </div>
                                        @endif

                                   
                                   
                               
                            </div>
       


                            <div class="col-span-12 sm:col-span-2">
                         
                                <x-purple-button  type="submit"  wire:loading.attr="disabled"  class=" mt-7 mr-7">{{ __('Save') }}
                                </x-purple-button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
         

        <div class="flex flex-col px-6 py-4  transition">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class=" overflow-hidden border-b dark:border-transparent border-gray-200 sm:rounded-lg">
                        <div class="flex flex-col">
                            
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">

                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 h-screen">

                                    <div class="shadow-lg  overflow-hidden  sm:rounded-lg">
                                        <x-table.table class="rounded-sm ">
                                            <x-slot name="header">
                                                <x-table.heading.heading class="text-center ">#</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Code') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Student Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('English Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Gender') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Date Of Birth') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Action') }}</x-table.heading.heading>

                                            </x-slot>

                                            <x-slot name="body">
                                                @php
                                                    $i=1
                                                @endphp
                                                @forelse ($classes as $c)
                                                    <x-table.row.row class="text-center">
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                        
                                                        <x-table.cell.cell>{{ $c->st_code }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $c->st_name_kh }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $c->st_name_en }}</x-table.cell.cell>
                                                        <x-table.cell.cell>
                                                            @if($c->st_gender==1)
                                                            
                                                                {{ __('Male') }}

                                                            @else
                                                            {{ __('Female') }}
                                                            
                                                            @endif
                                                        </x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $c->st_dob }}</x-table.cell.cell>
            
                                                        
                                                        <x-table.cell.cell>
                                                            <button wire:click="Edit({{ $c->class_id }})" class="focus:border-transparent focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 hover:text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </button>
                                                            
                                                            <button class="focus:outline-none" wire:loading.attr="disabled" wire:click.prevent="deleteConfirm({{ $c->class_id }})">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600 hover:text-red-700 dark:text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                            </button>
                                                        </x-table.cell.cell>
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

                                    {{-- {{ $classes->links('custom-pagination-links-view') }}      --}}
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

        

    </div>


</div>

