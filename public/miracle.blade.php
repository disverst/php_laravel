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
        <!------ section_offer-miracle ------>
        <section class="offer-miracle">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_miracle ------>
        <section class="miracle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 md-7">
                        <h2 class="miracle-title">
                            {{$translation->trans('miracle-title-1')}}
                        </h2>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-1')}}
                        </p>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-2')}}
                        </p>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-3')}}
                        </p>
                        <h2 class="miracle-title">
                            {{$translation->trans('miracle-title-2')}}
                        </h2>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-4')}}
                        </p>
                        <h2 class="miracle-title">
                            {{$translation->trans('miracle-title-3')}}
                        </h2>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-5')}}
                        </p>
                        <h2 class="miracle-title">
                            {{$translation->trans('miracle-title-4')}}
                        </h2>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-6')}}
                        </p>
                        <p class="miracle-text">
                            {{$translation->trans('miracle-text-7')}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
