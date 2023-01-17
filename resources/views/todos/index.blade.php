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
     <form action="/"> 

    <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
        <input name="search" class="form-control relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
        <button type="submit" class="btn  px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center" type="button" id="button-addon2">
          <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
          </svg>
        </button> 
    </div>
</form>
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
        {{$todos ->links()}}
    </div>
    </tbody>
    </table>
    </div>

</x-layouts.app>
