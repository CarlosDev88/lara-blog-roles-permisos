<x-app-layout>
    <div class="container2 py-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class= "w-full h-80 bg-cover bg-center @if($loop->first)md:col-span-2 @endif" 
                        style="background-image:url(@if($post->image)http://larablog.test/storage/{{$post->image->url}}@else https://cdn.pixabay.com/photo/2023/03/16/16/38/woods-7857082_960_720.jpg @endif)">
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                            <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-yellow-500 rounded-l-lg text-white">{{$tag->name}}</a>
                            @endforeach
                            </div>
                        <h1 class="text-4xl text-black leading-8 font-bold mt-2">
                            <a href="{{route('posts.show',$post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="m-4">
            {{$posts->links()}}
        </div>
    </div>

</x-app-layout>

