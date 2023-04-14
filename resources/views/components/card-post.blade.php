@props(['post'])
<article class="mt-8 bg-white shadow-lg rounded-lg overflow-hidden">

        @if($post->image)
        <img class="w-full h-80 object-cover object-center" src="http://larablog.test/storage/{{$post->image->url}}" alt=""> 
        @else
        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2023/03/16/16/38/woods-7857082_960_720.jpg" alt="">
        @endif

        <div class="px-6 py-4">
            <h1>
                <a class="font-bold text-xl mb-2" href="{{route('posts.show',$post)}}">
                    {{ $post->name}}
                </a>
            </h1>

            <div class="text-gray-700 text-base">
                {{ $post->extract}}
            </div>

            <div class="px-5 pt-4 pb-2">
                @foreach($post->tags as $tag)
                    <a href="{{route('posts.tag',$tag)}}" class="inline-block bg-yellow-500 rounded-l-lg text-white px-3 py-1 text-sm mr-2">{{$tag->name}}</a>
                @endforeach
            </div>
        </div>
    </article>