<div >
    <x-slot name="title">{{ __('Register') }}</x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Student Register') }}
        </h2>
        <div class="max-w-6xl  py-2 sm:px-6 lg:px-8">
            <div class="block" 

            >
                {{-- <button id="btnCreate"   wire:click="OpenModal" class="dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Create') }}</span>
                </button> --}}
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

                                            <form wire:submit.prevent="saveStudent">
                                                <div class="m-5 dark:text-white text-xl font-bold">
                                                    {{ __('Student Form') }}
                                                </div>
                                                <div class="px-4 w-auto h-auto">
                                                    <div class="px-4 py-5 sm:p-6 mb-4">
                                                        <div class="grid grid-cols-12 gap-6">
                                                            <div class="col-span-12 sm:col-span-5">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="st_name_kh">{{ __('Student Name') }}</label>
                                                                <x-input1 wire:model="st_name_kh" type="text"  autofocus ></x-input1>    
                                                                            
                                                                <div class="mt-2 text-red-600">
                                                                    @error('st_name_kh')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                               
                                                            </div>
                            
                                                            <div class="col-span-12 sm:col-span-5">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="st_name_en">{{ __('English Name') }}</label>
                                                                <x-input1 wire:model="st_name_en" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('st_name_en')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-2">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="st_gender">{{ __('Gender') }}</label>
                                                                <select wire:model="st_gender" id="" class="w-full form-select border-2 border-gray-400 block mt-1 text-sm dark:border-gray-200 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-white dark:focus:shadow-outline-gray px-2 py-2 rounded-md">
                                                                    <option selected value="">{{ __('Choose') }}</option>
                                                                    <option value="1">{{ __('Male') }}</option>
                                                                    <option value="0">{{ __('Female') }}</option>
                                                                </select>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('st_gender')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-6">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="st_dob">{{ __('Date Of Birth') }}</label>
                                                                <x-input1 wire:model="st_dob" type="date" ></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('st_dob')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-6">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="st_phone">{{ __('Phone') }}</label>
                                                                <x-input1 wire:model="st_phone" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('st_phone')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-span-12 sm:col-span-12">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="st_address">{{ __('Address') }}</label>
                                                                <x-input1 wire:model="st_address" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('st_address')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-span-12 ">
                                                                <hr>
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="mt_name_kh">{{ __('Mother Name') }}</label>
                                                                <x-input1 wire:model="mt_name_kh" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('mt_name_kh')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="mt_name_en">{{ __('English Name') }}</label>
                                                                <x-input1 wire:model="mt_name_en" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('mt_name_en')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="mt_job">{{ __('Occupation') }}</label>
                                                                <x-input1 wire:model="mt_job" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('mt_job')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="mt_phone">{{ __('Phone') }}</label>
                                                                <x-input1 wire:model="mt_phone" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('mt_phone')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-span-12 ">
                                                                <hr>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="ft_name_kh">{{ __('Father Name') }}</label>
                                                                <x-input1 wire:model="ft_name_kh" type="text"></x-input1>
                                                                <div class="mt-2 text-red-600">
                                                                    @error('ft_name_kh')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="ft_name_en">{{ __('English Name') }}</label>
                                                                <x-input1 wire:model="ft_name_en" type="text"></x-input1>
                                                                <div class="ft-2 text-red-600">
                                                                    @error('ft_name_en')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="ft_job">{{ __('Occupation') }}</label>
                                                                <x-input1 wire:model="ft_job" type="text"></x-input1>
                                                                <div class="ft-2 text-red-600">
                                                                    @error('ft_job')<span class="error">{{ __($message) }}</span> @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-span-12 sm:col-span-4">
                                                                <label class="dark:text-white text-base text-black font-semibold" for="ft_phone">{{ __('Phone') }}</label>
                                                                <x-input1 wire:model="ft_phone" type="text"></x-input1>
                                                                <div class="ft-2 text-red-600">
                                                                    @error('ft_phone')<span class="error">{{ __($message) }}</span> @enderror
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



