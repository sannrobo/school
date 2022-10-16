<div >
    <x-slot name="title">{{ __('Create') }}</x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Create Class') }}
        </h2>
        <div class="max-w-6xl  py-2 sm:px-6 lg:px-8">
            <div class="flex mb-8 w-1/12" 

            >
                <a id="btnCreate" href="{{ route('class.index') }}"  class="  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 dark:text-black">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75" />
                      </svg>
                      
                        
                    <span class="dark:text-black">{{ __('Back') }}</span>
                </a>

                
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
                                         
                                            <form wire:submit.prevent="store">
                                                {{-- <div class="m-5 dark:text-white text-xl font-bold">
                                                    {{ __('Creat Form') }}
                                                </div> --}}
                                                <div class="px-4 w-auto h-auto">
                                                    <div class="px-4 py-5 sm:p-6 mb-4">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="name">{{ __('Class Name') }}</label>
                                                                <x-input1 wire:model="name" type="text"  autofocus ></x-input1>    
                                                                            
                                                                <div class="mt-2 text-red-600">
                                                                    @error('name')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                               
                                                            </div>
  


                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="roomid">{{ __('Room') }}</label>
                                                                <select wire:model="roomid" class="w-full form-select border-2 border-gray-400 block mt-1 text-sm dark:border-gray-200 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md"  >
                                                                    <option value="">{{ __('Choose') }}</option>
                                                                    @foreach ($rooms as $r)
                                                                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('roomid')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="courseid">{{ __('Course') }}</label>
                                                                <select wire:model="courseid" class="w-full form-select border-2 border-gray-400 block mt-1 text-sm dark:border-gray-200 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md"  >
                                                                    <option value="">{{ __('Choose') }}</option>
                                                                    @foreach ($courses as $c)
                                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('courseid')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>


                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="timeid">{{ __('Section') }}</label>
                                                                <select wire:model="timeid" class="w-full form-select border-2 border-gray-400 block mt-1 text-sm dark:border-gray-200 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md"  >
                                                                    <option value="">{{ __('Choose') }}</option>
                                                                    @foreach ($times as $t)
                                                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('timeid')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="teacherid">{{ __('Teacher') }}</label>
                                                                <select wire:model="teacherid" class="w-full form-select border-2 border-gray-400 block mt-1 text-sm dark:border-gray-200 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md"  >
                                                                    <option value="">{{ __('Choose') }}</option>
                                                                    @foreach ($emps as $emp)
                                                                        <option value="{{ $emp->id }}">{{ $emp->name_kh }}--{{ $emp->name_en }}</option>
                                                                    @endforeach
                                                                </select>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('teacherid')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>



                                        
                            
                                                        </div>
                                                    </div>
                                                </div>
                                              
                                                <div class="flex justify-end mt-5">

                                                    <div>
                                                        <x-purple-button  type="submit"  wire:loading.attr="disabled"  class=" mb-5 mr-7">{{ __('Save') }}
                                                        </x-purple-button>
                                                    </div>
                                                </div>
                                            </form>
                            

                                    </div>
                                    {{-- <div class="mt-10">
                                        {{ $roles->links('custom-pagination-links-view') }}     
                                    </div> --}}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>




</div>




