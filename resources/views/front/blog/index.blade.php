@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section blog-section white">
        <h1 class="section-heading">BLOG</h1>
        <h5 class="blog-subtitle">TALES OF FROM OUR EXPEDITIONISTS</h5>
        @foreach($articles as $article)
        <div class="w-container blog-article-container blog-index-card">
            <div class="divider"></div>
            <h3 class="h4 black">{{ $article->title }}</h3>
            @if($article->coverPic())
            <img src="{{ $article->coverPic() }}" class="blog-avatar">
            @endif
            <div class="blog-author">{{ $article->author->name }}</div>
            <div class="blog-author grey">{{ $article->published_on->toFormattedDateString() }}</div>
            <div class="blog-article p1 black article-intro">{{ $article->intro }}</div>
            <a href="/blog/{{ $article->slug }}" class="w-button button red">GO TO ARTICLE</a>
        </div>
        @endforeach
        {!! $articles->render() !!}
    </div>
    @include('front.partials.footer')
@endsection