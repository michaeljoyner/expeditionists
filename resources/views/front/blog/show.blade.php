@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section blog-section white">
        <article class="w-container blog-article-container">
            <h1 class="h4 black">{{ $article->title }}</h1>
            <img src="{{ $article->author->profilePic() }}" alt="{{ $article->author->name }} profile picture"
                 class="blog-author-profile-pic-small">
            <div class="blog-author">{{ $article->author->name }}</div>
            <div class="blog-author grey">{{ $article->published_on->toFormattedDateString() }}</div>
            <img src="{{ $article->coverPic() }}" class="blog-article-image">

            <div class="blog-article">{!! $article->body !!}</div>
            <div class="social-wrapper blog">
                <img src="/build/images/facebook_b.png" class="social-icon blog">
                <img src="/build/images/email_b.png" class="social-icon blog">
                <img src="/build/images/twitter_b.png" class="social-icon blog">
            </div>
            <a href="/blog" class="w-button button red">BACK TO BLOG MENU</a>
        </article>
    </div>
    @include('front.partials.footer')
@endsection