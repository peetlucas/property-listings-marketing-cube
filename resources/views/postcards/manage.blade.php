<x-layout>
  <x-card class="p-10">
    <header>      
       <table class="w-full table-auto rounded-sm">
        <tbody>
          <tr class="border-gray-300">
              <td>
                <h1 class="text-3xl text-left font-bold my-6 uppercase">
                  Manage Postcards
                </h1>
              </td>          
              <td>
                <a href="/postcards/create" class="mr-1 bg-black text-right text-white py-2 px-5 uppercase">Add New Postcard</a>
              </td>
          </tr>
        </tbody>
      </table>
    </header>
    <form action="/postcards/manage">
      <div class="relative border-2 border-gray-100 m-4 rounded-lg">
        <div class="absolute top-4 left-3">
          <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
        </div>
        <input type="text" name="search" class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
          placeholder="Search postcards..." />
        <div class="absolute top-2 right-2">
          <button type="submit" class="h-10 w-20 text-white rounded-lg bg-pink-800 hover:bg-pink-600">
            Search
          </button>
        </div>
      </div>
    </form>
    <table class="w-full table-auto rounded-sm">
      <tbody>
        
        @unless($postcards->isEmpty())
        @foreach($postcards as $postcard)
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/postcards/{{$postcard->id}}"> {{$postcard->title}} </a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <a href="/postcards/{{$postcard->id}}/edit" class="text-blue-400 px-6 py-2 rounded-xl"><i
                class="fa-solid fa-pen-to-square"></i>
              Edit</a>
          </td>
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <form method="POST" action="/postcards/{{$postcard->id}}">
              @csrf
              @method('DELETE')
              <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
            </form>
          </td>
        </tr>       
        @endforeach

         <tr>
          <td>
            <div class="mt-6 p-4">
              {{$postcards->links()}}
            </div>
          </td>
        </tr>
        @else
        <tr class="border-gray-300">
          <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
            <p class="text-center">No Postcards Found!</p>
          </td>
        </tr>
        @endunless

      </tbody>
    </table>
  </x-card>
</x-layout>
