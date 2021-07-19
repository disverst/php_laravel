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
        <!------ section_offer-holy ------>
        <section class="offer-holy">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_holy ------>
        <section class="holy">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Desyatinnaya-ikona-Bozhiyey-Materi')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Desyatinnaya-ikona-Bozhiyey-Materi-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy1.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Desyatinnaya-ikona-Bozhiyey-Materi')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Minskaya-ikona-Bozhiyey-Materi')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Minskaya-ikona-Bozhiyey-Materi-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy2.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Minskaya-ikona-Bozhiyey-Materi-text')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Prepodobnykh-Iova-i-Amfilokhiya-Pochayevskikh')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Prepodobnykh-Iova-i-Amfilokhiya-Pochayevskikh-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy3.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Prepodobnykh-Iova-i-Amfilokhiya-Pochayevskikh')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Chastitsa-moshchey-Velikomuchenika-Georgiya-Pobedonostsa')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Chastitsa-moshchey-Velikomuchenika-Georgiya-Pobedonostsa-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy4.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Chastitsa-moshchey-Velikomuchenika-Georgiya-Pobedonostsa')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Chastitsa-moshchey-Ioanna-Shankhayskogo')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Chastitsa-moshchey-Ioanna-Shankhayskogo-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy5.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Chastitsa-moshchey-Ioanna-Shankhayskogo')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Chastitsa-moshchey-Matrony-Moskovskoy')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Chastitsa-moshchey-Matrony-Moskovskoy-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy6.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Chastitsa-moshchey-Matrony-Moskovskoy')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Chastitsa-moshchey-svyatogo-pravednogo-voina-Feodora-Ushakova')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Chastitsa-moshchey-svyatogo-pravednogo-voina-Feodora-Ushakova-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy7.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Chastitsa-moshchey-svyatogo-pravednogo-voina-Feodora-Ushakova')}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 md-7 justify-content-center align-self-center">
                        <h2 class="holy-title">
                            {{$translation->trans('Blazhennyy-Khrista-radi-yurodivyy-Ioann-Bosoy')}}
                        </h2>
                        <p class="holy-text">
                            {{$translation->trans('Blazhennyy-Khrista-radi-yurodivyy-Ioann-Bosoy-text')}}
                        </p>
                    </div>
                    <div class="col-lg-6 text-center md-7">
                        <img src="{{asset('img/holy8.webp')}}" class="holy-img" width="500" height="600"
                             alt="{{$translation->trans('Blazhennyy-Khrista-radi-yurodivyy-Ioann-Bosoy')}}">
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
