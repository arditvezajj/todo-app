 <x-layouts.app>
     @if (Session::has('message'))
         {{ Session::get('message') }}
     @endif

     @if ($errors->any())
         @foreach ($errors->all() as $error)
             <div>{{ $error }}</div>
         @endforeach
     @endif


     <form action="/projects" method="POST">
         @csrf


         <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
             <div class="max-w-md w-full space-y-8">
                 <div>
                     <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                         alt="Workflow">
                     <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                         Create Project
                     </h2>
                 </div>
                 <div class=" bg-white max-w-md rounded overflow-hidden shadow-xl p-5">

                     <div class="rounded-md shadow-sm -space-y-px">
                         <div class="grid gap-6">
                             <div class="col-span-12">
                                 <label for="first_name" class="block text-sm font-medium text-gray-700">Title</label>
                                 <input type="string" name="title" value="{{ old('title') }}" id="first_name"
                                     id="first_name" autocomplete="given-name"
                                     class="bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
                                         block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     placeholder="Title" required>
                             </div>

                             <div class="col-span-12">
                                 <label for="last_name" class="block text-sm font-medium text-gray-700">Content</label>
                                 <input type="text" name="content" value="{{ old('content') }}" id="last_name"
                                     placeholder="Content"
                                     class="bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
                                        block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                     required>
                             </div>
                         </div>
                         <br> <br>
                     </div>

                     <div>
                         <button type="submit"
                             class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                             Create Project
                         </button>
     </form>
     </div> <br><br>


     <div>
         <table class="w-full text-left table-collapse">
             <thead>
                 <tr class="bg-gray-800">
                     <th class="px-4 py-2">
                         <span class="text-gray-300">Title</span>
                     </th>
                     <th class="px-4 py-2">
                         <span class="text-gray-300">Content</span>
                     </th>
                 </tr>
             </thead>
             <tbody>
                 @foreach ($projects as $project)
                     <tr class="bg-green-100 border-4 border-gray">
                         <td class="px-4 py-2">{{ $project['title'] }}</td>
                         <td class="px-4 py-2">{{ $project['content'] }}</td>
                        <td class="px-4 py-2"><a href="/projects/edit/{{ $project['id'] }}" 
                         class="bg-indigo-500 text-white p-2 rounded-lg hover:bg-indigo-600"> Edit</a>
                         </a></td>

                        <td class="px-4 py-2">
                         <form action="/projects/{{ $project['id'] }}" method="POST">
                         @csrf
                         @method('DELETE')

                         <button class="bg-red-500 hover:bg-red-700 text-white  py-2 px-4 rounded-full">
                             Delete
                         </button>
                         </form>
                         @endforeach
                     </tr>

             </tbody>
         </table>
     </div>

 </x-layouts.app>
