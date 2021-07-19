@extends('public/layout.app')

@section('meta-tags')
    <title>@if($page->seo!==null){{ $page->seo->{'title_'.$app->getLocale()} }}@endif</title>
    <meta name="description" content="@if($page->seo!==null && $page->seo->full_description!==null){{ ($page->seo->full_description->{$app->getLocale()}) }}@endif" />
    <meta name="robots" content="all" />
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
        <!------ section_offer-letopis ------>
        <section class="offer-letopis">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_letopis ------>
        <section class="letopis">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 md-7">
                        <h2 class="letopis-title">
                            {{$translation->trans('desyatinnaya-tserkov')}}<br>{{$translation->trans('Khram-Uspeniya-Presvyatoy-Bogoroditsy')}}
                        </h2>
                        <p class="letopis-text">
                            {{$translation->trans('letopis-text-1')}}
                        </p>
                        <p class="letopis-text">
                            {{$translation->trans('letopis-text-2')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/letopis.webp')}}" class="letopis-img" alt="{{$translation->trans('desyatinnaya-tserkov')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="letopis-text-title">
                            {{$translation->trans('letopis-text-title-1')}}
                        </h3>
                        <p class="letopis-text">
                            {{$translation->trans('letopis-text-3')}}
                        </p>
                        <p class="letopis-text">
                            {{$translation->trans('letopis-text-4')}}
                        </p>
                        <h3 class="letopis-text-title">
                            {{$translation->trans('letopis-text-title-2')}}
                        </h3>
                        <p class="letopis-text">
                            {{$translation->trans('letopis-text-5')}}
                        </p>
                        <h3 class="letopis-text-title">
                            {{$translation->trans('letopis-text-title-3')}}
                        </h3>
                        <p class="letopis-text">
                            {{$translation->trans('letopis-text-6')}}
                        </p>
                        <p class="letopis-text-bottom">
                            {{$translation->trans('letopis-text-7')}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
