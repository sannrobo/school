<div x-data="{openForm:''}"  x-init="openForm=false">
    <x-slot  name="title">{{ __('Attendance Report') }}</x-slot>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Attendance Report') }}
        </h2>

            <div class="flex justify-center" 
        
            >

                {{-- <a id="btnCreate" href="{{ route('class.create') }}"  class="  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Create Class') }}</span>
                </a> --}}

                {{-- <button @click="openForm = !openForm" id="btnCreate" wire:click.prevent="addStudent"  class="focus:outline-none ml-2 cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 dark:text-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                      </svg>
                      
                    <span class="dark:text-black">{{ __('Add Student To Class') }}</span>
                </button>
                 --}}
          
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>

            <div class="mx-auto flex" >
            
            </div>

            <div class="grid grid-cols-6 gap-4">
                <div class="col-span-2">
                    <select wire:model.defer="class_id" class="mt-2 w-full px-2 py-2 rounded-md focus:bg-none border-2" name="" id="class_id">
                        <option value="">{{ __('Choose') }}</option>
                        @foreach ($classes as $c)
                         <option value="{{ $c->class_id }}">{{ $c->class_name }}--{{ $c->room_name }}--{{ $c->time }}</option>
                        @endforeach
                    </select>
    
                </div>
                <div class="col-span-2">
                    <button wire:click="search"   class="focus:outline-none ml-2 cursor-pointer mt-3 dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                          </svg>
                          
                          
                        <span class="dark:text-black">{{ __('Search') }}</span>
                    </button>
                </div>

 
            </div>

            



      
         

        <div class="flex flex-col px-6 py-4  transition">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class=" overflow-hidden border-b dark:border-transparent border-gray-200 sm:rounded-lg">
                        <div class="flex flex-col">
                            <div>
                      
                            </div>
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">
                          
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 h-screen">
                                    @if($atts)
                                    <div class="shadow-lg  overflow-hidden  sm:rounded-lg">
                    
                                        <x-table.table class="rounded-sm ">
                                            <x-slot name="header">
                                                <x-table.heading.heading class="text-center ">#</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Code') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Student Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Gender') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Present') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Total Absent') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('P') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Description') }}</x-table.heading.heading>
                        
                                 

                                            </x-slot>

                                            <x-slot name="body">
                                                @php
                                                    $i=1
                                                @endphp
                                                @foreach ($atts as $att)
                                                    @php
                                                    $students = DB::table('students')->where('status',1)->where('id',$att->student_id)->first();
                                                    @endphp
                                        
                                                    <x-table.row.row class="text-center">
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                  
                                                        <x-table.cell.cell>{{ $students->st_code }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $students->st_name_kh }}--{{ $students->st_name_en }}</x-table.cell.cell>
                                                        <x-table.cell.cell>@if($students->st_gender==1) {{ __('Male') }} @else{{ __('Male') }} @endif</x-table.cell.cell>
                                                        <x-table.cell.cell>
                                                            {{$att->Present}}
                                            
                                                            </x-table.cell.cell>

                                                            <x-table.cell.cell>
                                                                {{$att->P + $att->A}}
                                                               
                                                 
                                                                 </x-table.cell.cell>
                                                                 <x-table.cell.cell>
                                                                    {{ $att->P }}
                                                                   
                                                     
                                                                     </x-table.cell.cell>

                                                                     <x-table.cell.cell>{{ $att->desc }}</x-table.cell.cell>
                                           
                                                      
                                     
                                                    </x-table.row.row>
                                         
                                        
                                                    
                                               @endforeach
                                                                                        
                                            </x-slot>

                                        </x-table.table>

                              

                               

                                    </div>


                
                                    @endif     



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


