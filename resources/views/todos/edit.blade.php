<x-layouts.app>

    @if (Session::has('message'))
        {{ Session::get('message') }}
    @endif

    @if ($errors->has('update_id'))
        {{ $errors->first('update_id') }}
    @endif


    <form action="/todo/{{ $todo['id'] }}" method="POST">

        @csrf
        @method('PATCH')





        <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div>
                    <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg"
                        alt="Workflow">
                    <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                        Edit your task
                    </h2>
                </div>

                <div class=" bg-white max-w-md rounded overflow-hidden shadow-xl p-5">

                    <div class="rounded-md shadow-sm -space-y-px">
                        <div class="grid gap-6">
                            <div class="col-span-12">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="string" value="{{ old('title', $todo['title']) }}" name="title"
                                    id="first_name" autocomplete="given-name"
                                    class="bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
                                     block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>

                            <div class="col-span-12">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Content</label>
                                <input type="text" value="{{ old('content', $todo['content']) }}"
                                    name="content" id="last_name"
                                    class="bg-gray-50  border-gray-300 text-gray-900 text-sm rounded-lg w-full focus:ring-blue-500
                                    block p-2.5 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div>
                      <input type="datetime-local" id="meeting-time" name="due_date" value="{{ old('due_date', $todo['due_date']) }}"
                          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                  </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                        Update task
                    </button>
                </div>
    </form>
    <div>
        <form action="/todo/{{ $todo['id'] }}/completed " method="POST">
            @csrf
            @method('PATCH')

            <button type="submit"
                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">

                Completed
            </button>
        </form>
    </div>

    <div
        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Completed: {{ $todo->completed_at ?? 'Not completed' }}
    </div>
    </form>

</x-layouts.app>
