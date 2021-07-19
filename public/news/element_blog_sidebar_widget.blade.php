<div class="widget_list widget_post">
    <div class="widget_title">
        <h3>
            {{$translation->trans('posledniye-novosti')}}
        </h3>
    </div>
    @isset($last_news)
        @for($k=0;$k<6;++$k)
            @if(isset($last_news[$k]))
                <div class="post_wrapper">
                    <div class="post_thumb">
                        <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$last_news[$k]->url->full_url)}}">
                            @if($last_news[$k]->files !== null && is_a($last_news[$k]->files->first(),\App\Models\File::class) && isset($last_news[$k]->files->first()->file_path))
                                <img
                                    src="{{ asset('storage/'.$last_news[$k]->files->first()->file_path. '/' . $last_news[$k]->files->first()->file_name) }}"
                                    alt="">
                            @endif
                        </a>
                    </div>
                    <div class="post_info">
                        <h4>
                            <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$last_news[$k]->url->full_url)}}">
                                {{ $last_news[$k]->{'title_'.$app->getLocale()} }}
                            </a>
                        </h4>
                        <span>{{ \Carbon\Carbon::parse($last_news[$k]->date_publication)->locale($app->getLocale())->translatedFormat('d F, Y') }}</span>
                    </div>
                </div>
            @endif
        @endfor
    @endisset
</div>
<div class="widget_list widget_categories">
    <div class="widget_title">
        <h3>
            {{$translation->trans('kategorii')}}
        </h3>
    </div>
    <ul>
        @foreach($allCategories as $categoryItem)
            <li>
                <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$categoryItem->url->full_url) }}">
                    {{$categoryItem->{'title_'.$app->getLocale()} }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@isset($newsCategorySlug)
    <div class="widget_list widget_sort">
        <div class="widget_title">
            <h3>
                {{$translation->trans('cortirovka')}}
            </h3>
        </div>
        <div class="tag_sort">
            <ul>
                <li>
                    <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$newsCategorySlug) }}">
                        {{$translation->trans('po-date')}}
                    </a>
                </li>
                <li>
                    <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$newsCategorySlug.'?sort=asc') }}">
                        {{$translation->trans('ot-a-do-ya')}}
                    </a>
                </li>
                <li>
                    <a href="{{url(App\Http\Middleware\LocaleMiddleware::getLocale(). '/'.$newsCategorySlug.'?sort=desc') }}">
                        {{$translation->trans('ot-ya-do-a')}}
                    </a>
                </li>
            </ul>
        </div>
    </div>
@endisset

