@props(['postcard'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$postcard->photo ? asset('storage/' . $postcard->photo) : asset('/images/no-image.png')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/postcards/{{$postcard->id}}">{{$postcard->title}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$postcard->price}}</div>      
      <div class="text-xl font-bold mb-4">{{$postcard->online_at}}</div>
      <div class="text-xl font-bold mb-4">{{$postcard->offline_at}}</div>
      <div class="text-xl font-bold mb-4">{{$postcard->is_draft}}</div>     
    </div>
  </div>
</x-card>

