<x-layouts.app>



    <div>
        <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
            Edit your tags
        </h2>
        <br>
    </div>
    <div class="grid justify-center">
        <form action="{{ route('tag.index') }}">
            <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
                <input name="search"
                    class="form-control relative flex-auto min-w-0 block  px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    placeholder="Search your tag" aria-label="Search" aria-describedby="button-addon2">
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
            <div>

                <label for="tag" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Enter your
                    tag</label>
                <input type="string" name="title" id="first_name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                     required>
            </div> <br>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300  font-medium rounded-lg text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Create Tag</button>
        </form>

            <br>

             {{-- <form action="/tag/{{ $tag['id'] }}" method="POST"> --}}

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
                          {{-- @foreach ($tags as $tag)    --}}
                                <tr class="bg-green-100 border-4 border-gray">
                                {{-- <td class="px-4 py-2">{{ $tag['tag'] }}</td> --}}

              {{-- @endforeach --}}
            </form>
        </div>













</x-layouts.app>
