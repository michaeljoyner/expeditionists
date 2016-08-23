@extends('front.base')

@section('css')
    <link rel="stylesheet" href="{{ elixir('css/fapp.css') }}">
@stop

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => $article->hasCoverPic() ? url($article->coverPic()) : asset('images/static/NEW_logo_black.png'),
        'ogTitle' => $article->title . ' | Expeditionist',
        'ogDescription' => $article->description
    ])
@endsection

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
            @if($article->hasCoverPic())
            <img src="{{ $article->coverPic() }}" class="blog-article-image">
            @endif

            <div class="blog-article">{!! $article->body !!}</div>
            <div class="social-wrapper blog">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}"
                   class="sharing-social-link">
                    <img src="/build/images/facebook_b.png" class="social-icon blog" alt="share-to-facebook">
                </a>
                <a href="mailto:?&subject=Read&body={{ Request::url() }}"
                   class="sharing-social-link">
                    <img src="/build/images/email_b.png" class="social-icon blog" alt="share via email">
                </a>
                <a href="https://twitter.com/home?status={{ urlencode($article->title . ' ' . Request::url()) }}"
                   class="sharing-social-link">
                    <img src="/build/images/twitter_b.png" class="social-icon blog" alt="share on twitter">
                </a>
            </div>
            <a href="/blog" class="w-button button red">BACK TO BLOG MENU</a>
        </article>
    </div>
    @include('front.partials.footer')
@endsection