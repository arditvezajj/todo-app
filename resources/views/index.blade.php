<x-layouts.app>
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    @if ($errors->any())
     @foreach ($errors->all() as $error)
         <div>{{$error}}</div>
     @endforeach
 @endif

        

    <h1 class="text-3xl font-bold dark:text-white   "> CREATE A TASK </h1>

    <x-layouts.create-post-form> </x-layouts.create-post-form>  
    <div>
        <table class="min-w-full table-auto">
            <thead class="justify-between">
                <tr class="bg-gray-800">
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Title</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Content</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">Edit</span>
                    </th>

                    <th class="px-16 py-2">
                        <span class="text-gray-300">Delete</span>
                    </th>
                    <th class="px-16 py-2">
                        <span class="text-gray-300">DueDate</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todos as $todo)
                    <tr class="bg-white border-4 border-gray-200">
                        <td>{{ $todo['title'] }}</td>
                        <td>{{ $todo['content'] }}</td>

                                <td><a href="todo/edit/{{ $todo['id'] }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 
                                    mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 
                                    focus:outline-none dark:focus:ring-blue-800"> Edit</a>
                            </a></td>
                        <td>
                            <form action="/todo/{{ $todo['id'] }}" method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded-full">
                                    Delete
                                </button>
                                <td>{{ $todo['due_date'] }}</td>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </tbody>
    </table>
    </div>

</x-layouts.app>
