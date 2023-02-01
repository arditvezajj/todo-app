<x-layouts.app>

    <form action="/tags" method="POST">
        @csrf 
        
        <div class="text-center">
        @if (Session::has('message'))
        {{Session::get('message')}}
        @endif
    </div>




        <div>
            <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                Create tags
            </h2>
            <br>
        </div>
        <div class="grid justify-center">
               
                <div>

                    <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Enter
                        your
                        tag</label>
                    <input type="string" name="tag" id="first_name" 
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required> <br>
                 <button type="submit"
                    class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create Tag</button> </div> 
     </form>    

            <br>

            

            <table class="w-full text-left table-collapse">
                <thead>
                    <tr class="bg-gray-800">
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
                       @foreach ($tags as $tag) 
                     <tr class="bg-green-100 border-4 border-gray">
                         <td class="px-4 py-2"> {{$tag['tag']}} </td>
                         <td class="px-4 py-2"> <a href="/tags/edit{{ $tag['id'] }}"
                            class="bg-indigo-500 text-white p-2 rounded-lg hover:bg-indigo-600"> Edit</a>
                         </a> </td>
                         <td class="px-4 py-2">

                            <form action="/tags/{{ $tag['id'] }}" method="POST">

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
                    
    </div>




</x-layouts.app>
