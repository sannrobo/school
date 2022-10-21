<x-guest-layout title="print">
    <div class="px-8 py-8">
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
    <script>
        window.print();
    </script>
</x-guest-layout>