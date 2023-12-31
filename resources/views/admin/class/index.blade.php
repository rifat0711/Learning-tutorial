<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Class') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <a href= "{{ route('class.create') }}" class ="btn btn-sm btn-primary" style="float:right;"> Add New </a>

                     

                    <table class="table table-responsive table-striped">
                      <thead>
                        <tr>
                            <td>SL</td>
                            <td>Class Name</td>
                            <td>Action</td>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($class as $key=>$row)
                            <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $row->class_name }}</td>
                            <td>
                                <a href= "" class ="btn btn-sm btn-info">Edit </a>
                                <a href= "" class ="btn btn-sm btn-info">Delete </a>  
                            </td>

                            </tr>
                            @endforeach
                        </tbody> 
                        
                   </table>
                   {{ $class->links() }}


                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
