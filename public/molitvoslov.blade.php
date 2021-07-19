@extends('public/layout.app')

@section('meta-tags')
    <title>@if($prayers->seo!==null){{ $prayers->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($prayers->seo!==null && $prayers->seo->full_description!==null){{ ($prayers->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content=@if(App\Http\Middleware\LocaleMiddleware::getLocale() == 'en')"none" @else"all" @endif/>
    <link rel="alternate" hreflang="ru" href="{{ url($prayers->url->full_url) }}" />
    <link rel="canonical" href="{{ url('ru/' .$prayers->url->full_url) }}"/>
@endsection

@section('schema-org-web')
    <script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $prayers->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$prayers->url->full_url) }}",
        "name": "@if($prayers->seo!==null){{ $prayers->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $prayers->{'title_' .$app->getLocale()} }}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-revival ------>
        <section class="offer-news">
            <h1 class="offer-title">
                {{  $prayers->{'title_' .$app->getLocale()} }}
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
                                            {{ $prayers->{'title_'.$app->getLocale()} }}
                                        </h2>
                                    </div>
                                    <figcaption class="blog_content">
                                        <div class="post_content">
                                            {!!  $prayers->{'description_'.$app->getLocale()} !!}
                                        </div>
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
