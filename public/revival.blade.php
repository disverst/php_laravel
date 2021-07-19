@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
    <link rel="alternate" hreflang="ru" href="{{ url($page->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$page->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}" />
@endsection

@section('schema-org-web')
<script type="application/ld+json"> {
        "@context": "https://schema.org/",
        "@type": "WebPage",
        "@id": "{{ $page->id }}",
        "url": "{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}",
        "name": "@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif",
        "alternateName": "{{ $page->{'title_' .$app->getLocale()} }}"
     }
    </script>
@endsection

@section('content')
    <main>
        <!------ section_offer-revival ------>
        <section class="offer-revival">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_revival ------>
        <section class="revival">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 md-7">
                        <h2 class="revival-title">
                            {{$translation->trans('Revival-of-the-Church-of-the-Tithes')}}
                        </h2>
                        <p class="revival-text">
                            {{$translation->trans('revival-text-1')}}
                        </p>
                        <p class="revival-text">
                            {{$translation->trans('revival-text-2')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/revival.webp')}}" class="letopis-img"
                             alt="{{$translation->trans('desyatynniy-monastery')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="revival-text">
                            {{$translation->trans('revival-text-3')}}
                        </p>
                        <p class="revival-text">
                            {{$translation->trans('revival-text-4')}}
                        </p>
                        <p class="revival-text">
                            {{$translation->trans('revival-text-5')}}
                        </p>
                        <p class="revival-text">
                            {{$translation->trans('revival-text-6')}}
                        </p>
                        <p class="revival-text">
                            {{$translation->trans('revival-text-7')}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
