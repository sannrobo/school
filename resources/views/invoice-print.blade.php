<x-guest-layout title="print">
    <div class="px-2 py-4">
        <div class="grid justify-items-center">
            <h1 class="text-3xl">EDC - CENTER</h1>
   
        </div>
        <div class="flex justify-between px-10 pt-10">
            <div>
                @php
                    $student = DB::table('students')->where('id',$inv->student_id)->first();
                @endphp
                 <label for=""> Date : {{ $inv->created_at }}</label><br>
                <label for=""> Student Name : {{ $student->st_name_en }}</label><br>
                <label for=""> Employee : {{ Auth()->user()->name }}</label>
            </div>
 

        </div>
        <div class="grid justify-items-center px-10 py-10">
            <h1 class="text-3xl">Invoice</h1>
            <x-table.table>
                <x-slot name="header">

                    <x-table.heading.heading class="text-center">Class
                    </x-table.heading.heading>
                    <x-table.heading.heading class="text-center">Course
                    </x-table.heading.heading>
                    <x-table.heading.heading class="text-center">Fee
                    </x-table.heading.heading>
                    <x-table.heading.heading class="text-center">Discount
                    </x-table.heading.heading>
                    <x-table.heading.heading class="text-center">Amount
                        
                    </x-table.heading.heading>
 
                </x-slot>

                <x-slot name="body">
             
                    @php
                        $class = DB::table('classes')->where('id',$inv->class_id)->first();
                        $course = DB::table('courses')->where('id',$class->course_id)->first();
                    @endphp
                        <x-table.row.row class="text-center ">

                            <x-table.cell.cell>{{ $class->name }}</x-table.cell.cell>
                            <x-table.cell.cell>${{ $course->name }}</x-table.cell.cell>
                            <x-table.cell.cell>${{ $course->price }}</x-table.cell.cell>
                            <x-table.cell.cell>${{ $inv->discount }}</x-table.cell.cell>
                            <x-table.cell.cell>${{ $inv->total }}</x-table.cell.cell>


           

                        </x-table.row.row>
                                       
                        <x-table.row.row class="text-center ">

                            <x-table.cell.cell colspan="12" class="text-right text-xl">Total = ${{ $inv->total }}</x-table.cell.cell>


           

                        </x-table.row.row>

              
              

                </x-slot>

            </x-table.table>

            <div class="mt-10">
               <p class="text-2xl">Thank You</p>
            </div>

        </div>
    </div>
    <script>
        window.print();
    </script>
</x-guest-layout>