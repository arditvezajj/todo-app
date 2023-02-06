<x-layouts.app>
    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif
    <form action="{{ route('todo.index') }}">
           <br>
        <div class="input-group relative w-1/2 m-auto flex flex-wrap items-stretch mb-4"> 
            <input name="search"
                class="form-control relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
            <button type="submit"
                class="btn  px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700  focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out flex items-center"
                type="button" id="search">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="w-4"
                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                    </path>
                </svg>
        </div>
        </button>
    </form>
    
    <x-create-post-form :priorities="$priorities" :tags="$tags"> </x-create-post-form>
    <div class="grid justify-center">
        <table class="w-full text-left table-collapse">
            <thead>
                <tr class="bg-gray-800">
                    <th class="px-4 py-2">
                        <span class="text-gray-300">Title</span>
                    </th>
                    <th class="px-4 py-2">
                        <span class="text-gray-300">Content</span>
                    </th>
                    <th class="px-4 py-2">
                        <span class="text-gray-300">DueDate</span>
                    </th>
                    <th class="px-4 py-2">
                        <span class="text-gray-300">Priority</span>
                    </th>
                    <th class="px-4 py-2">
                        <span class="text-gray-300">Tag</span>
                    </th>
                    <th class="px-4 py-2">
                        <span class="text-gray-300">Edit</span>
                    </th>

                    <th class="px-4 py-2">
                        <span class="text-gray-300">Delete</span>
                    </th>

                </tr>
            </thead>

            <tbody>
                @foreach ($todos as $todo )
                    <tr class="bg-green-100 border-4 border-gray">
                        <td class="px-4 py-2">{{ $todo['title'] }}</td>
                        <td class="px-4 py-2">{{ $todo['content'] }}</td>
                        <td class="px-4 py-2">{{ $todo['due_date'] }}</td>
                        <td class="px-4 py-2">{{ $todo['priority'] }}</td>

                        <td class="px-4 py-2"> 
                            @foreach ($todo->tags as $tag)
                            <span
                                
                                  class="text-black bg-blue-50 p-2 border-2 border-blue-200  rounded">{{ $tag->tag }}
                                 
                            </span>
                            @endforeach
                        </td>

                        <td class="px-4 py-2"><a href="todo/edit/{{ $todo['id'] }}"
                                class="bg-indigo-500 text-white p-2 rounded-lg hover:bg-indigo-600"> Edit</a>
                            </a></td>
                        <td class="px-4 py-2">
                            <form action="/todo/{{ $todo['id'] }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded-full">
                                    Delete 
                                </button>

                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $todos->links() }}
    </div>


</x-layouts.app>
