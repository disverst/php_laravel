@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all"/>
    <link rel="alternate" hreflang="ru" href="{{ url($page->url->full_url) }}" />
    <link rel="alternate" hreflang="en" href="{{ url('en/'.$page->url->full_url) }}" />
    <link rel="canonical" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/' .$page->url->full_url) }}"/>
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
        <!------ section_offer-help ------>
        <section class="offer-help">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_help ------>
        <section class="help">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="help-title">
                            {{$translation->trans('help-for-the-desyatinnuy-monastery')}}
                        </h2>
                        <p class="help-text">
                            {{$translation->trans('help-for-the-desyatinnuy-monastery-text')}}
                        </p>
                        <a class="button btn-help" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/rekvizity') }}">{{$translation->trans('donate') }}</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="help-title">
                            {{$translation->trans('submit-your-note-online')}}
                        </h2>
                        <p class="help-text">
                            {{$translation->trans('submit-your-note-online-text')}}
                        </p>
                        <a class="button btn-help" href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/zapiski-online') }}">{{$translation->trans('submit-note')}}</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
