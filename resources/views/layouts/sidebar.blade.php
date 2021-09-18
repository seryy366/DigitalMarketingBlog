<div class="sidebar">
    <div class="widget">
        <h2 class="widget-title">Популярные статьи</h2>
        @foreach($popular_posts as $post)
            <div class="blog-list-widget">
            <div class="list-group">
                <a href="{{ route('article.show', ['slug' => $post->slug]) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="w-100 justify-content-between">
                        <img src="{{$post->getImage()}}" alt="" class="img-fluid float-left">
                        <h5 class="mb-1">{{$post->title}}</h5>
                        <small>{{$post->getPostDate()}}</small>
                        <small><i class="fa fa-eye"></i> {{ $post->views }}</small>
                    </div>
                </a>
            </div>
        </div><!-- end blog-list -->
        @endforeach
    </div><!-- end widget -->

    <div class="widget">
        <h2 class="widget-title">Популярные категории</h2>
        <div class="link-widget">
            <ul>
                @foreach($cats as $category)
                <li><a href="{{route('categories.single', ['slug'=> $category->slug])}}">{{$category->title}} <span>({{$category->posts_count}})</span></a></li>
                @endforeach
            </ul>
        </div><!-- end link-widget -->
    </div><!-- end widget -->
</div><!-- end sidebar -->
