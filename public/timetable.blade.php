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
        <!------ section_timetable ------>
        <section class="offer-timetable">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_timetable ------>
        <section class="timetable">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="timetable-title">
                            {{$translation->trans('raspisaniye-bogosluzheniy')}}
                        </h2>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-1')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-1')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-2')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-3')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-4')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-5')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-6')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-2')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-8')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-3')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-9')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-10')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-8')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-4')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-9')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-10')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-8')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-5')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-9')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-10')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-11')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-6')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-12')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-8')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-7')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-9')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-13')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-8')}}
                        </p>
                        <h3 class="timetable-title-day">
                            {{$translation->trans('timetable-title-day-8')}}
                        </h3>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-9')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-14')}}
                        </p>
                        <p class="timetable-text">
                            {{$translation->trans('timetable-text-7')}}
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
