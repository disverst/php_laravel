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
        <!------ section_offer-media ------>
        <section class="offer-media">
            <h1 class="offer-title">
                {{  $page->{'title_' .$app->getLocale()} }}
            </h1>
        </section>
        <!------ section_monastery ------>
        <section class="portfolio_area sec_pad bg_color">
            <div class="container">
                <ul class="portfolio_filter mb_50">
                    <li class="work_portfolio_item active"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/foto')}}">{{$translation->trans('menu_photo')}}</a></li>
                    <li class="work_portfolio_item"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/video')}}">{{$translation->trans('menu_video')}}</a></li>
                    <li class="work_portfolio_item"><a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/multimedia/audio')}}">{{$translation->trans('menu_audio')}}</a></li>
                </ul>
                <div class="row portfolio_gallery mb_30">
                    @php
                        $medias =\App\Models\MediaLibrary::where('type', key(collect(json_decode(env('MEDIA_TYPE')))->where('slug','photo')->toArray()))
                                                            ->with(['files','url'])
                                                            ->get();
                    @endphp
                    @if($medias !== null)
                        @foreach($medias as $key=>$media)
                            @continue($media->status === 0)
                            @if($media->files !== null && isset($media->files[0]))
                                <div class="col-sm-6 portfolio_item ux mb-30">
                                    <div class="portfolio_img">
                                        <img
                                            src="{!! asset('storage/'.$media->files[0]->file_path.'/'.$media->files[0]->file_name) !!}"
                                            alt="picture">
                                        <div class="hover_content">
                                            @foreach($media->files as $file)
                                                @if ($loop->first)
                                                    <a href="{!! asset('storage/'.$file->file_path.'/'.$file->file_name) !!}"
                                                       data-lightbox="slider{!! $key !!}"
                                                       data-title="{!! $media->{'title_' .$app->getLocale()} !!}"
                                                       class="img_popup leaf">
                                                        {{$translation->trans('look')}}
                                                        <i class="far fa-images"></i>
                                                    </a>
                                                @endif
                                                <a href="{!! asset('storage/'.$file->file_path.'/'.$file->file_name) !!}"
                                                   data-lightbox="slider{!! $key !!}"
                                                   data-title="{!! $media->{'title_' .$app->getLocale()} !!}"
                                                   class="gallery__icon">
                                                </a>
                                            @endforeach
                                            <div class="portfolio-description leaf">
                                                <h2 class="portfolio-title" class="f_500 f_size_20 f_p">
                                                    @if($media->url !== null)
                                                        <a href="{{ url(App\Http\Middleware\LocaleMiddleware::getLocale().'/'.$media->url->full_url) }}">{!! $media->{'title_' .$app->getLocale()} !!}</a>
                                                    @endif
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </main>
@endsection
