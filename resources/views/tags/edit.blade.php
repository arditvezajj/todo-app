<x-layouts.app>


      
    <h1> edit tags </h1>

    <form action="/todo/edit{{ $todo['id'] }}" method="POST">

        @csrf
        @method('PATCH')



</x-layouts.app>