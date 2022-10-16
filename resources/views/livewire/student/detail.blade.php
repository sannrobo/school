<div class="px-4 py-8">
    <x-slot name="title">{{ __('Information') }}</x-slot>
    <x-section-title>
        <x-slot name="title">
            {{ __('Information Detail') }}
        </x-slot>
        
        <x-slot name="description">
            <div class="px-6 py-4 shadow-lg rounded-md">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-4">
                        <div >
                            {{ __('Code') }} : <span class="font-semibold">{{ $s->st_code }}</span>
                        </div>
                        <div class="mt-1">
                            {{ __('Student Name') }} : <span class="font-semibold">{{ $s->st_name_kh }}</span>
                        </div>
                        <div class="mt-1">
                            {{ __('English Name') }} : <span class="font-semibold">{{ $s->st_name_en }}</span>
                        </div>
                        <div class="mt-1">
                            {{ __('Gender') }} : <span class="font-semibold">{{ ($s->st_gender==1)?__('Male'):__('Female') }}</span>
                        </div>
                        
                        
                    </div>
                    <div class="col-span-12 sm:col-span-4">
                        <div >
                            {{ __('Date Of Birth') }} : <span class="font-semibold">{{ Carbon\Carbon::parse($s->st_dob)->format('d-M-Y') }}</span>
                        </div>
                        <div class="mt-1">
                            {{ __('Phone') }} : <span class="font-semibold">{{ $s->phone }}</span>
                        </div>
                        <div class="mt-1">
                            {{ __('Address') }} : <span class="font-semibold">{{ $s->address }}</span>
                        </div>

                    </div>
                </div>
            </div>
        </x-slot>
    </x-section-title>
</div>
