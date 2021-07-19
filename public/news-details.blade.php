@extends('public/layout.app')

@section('meta-tags')
    <title>@if($news->seo!==null){{ $news->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($news->seo!==null && $news->seo->full_description!==null){{ ($news->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
    <link rel="alternate" hreflang="ru" href="{{ url($news->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$news->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$news->url->full_url) }}" />
@endsection

@section('schema-org-web')
<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $news->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$news->url->full_url) }}",
        "name": "@if($news->seo!==null){{ $news->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $news->{'title_' .$app->getLocale()} }}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-revival ------>
        <section class="offer-news">
            <h1 class="offer-title">
                {{  $news->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!--blog area start-->
        <div class="blog_details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12">
                        <div class="blog_wrapper">
                            <article class="single_blog">
                                <figure>
                                    <div class="post_header">
                                        <h2 class="post_title">
                                            {{ $news->{'title_'.$app->getLocale()} }}
                                        </h2>
                                        <div class="blog_meta">
                                            <p>
                                                {{ \Carbon\Carbon::parse($news->date_publication)->locale($app->getLocale())->translatedFormat('d F Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="blog_thumb blog_thumb_active owl-carousel">
                                        @if($news->files->where('key','news-gallery') !== null)
                                            @foreach($news->files->where('key','news-gallery') as $item)
                                                <div class="single_blog_thumb">
                                                    <img src="{{ asset('storage/'.$item->file_path. '/' . $item->file_name) }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="post_content">
                                            {!!  $news->{'description_'.$app->getLocale()} !!}
                                        </div>
                                        {{--                                        <div class="social_sharing">--}}
                                        {{--                                            <p>Поделиться:</p>--}}
                                        {{--                                            <ul>--}}
                                        {{--                                                <li><a href="#" title="facebook"><i class="fab fa-facebook"></i></a></li>--}}
                                        {{--                                                <li><a href="#" title="youtube"><i class="fab fa-youtube"></i></a></li>--}}
                                        {{--                                                <li><a href="#" title="instagram"><i class="fab fa-instagram"></i></a></li>--}}
                                        {{--                                            </ul>--}}
                                        {{--                                        </div>--}}
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12">
                        <div class="blog_sidebar_widget">
                            @include('public.news.element_blog_sidebar_widget',[
                                        'translation'=>$translation,
                                        'last_news'=>$news->categoryAndLastNews->news,
                                        'allCategories'=>$allCategories,
                                        ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--blog area end-->
    </main>
@endsection
