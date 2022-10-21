<div x-data="{openForm:''}"  x-init="openForm=false">
    <x-slot  name="title">{{ __('Invoice') }}</x-slot>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Invoice') }}
        </h2>

            <div class="flex mb-8 " 
        
            >
            @can('create_invoice')
                <a id="btnCreate" href="{{ route('inv.create') }}"  class="  cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-2 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                        
                    </svg>  
                    <span class="dark:text-black">{{ __('Create Invoice') }}</span>
                </a>
                @endcan
        
                
          
                {{-- <a href="{{ route('r.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Create</a> --}}
            </div>

            


        <div class="flex">
            <div class="mr-3">
                <input type="date" wire:model="start_date" class="px-2 py-2 rounded-md border-2 border-black" >
            </div>
            <div class="mr-3">
                <input type="date" wire:model="end_date" class="px-2 py-2 rounded-md border-2 border-black">
            </div>
    
            <div class="mr-3">
                <button wire:click.prevent="clear" class="cursor-pointer dark:bg-white dark:hover:bg-white  flex space-x-1 items-center bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-2 rounded">Clear</button>
            </div>

        </div>
        @can('show_invoice')
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
                                         
                                                <x-table.heading.heading class="text-center ">{{ __('Invoice') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Student Name') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Class') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Fee') }}</x-table.heading.heading>
                                 
                                                <x-table.heading.heading class="text-center ">{{ __('Discount') }}</x-table.heading.heading>
                                        
                                                <x-table.heading.heading class="text-center ">{{ __('Total') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Paid') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Rest') }}</x-table.heading.heading>
                                                <x-table.heading.heading class="text-center ">{{ __('Action') }}</x-table.heading.heading>


                                            </x-slot>

                                            <x-slot name="body">
                                            @php
                                                $totalAmount=0;
                                            @endphp
                                                @forelse ($inv as $in)
                                                    <x-table.row.row class="text-center">
                                                        @php
                                                            $totalAmount+=$in->total
                                                        @endphp
                                                        <x-table.cell.cell>{{ $in->id }}</x-table.cell.cell>
                                                            
                                                        <x-table.cell.cell>{{ $in->kh_name }}</x-table.cell.cell>
                                                        <x-table.cell.cell>{{ $in->cname }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $in->fee }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $in->discount }}</x-table.cell.cell>
              
                                                        <x-table.cell.cell>${{ $in->total }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $in->paid }}</x-table.cell.cell>
                                                        <x-table.cell.cell>${{ $in->rest }}</x-table.cell.cell>
                                                    

                                                        
                                                        <x-table.cell.cell>

                                                            <button wire:click="print({{ $in->id }})" class="focus:border-transparent focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                                                                  </svg>
                                                                  
                                                            </button>

                                                            <button wire:click="Edit({{ $in->id }})" class="focus:border-transparent focus:outline-none">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600 hover:text-green-700 dark:text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                </svg>
                                                            </button>
                                                            
       
                                                        </x-table.cell.cell>
                                                        
                                                    </x-table.row.row>
                                                    
                                                @empty
                                                    <x-table.row.row >
                                                        <x-table.cell.cell colspan="12"  class="bg-gray-200 text-center ">{{ __('No Data!') }}</x-table.cell.cell>
                                                    </x-table.row.row>
                                                @endforelse
                                                <x-table.row.row >
                                                    <x-table.cell.cell colspan="12" class="text-right text-xl text-red-600">Total = ${{ $totalAmount }}</x-table.cell.cell>
                                                </x-table.row.row>
                                                                                        
                                            </x-slot>

                                        </x-table.table>


        

                                    </div>



                                </div>
                                <div class="px-6">

                                    {{-- {{ $inv->links('custom-pagination-links-view') }}      --}}
                                </div>


                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        @endcan

        

    </div>


</div>
<script>
   
window.addEventListener('name-updated', event => {
    window.open('invoices/print/'+event.detail.id);
});

</script>
