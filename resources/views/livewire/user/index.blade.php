<div>
    <x-slot name="title">{{ __('User') }}</x-slot>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Users') }}
        </h2>
        <div class="max-w-6xl  py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                @can('create_user')
                <button id="btnCreate" wire:click="OpenModal"
                    class="flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />

                    </svg>
                    <span>{{ __('Create') }}</span>
                </button>
                @endcan
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>



            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div
                            class="shadow overflow-hidden border-b dark:border-transparent border-gray-200 sm:rounded-lg">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow-md overflow-hidden  sm:rounded-lg">
                                            <x-table.table>
                                                <x-slot name="header">
                                                    <x-table.heading.heading class="text-center">#
                                                    </x-table.heading.heading>
                                                    <x-table.heading.heading class="text-center">{{ __('NAME') }}
                                                    </x-table.heading.heading>
                                                    <x-table.heading.heading class="text-center">{{ __('Email') }}
                                                    </x-table.heading.heading>
                                                    <x-table.heading.heading class="text-center">{{ __('ROLE NAME') }}
                                                    </x-table.heading.heading>
                                                    <x-table.heading.heading class="text-center">{{ __('Password') }}
                                                    </x-table.heading.heading>
                                                    <x-table.heading.heading class="text-center">{{ __('Action') }}
                                                    </x-table.heading.heading>
                                                </x-slot>

                                                <x-slot name="body">
                                                    @php
                                                        $i = 1;
                                                    @endphp
                                                    @foreach ($users as $user)
                                                        <x-table.row.row class="text-center">
                                                            <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                            <x-table.cell.cell>{{ $user->name }}</x-table.cell.cell>
                                                            <x-table.cell.cell>{{ $user->email }}</x-table.cell.cell>
                                                            <x-table.cell.cell>
                                                                @foreach ($user->roles as $role)
                                                                    <span>{{ $role->title }}</span>
                                                                @endforeach
                                                            </x-table.cell.cell>
                                                            <x-table.cell.cell>
                                                                 ****
                                                                 @can('update_user')
                                                                 <button class="focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" wire:click.prevent="editUserPass({{ $user->id }})" class="h-5 w-5 text-purple-600 " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                                     </svg>
                                                                </button>
                                                                @endcan
                                                            </x-table.cell.cell>
                                                            <x-table.cell.cell>
                                                                @can('update_user')                                                                  
                                                      
                                                                <button wire:click="Edit({{ $user->id }})"
                                                                    class="focus:border-transparent focus:outline-none">
                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                        class="h-5 w-5 text-green-600 hover:text-green-700 dark:text-green-500"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </button>
                                                                @endcan
                                                                @can('delete_user')
                                                                    
                                                              
                                                                    <button wire:loading.attr="disabled"
                                                                        wire:click.prevent="deleteConfirm({{ $user->id }})">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            class="focus:outline-none h-5 w-5 text-red-600 hover:text-red-700 dark:text-red-500"
                                                                            fill="none" viewBox="0 0 24 24"
                                                                            stroke="currentColor" stroke-width="2">
                                                                            <path stroke-linecap="round"
                                                                                stroke-linejoin="round"
                                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                        </svg>
                                                                    </button>
                                                                    @endcan
                                                              
                                                            </x-table.cell.cell>
                                                        </x-table.row.row>
                                                    @endforeach

                                                </x-slot>

                                            </x-table.table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-modal wire:model="isModalOpen" maxWidth="xl">
                <form wire:submit.prevent="{{($text=='Save')?'saveUser':'updateUser'}}">
                    <div class="m-5 dark:text-black text-xl font-bold">
                        {{ __('Create User') }}
                    </div>
                    <div class="px-4  overflow-y-auto sm:h-80 h-3/4">
                        <div class="px-4 py-5 sm:p-6 mb-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-3">
                                    <label for="fullname">{{ __('Full Name') }}</label>
                                    <x-input1 wire:model="fullname" type="text"  autofocus ></x-input1>    
                                                
                                    <div class="mt-2 text-red-600">
                                        @error('fullname')<span class="error">{{ __($message) }}</span> @enderror
                                    </div>
                                   
                                </div>

                                <div class="col-span-3">
                                    <label for="email">{{ __('Email') }}</label>
                                    <x-input1 wire:model="email" type="email"></x-input1>
                                    <div class="mt-2 text-red-600">
                                        @error('email')<span class="error">{{ __($message) }}</span> @enderror
                                    </div>
                                </div>

                                @if(!$updatePass)
                                <div class="col-span-3 relative">
                                    <label for="password">{{ __('Password') }}</label>
                                    <x-input1 wire:model="password" type="{{$show==true?'text':'password'}}"></x-input1>
                                    <button wire:click.prevent="showPass" class="absolute right-2 top-9 focus:outline-none ">
                                        @if(!$show)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 ring-transparent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                          </svg>
                                        @endif

                                    </button>
                                    <div class="mt-2 text-red-600">
                                        @error('password')<span class="error">{{ __($message) }}</span> @enderror
                                    </div>
                                </div>
                                @endif
                                @if(!$updatePass)
                                <div class="col-span-3">
                                    <label for="cfpassword">{{ __('Confirm Password') }}</label>
                                    <x-input1 wire:model="cfpassword" type="{{$show==true?'text':'password'}}"></x-input1>
                                    <div class="mt-2 text-red-600">
                                        @error('cfpassword')<span class="error">{{ __($message) }}</span> @enderror
                                    </div>
                                </div>
                                @endif

              

                                

                                <div class="col-span-6">
                                    <label for="roleid">{{ __('Role Name') }}</label>
                                    <select wire:model="roleid"
                                        class="w-full border-2 dark:bg-black dark:text-white bg-transparent border-gray-400 focus:border-indigo-600 rounded-md px-2 py-1 text-center mt-2 text-md"
                                        name="roleid" id="">
                                        <option   value="">{{ __('Choose') }}</option>
                                        @foreach ($roles as $role)
                                        <option   value="{{$role->id}}">{{$role->title}}</option>
                                        @endforeach
                                    </select>
                                    <div class="mt-2 text-red-600">
                                        @error('roleid')<span class="error">{{ __($message) }}</span> @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                  
                    <div class="flex justify-end mt-5">
                        <div>
                            <x-secondary-button class=" mb-5 mr-7" wire:click="$toggle('isModalOpen')" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                        </div>
                        <div>
                            <x-purple-button  type="submit"  wire:loading.attr="disabled"  class=" mb-5 mr-7">{{ __($text) }}
                            </x-purple-button>
                        </div>
                    </div>
                </form>


            </x-modal>

            <x-modal wire:model="isResetPass" maxWidth="md">
                <form wire:submit.prevent="ResetPass">
                    <div class="m-5 dark:text-black text-xl font-bold">
                        {{ __('Reset Password') }}
                    </div>
                    <div class="px-4  overflow-y-auto sm:h-48 h-3/4">
                        <div class="px-4 py-5 sm:p-6 mb-4">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6">
                                    <label for="newpass">{{ __('New Password') }}</label>
                                    <x-input1 wire:model="newpass" type="{{$show==true?'text':'password'}}"  autofocus ></x-input1>    
                                    <button wire:click.prevent="showPass" class="absolute right-8 top-32 px-2 py-1 focus:outline-none  ">
                                        @if(!$show)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg>
                                        @else
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 ring-transparent" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                          </svg>
                                        @endif

                                    </button>        
                                    <div class="mt-2 text-red-600">
                                        @error('newpass')<span class="error">{{ __($message) }}</span> @enderror
                                    </div>
                                   
                                </div>


                            </div>
                        </div>
                    </div>
                  
                    <div class="flex justify-end ">
                        <div>
                            <x-secondary-button class=" mb-5 mr-7" wire:click="$toggle('isResetPass')" wire:loading.attr="disabled">
                                {{ __('Cancel') }}
                            </x-secondary-button>
                        </div>
                        <div>
                            <x-purple-button  type="submit"  wire:loading.attr="disabled"  class=" mb-5 mr-7">{{ __('Update') }}
                            </x-purple-button>
                        </div>
                    </div>
                </form>


            </x-modal>


        </div>
    </div>
</div>
