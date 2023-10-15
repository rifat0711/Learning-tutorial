<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Students') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <a href= "{{ route('students.create') }}" class ="btn btn-sm btn-primary" style="float:right;">  New Student </a>

                     

                    <table class="table table-responsive table-strioe">
                      <thead>
                        <tr>
                            <td>SL</td>
                            <td>Roll</td>
                            <td>Name</td>
                            <td>Phone</td>
                            <td>Class Name</td>
                            <td>Action</td>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($students as $key=>$row)
                            <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->roll }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->class_id }}</td>
                            <td>
                                <a href= "('students.edit',$row->id)" class ="btn btn-sm btn-info">Edit </a>
                                <a href= "('students.distroy',$row->id)" class ="btn btn-sm btn-info">Delete </a>  
                            </td>

                            </tr>
                            @endforeach
                        </tbody> 
                   </table>


                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
