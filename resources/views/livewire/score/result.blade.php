<div x-data="{openForm:''}"  x-init="openForm=false">
    <x-slot  name="title">{{ __('Result') }}</x-slot>
    <div class="container grid px-6 mx-auto bg-white">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Result') }}
        </h2>

            <div class="flex mb-8 " 

            >
            
            {{-- @can('create_class')
                <a id="btnCreate" href="{{ route('class.create') }}"  class="  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
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
                </button>
                
                @endcan --}}
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>

            



            {{-- <div @click.outside="openForm = false"
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
                            <div class="col-span-12 sm:col-span-3">
                         
                                <label class="dark:text-black text-base text-black font-semibold  " for="classid">{{ __('Class Name') }}</label>

                               
                                <select wire:model="classid" class="w-full form-select border-2 border-gray-400 block mt-1 text-sm dark:border-gray-200 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md"  >
                                    <option value="">{{ __('Choose') }}</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->class_id }}">{{ $class->class_name }}-{{ $class->room_name }}-{{ $class->time }}</option>
                                    @endforeach
                                </select>
                                <div class="mt-2 text-red-600">
                                    @error('classid')<span class="error">{{ __($message) }}</span> @enderror
                                </div>
                            </div>



                            <div class="col-span-12 sm:col-span-2">
                         
                                <x-purple-button  type="submit"  wire:loading.attr="disabled"  class=" mt-7 mr-7">{{ __('Save') }}
                                </x-purple-button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div> --}}
         
            
        <div class="flex flex-col px-6 py-4  transition">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class=" overflow-hidden border-b dark:border-transparent border-gray-200 sm:rounded-lg">
                        <div class="flex flex-col">
                            
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 ">

                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8 h-screen">
                         
                                    <div class="shadow-lg  overflow-hidden  sm:rounded-lg ">
                                        <div class="flex px-2 py-4">
                                            <div class="mr-2">
                                                <a href="{{ route('result.print',$class_id) }}" target="_blank" class="cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                                                    Print
                                                </a>
                                            </div>
                                            <div>
                                                <a href="{{ route('result.export' , $class_id) }}" target="_blank" class="cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                                                    Excel
                                                </a>
                                            </div>
                                        </div> 
                                        <x-table.table class="rounded-sm overflow-scroll w-full">
                                            <x-slot name="header">
                                                <x-table.heading.heading class="text-center ">#</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Gender') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('DOB') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Asg') }}</x-table.heading.heading>
                                 
                                                <x-table.heading.heading class="text-center ">{{ __('reading') }}</x-table.heading.heading>
                                        
                                                <x-table.heading.heading class="text-center ">{{ __('writing') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('speaking') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Grammar') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Listening') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Total') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Pass/Fail') }}</x-table.heading.heading>


                                            </x-slot>

                                            <x-slot name="body">
                                                @php
                                                    $i=1
                                                @endphp
                                                @forelse ($score as $s)
                                                @php
                                                    $student = DB::table('students')->where('id' , $s->student_id)->first(); 
                                                    $total = $s->asg + $s->reading + $s->writing +  $s->speaking +  $s->grammar;
                                                @endphp
                                                    <x-table.row.row class="text-center">
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                            
                                                        <x-table.cell.cell>{{ $student->st_name_kh }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ ($student->st_gender == 1)?'M':'F' }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $student->st_dob }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->asg }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->reading }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->writing }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->speaking }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->grammar }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $s->listening }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $total }}</x-table.cell.cell>
                                                        @if($total<120)
                                                        <x-table.cell.cell class="text-red-600">F</x-table.cell.cell>
                                                        @else
                                                        <x-table.cell.cell class="text-green-600">P</x-table.cell.cell>
                                                        @endif


                                                        {{-- <x-table.cell.cell>{{ $c->room_name }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $c->name }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $c->price }}</x-table.cell.cell>
              
                                                        <x-table.cell.cell>{{ $c->time }}</x-table.cell.cell>
                                                    
                                                        <x-table.cell.cell>{{ $c->teacher_name_kh }}</x-table.cell.cell> --}}
                                                        



                                            

                                                        
                                                        
                        
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

