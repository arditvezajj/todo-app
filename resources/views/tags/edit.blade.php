<x-layouts.app>

    <h1> edit tags </h1>

    <form action="/tags/{{$tag['id']}}" method="POST">
        @csrf
        @method('PATCH')
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <input type="text" name="tag" value="{{old('tag', $tag['tag'])}}" id="tag"
                class="w-10/12 relative flex-auto block  px-3 py-1.5 text-base font-normal text-gray-700 bg-clip-padding  focus:border-blue-600 focus:outline-none "
                >
        </td>
        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center">
            <button type="submit"
                class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700">Update
                Tag</button>
        </td>
    </form>


</x-layouts.app>