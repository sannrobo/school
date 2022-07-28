<div>
    <x-slot name="title">{{ __('Permission') }}</x-slot>

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Permission List') }}
        </h2>
        <div class="max-w-6xl  py-10 sm:px-6 lg:px-8">
            {{-- <div class="block mb-8">
                <a href="{{ route('slab.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add User</a>
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
                                                <x-table.heading.heading>#</x-table.heading.heading>
                                                <x-table.heading.heading>{{ __('NAME') }}</x-table.heading.heading>
                                                <x-table.heading.heading>{{ __('VIEW') }}</x-table.heading.heading>
                                                <x-table.heading.heading>{{ __('SHOW') }}</x-table.heading.heading>
                                                <x-table.heading.heading>{{ __('CREATE') }}</x-table.heading.heading>
                                                <x-table.heading.heading>{{ __('UPDATE') }}</x-table.heading.heading>
                                                <x-table.heading.heading>{{ __('DELETE') }}</x-table.heading.heading>
                                            </x-slot>
                
                                            <x-slot name="body">
                                                @php
                                                    $i=1
                                                @endphp
                                                @foreach ($slugs as $slug)
                                                    <x-table.row.row>
                                                        <x-table.cell.cell>{{ $i++ }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ __($slug->title) }}</x-table.cell.cell>
                                                        @foreach ($slug->permissions as $permission)
                                                        {{-- wire:model="per.{{ $permission->id }}" --}}
                                                            <x-table.cell.cell><input wire:model="per.{{ $permission->id }}" class="h-5 w-5 cursor-pointer focus:shadow-outline-indigo"  type="checkbox" value="{{ $permission->id }}"/></x-table.cell.cell>
                                                         @endforeach                                                                                                         
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


  

</div>
