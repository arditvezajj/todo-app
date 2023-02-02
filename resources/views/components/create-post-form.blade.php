@props(['priorities','tags'])



<form action="/todo" method="POST">
    @csrf


    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                    alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Create ToDo
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
                    <label for="date-time" class="block text-sm font-medium text-gray-700">Choose date and time </label>
                    <br>
                    <input type="datetime-local" id="meeting-time" name="due_date" value=""
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                </div>
                <div>
                    <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        priority</label>
                    <select id="priority" name="priority"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Choose priority </option>
                        @foreach ($priorities as $priority)
                            <option> {{ $priority }} </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                        Tags</label>
                    <select id="select"
                        class="w-full p-2 mt-2 mb-3  pl-4 pr-10 py-3 leading-none rounded-lg shadow-sm focus:outline-none text-gray-600 font-medium focus:ring focus:ring-blue-50 bg-gray-200">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <div>
                <button type="submit"
                    class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                    Create Task
                </button>
            </div>
        </div>
    </div>
</form>