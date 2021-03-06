@extends('layouts.app')
@section('content')
    @component('client.components.breadcrumb')
        @slot('title') {{ $pageTitle }} @endslot
        @slot('parent')@endslot
        @slot('active') {{ $pageTitle }} @endslot
    @endcomponent
    <section class="s-catalog">
        <div class="container">
            <div class="wrapper">
                <form action="{{ route($pageFilterRoute) }}" method="GET" class="filters">
                    <div class="accordion-block filters__filter">
                        <div class="accordion accordion-filter filters__filter-title">
                            Формат
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#333333"/>
                            </svg>
                        </div>
                        <div class="panel">
                            <div class="filters__filter-items">
                                <div class="filters__filter-item">
                                    <input value="mentor" class="input-checkbox" name="free" id="free" type="checkbox"
                                           @if(request()->input('free')) checked @endif>
                                    <label for="free">Бесплатный</label>
                                </div>
                                <div class="filters__filter-item">
                                    <input value="paid_mentor" class="input-checkbox" name="paid" id="paid"
                                           type="checkbox" @if(request()->input('paid')) checked @endif>
                                    <label for="paid">Платный</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($specializations)
                        <div class="accordion-block  filters__filter">
                            <div class="accordion accordion-filter filters__filter-title">
                                Сфера деятельности
                                <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                        fill="#333333"/>
                                </svg>
                            </div>
                            <div class="panel">
                                <div class="filters__filter-items">
                                    @foreach($specializations as $key => $specialization)
                                        <div class="filters__filter-item">
                                            <input id="specialization-{{$specialization->id}}"
                                                   value="{{ $specialization->name }}" class="input-checkbox"
                                                   name="specialization_ids[{{$specialization->id}}]" type="checkbox"
                                                   @if(isset(request()->specialization_ids[$specialization->id])) checked @endif>
                                            <label
                                                for="specialization-{{$specialization->id}}">{{ $specialization->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="accordion-block filters__filter">
                        <div class="accordion accordion-filter filters__filter-title">
                            Укажите город
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#333333"/>
                            </svg>
                        </div>
                        <div class="panel">
                            <input id="search_input" class="search-input" value="" placeholder="Город">
                            <div class="filters__filter-items filters__filter-search-items">
                                @foreach($cities as $key => $city)
                                    <div class="filters__filter-item">
                                        <input type="checkbox" class="filter-input-checkbox" id="{{ $city->slug }}"
                                               name="cities[{{$city->id}}]"
                                               value="{{ $city->name }}"
                                               @if(isset(request()->cities[$city->id])) checked @endif>
                                        <label for="{{ $city->slug }}">{{ $city->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-block filters__filter">
                        <div class="accordion accordion-filter filters__filter-title">
                            Показывать
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#333333"/>
                            </svg>
                        </div>
                        <div class="panel">
                            <div class="filters__filter-items">
                                <div class="filters__filter-item">
                                    <input type="checkbox" class="filter-input-checkbox" id="withReviews"
                                           name="withReviews"
                                           value="1" @if(isset(request()->withReviews)) checked @endif>
                                    <label for="withReviews">Только с отзывами</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-block filters__filter">
                        <div class="accordion accordion-filter filters__filter-title">
                            Активность наставника
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#333333"/>
                            </svg>
                        </div>
                        <div class="panel">
                            <div class="filters__filter-items">
                                @php
                                    $onlineParameters = ['online'=>'Онлайн','5 days' => 'Заходил до 5 дн. назад',
                                 '10 days' => 'Заходил до 10 дн. назад','20 days' => 'Заходил до 20 дн. назад', '30 days' => 'Заходил до 30 дн. назад'];
                                @endphp
                                @foreach($onlineParameters as $key => $onlineParameter)
                                    <div class="filters__filter-item">
                                        <input value="{{ $key }}" class="input-checkbox"
                                               name="onlineParameters[{{ $key }}]" id="{{ $key }}"
                                               type="checkbox"
                                               @if(isset(request()->onlineParameters[$key])) checked @endif>
                                        <label for="{{ $key }}">{{ $onlineParameter }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-block filters__filter">
                        <div class="accordion accordion-filter filters__filter-title">
                            Отзывы
                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.29289 0.29289C0.68342 -0.09763 1.31658 -0.09763 1.70711 0.29289L7 5.5858L12.2929 0.29289C12.6834 -0.09763 13.3166 -0.09763 13.7071 0.29289C14.0976 0.68342 14.0976 1.3166 13.7071 1.7071L7.7071 7.7071C7.3166 8.0976 6.6834 8.0976 6.2929 7.7071L0.29289 1.7071C-0.09763 1.3166 -0.09763 0.68342 0.29289 0.29289Z"
                                    fill="#333333"/>
                            </svg>
                        </div>
                        <div class="panel">
                            <div class="filters__filter-items">
                                @php
                                    $reviewParameters = ['0' =>'Все','1' => 'От 1', '5' => 'От 5','10' => 'От 10', '50' => 'От 50'];
                                @endphp
                                @foreach($reviewParameters as $key  => $reviewParameter)
                                    <div class="filters__filter-item">
                                        <input type="checkbox" class="filter-input-checkbox" id="{{ $key }}"
                                               name="reviewParameters[{{$key}}]"
                                               value="{{ $key }}"
                                               @if(isset(request()->reviewParameters[$key])) checked @endif>
                                        <label for="{{$key}}">{{ $reviewParameter }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-default-shadow small-btn w-100">
                        Показать
                    </button>

                    <a href="{{ route($pageFilterRoute) }}" class="clear-filter">
                        Сбросить фильтры
                        <svg width="11" height="10" viewBox="0 0 11 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M1.02827 0.528512C1.28862 0.268165 1.71073 0.268165 1.97108 0.528512L5.49967 4.05712L9.02827 0.528512C9.28861 0.268165 9.71074 0.268165 9.97108 0.528512C10.2314 0.788865 10.2314 1.21097 9.97108 1.47133L6.44247 4.99992L9.97108 8.52852C10.2314 8.78885 10.2314 9.21099 9.97108 9.47132C9.71074 9.73165 9.28861 9.73165 9.02827 9.47132L5.49967 5.94272L1.97108 9.47132C1.71073 9.73165 1.28862 9.73165 1.02827 9.47132C0.767921 9.21099 0.767921 8.78885 1.02827 8.52852L4.55687 4.99992L1.02827 1.47133C0.767921 1.21097 0.767921 0.788865 1.02827 0.528512Z"
                                fill="#E40904"/>
                        </svg>
                    </a>
                </form>
                <div class="search-result">
                    <div class="search-result__header">
                        <p>Найдено {{ $count }}</p>
                        <div class="search-result__header__sorting ">
                            <span class="search-items-format search-items-format__active" data-action="row">
                                <svg width="24" height="24" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5 21C3.89543 21 3 20.1046 3 19L3 15C3 13.8954 3.89543 13 5 13L9 13C10.1046 13 11 13.8954 11 15L11 19C11 20.1046 10.1046 21 9 21L5 21ZM5 15L5 19L9 19L9 15L5 15ZM5 11C3.89543 11 3 10.1046 3 9L3 5C3 3.8954 3.89543 3 5 3L9 3C10.1046 3 11 3.8954 11 5L11 9C11 10.1046 10.1046 11 9 11L5 11ZM5 5L5 9L9 9L9 5L5 5ZM15 21C13.8954 21 13 20.1046 13 19L13 15C13 13.8954 13.8954 13 15 13L19 13C20.1046 13 21 13.8954 21 15L21 19C21 20.1046 20.1046 21 19 21L15 21ZM15 15L15 19L19 19L19 15L15 15ZM15 11C13.8954 11 13 10.1046 13 9L13 5C13 3.8954 13.8954 3 15 3L19 3C20.1046 3 21 3.8954 21 5L21 9C21 10.1046 20.1046 11 19 11L15 11ZM15 5L15 9L19 9L19 5L15 5Z"
                                    />
                                </svg>
                            </span>
                            <span class="search-items-format" data-action="column">
                                <svg width="24" height="24" viewBox="0 0 24 24"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M4 7C4 6.44772 4.44772 6 5 6H6C6.55228 6 7 6.44772 7 7C7 7.55228 6.55228 8 6 8H5C4.44772 8 4 7.55228 4 7ZM9 7C9 6.44772 9.44772 6 10 6L19 6C19.5523 6 20 6.44772 20 7C20 7.55228 19.5523 8 19 8L10 8C9.44772 8 9 7.55228 9 7ZM4 12C4 11.4477 4.44772 11 5 11H6C6.55228 11 7 11.4477 7 12C7 12.5523 6.55228 13 6 13H5C4.44772 13 4 12.5523 4 12ZM9 12C9 11.4477 9.44772 11 10 11L19 11C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13L10 13C9.44772 13 9 12.5523 9 12ZM4 17C4 16.4477 4.44772 16 5 16H6C6.55228 16 7 16.4477 7 17C7 17.5523 6.55228 18 6 18H5C4.44772 18 4 17.5523 4 17ZM9 17C9 16.4477 9.44772 16 10 16H19C19.5523 16 20 16.4477 20 17C20 17.5523 19.5523 18 19 18H10C9.44772 18 9 17.5523 9 17Z"
                                    />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="search-result-item-cards search-result-item-cards__row">
                        @if($items->count() > 0)
                            @foreach($items as $item)
                                <a class="mentor-info-card"
                                   href="{{ route(SessionRoleService::roleNameRoute($item->role_name),['id'=>$item->id]) }}">
                                    <div class="left">
                                        <img src="{{ asset($item->user->avatarImage) }}" width="92px"
                                             data-widget="92px"
                                             alt="user icon">
                                        <div class="rate">{{ round($item->rate,1) }}</div>
                                        <div class="review">{{ $item->count }} отзывов</div>
                                        <div class="stars">
                                            <input name="star-rating" class="rating result-star-rating"
                                                   data-min="0" data-max="5" data-step="0.1"
                                                   value="{{ round($item->rate,1) }}">
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="mentor-block-user-name">
                                            <p class="name">
                                                {{ $item->user->firstNameAndLetterLastNameCustom }}
                                                ,<span> {{ $item->user->login }}</span>
                                            </p>
                                            @if(Cache::has('is_online' . $item->id))
                                                <div class="online"><span></span> В сети</div>
                                            @else
                                                <div class="offline"><span></span> Не в сети</div>
                                            @endif
                                        </div>
                                        <div class="work">{{ $item->specialization_text ?: '' }}</div>
                                        <div class="city">{{ $item->user->countryAddressCustom }}</div>
                                        <div class="work-info">
                                            <div class="activity">
                                                <p class="medium-small-text gray-text">Сфера деятельности:</p>
                                                <p class="medium-small-text dark-charcoal-text">{{ $item->specializationName() }}</p>
                                            </div>
                                            <div class="skills">
                                                <p class="medium-small-text gray-text">Ключевые слова / навыки:</p>
                                                <div class="skill-items">
                                                    @foreach(json_decode($item->skills) as $key => $skill)
                                                        <div class="skill-item">
                                                            {{ $skill }}
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class="actions">
                                            <div class="buttons">
                                                <button
                                                    href="{{ route(SessionRoleService::roleNameRoute($item->role_name),['id'=>$item->id]) }}"
                                                    class="btn-default-shadow small-btn">
                                                    Начать диалог
                                                </button>
                                                @auth
                                                    @if($item->favorite($item->user_id,$item->role_name))
                                                        <div id="favorite-btn-{{$item->id}}"
                                                             class="btn-white-green w-auto"
                                                             onclick="deleteToFavorite({{$item->favorite($item->user_id,$item->role_name)}},{{$item->id}})">
                                                            Убрать из избранного
                                                            <svg width="17" height="16" viewBox="0 0 17 16">
                                                                <path
                                                                    d="M8.4987 3.01843C6.92815 1.61126 4.51287 1.66231 3.00361 3.17157C1.44151 4.73367 1.44151 7.26633 3.00361 8.8284L7.5559 13.3807C8.07657 13.9014 8.92083 13.9014 9.4415 13.3807L13.9938 8.8284C15.5559 7.26633 15.5559 4.73367 13.9938 3.17157C12.4845 1.66231 10.0692 1.61126 8.4987 3.01843ZM7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                                    fill="#1DC0BD"/>
                                                                <path
                                                                    d="M7.71763 4.11438L8.0273 4.42403C8.28763 4.68437 8.70977 4.68437 8.9701 4.42403L9.27977 4.11438C10.3212 3.07299 12.0096 3.07299 13.051 4.11438C14.0924 5.15578 14.0924 6.8442 13.051 7.8856L8.4987 12.4379L3.94641 7.8856C2.90502 6.8442 2.90502 5.15578 3.94641 4.11438C4.98781 3.07299 6.67625 3.07299 7.71763 4.11438Z"
                                                                    fill="#1DC0BD"/>
                                                            </svg>
                                                        </div>
                                                    @else
                                                        <div id="favorite-btn-{{$item->id}}"
                                                             class="btn-white-green w-auto"
                                                             onclick="saveToFavorite({{$item->id}})">
                                                            Добавить в избранное
                                                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                                 xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                                                    fill="#1DC0BD"/>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                @endauth
                                                @guest
                                                    <div id="favorite-btn-{{$item->id}}"
                                                         class="btn-white-green w-auto"
                                                         onclick="openLogin()">
                                                        Добавить в избранное
                                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                                             xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                                                fill="#1DC0BD"/>
                                                        </svg>
                                                    </div>
                                                @endguest
                                            </div>
                                            <div class="price">
                                                {{ ($item->role_name === 'paid_mentor') ? $item->service_price . ' ₽' : 'Бесплатный'}}
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        @else
                            <div class="search-result-not-results">
                                <h4>По вашему запросу ничего не найдено</h4>
                            </div>
                        @endif
                    </div>


                    {{ $items->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </section>
    @include('client.components.sectionWriteToUs')
@endsection

@section('custom_js')
    <script>
        $(document).ready(function () {
            $("#search_input").on("keyup", function () {
                const value = $(this).val().toLowerCase();
                $(".filters__filter-search-items > .filters__filter-item > input").filter(function () {
                    $(this).parent().toggle($(this).val().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        $(".search-result__header__sorting").on("click", ".search-items-format", function () {
            const tabs = $(".search-result__header__sorting .search-items-format");

            tabs.removeClass("search-items-format__active");

            $(this).addClass("search-items-format__active");

            if ($(this).attr('data-action') == 'row') {
                $('.search-result-item-cards').addClass('search-result-item-cards__row')
            } else {
                $('.search-result-item-cards').removeClass('search-result-item-cards__row')
            }
            return false;
        });

        //     $(".buttonClass').click(function(){
        //     window.location.href = "http://stackoverflow.com";
        // });
    </script>
@endsection
