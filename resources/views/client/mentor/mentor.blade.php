@extends('layouts.app')

@section('content')
    <section class="s-mentor-head">
        <img src="{{ asset('/images/bg-mentor-page-head.png') }}" alt="mentor-page-head" width="100%" height="100%">
    </section>
    <section class="s-mentor">
        <div class="container">
            <div class="mentor-page">
                <div class="mentor-page__left">
                    <div class="user-photo">
                        <img src="{{ asset('images/mentor-image.png') }}" width="100%" height="auto" alt="Mentor">
                    </div>
                    <button class="btn-default small-btn w-100">
                        Перейти в чат
                    </button>

                    @auth
                        @if($item->favorite($item->user_id,$item->role_name))
                            <div id="favorite-btn-{{$item->id}}"
                                 class="btn-white-green medium-btn w-100"
                                 onclick="deleteToFavorite({{$item->favorite($item->user_id,$item->role_name)}},{{$item->id}})">
                                Убрать из избранного &nbsp
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
                                 class="btn-white-green medium-btn w-100"
                                 onclick="saveToFavorite({{$item->id}})">
                                Добавить в избранное &nbsp
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
                             class="btn-white-green medium-btn w-100"
                             onclick="openLogin()">
                            Добавить в избранное &nbsp
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M8.49968 3.01843C6.92913 1.61126 4.51384 1.66231 3.00458 3.17157C1.44248 4.73367 1.44248 7.26633 3.00458 8.8284L7.55688 13.3807C8.07754 13.9014 8.92181 13.9014 9.44248 13.3807L13.9947 8.8284C15.5569 7.26633 15.5569 4.73367 13.9947 3.17157C12.4855 1.66231 10.0702 1.61126 8.49968 3.01843ZM7.71861 4.11438L8.02828 4.42403C8.28861 4.68437 8.71074 4.68437 8.97108 4.42403L9.28074 4.11438C10.3221 3.07299 12.0105 3.07299 13.0519 4.11438C14.0933 5.15578 14.0933 6.8442 13.0519 7.8856L8.49968 12.4379L3.94739 7.8856C2.906 6.8442 2.906 5.15578 3.94739 4.11438C4.98879 3.07299 6.67723 3.07299 7.71861 4.11438Z"
                                    fill="#1DC0BD"/>
                            </svg>
                        </div>
                    @endguest

                    <div class="review">
                        <div class="rate">
                            {{ round($reviews->avg('rate'),1) }}
                            <span>{{ $reviews->count() }} отзывов</span>
                        </div>
                        <div class="stars">
                            <input name="star-rating" class="rating result-star-rating"
                                   data-min="0" data-max="5" data-step="0.1"
                                   value="{{ round($reviews->avg('rate'), 1) }}">
                        </div>
                    </div>
                </div>
                <div class="mentor-page__right">
                    <div class="mentor-hero-block">
                        <div class="mentor-block-user-name">
                            <div class="user-info">
                                <p class="name">
                                    {{ $item->user->firstNameAndLetterLastNameCustom }}
                                    <span>, {{ $item->user->login }}</span>
                                </p>
                                <p class="work">
                                    {{ $item->specialization_text ?: '' }}
                                </p>
                                <p class="city">
                                    {{ $item->user->countryAddressCustom }}
                                </p>
                            </div>
                            <div class="status-price-block">
                                <div class="status">
                                    Свободен
                                </div>
                                <div class="price">
                                    {{ $item->service_price }} ₽ / час
                                </div>
                            </div>
                        </div>

                        @if($item->specializationName())
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    Сфера деятельности
                                </div>
                                <div class="info-description">
                                    {{ $item->specializationName() }}
                                </div>
                            </div>
                        @endif

                        @empty(!json_decode($item->skills))
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    Ключевые слова / навыки
                                </div>
                                <div class="skill-items">
                                    @foreach(json_decode($item->skills) as $skill)
                                        <div class="skill-item">
                                            {{ $skill }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endempty

                        @if($item->skills_description)
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    C чем могу помочь
                                </div>
                                <div class="info-description">
                                    <ol>
                                        <li>{{ $item->skills_description }}</li>
                                    </ol>
                                </div>
                            </div>
                        @endif

                        @if($item->about_me)
                            <div class="line"></div>
                            <div class="mentor-block-info">
                                <div class="info-title">
                                    О себе
                                </div>
                                <div class="info-description">
                                    {{ $item->about_me }}
                                </div>
                            </div>
                        @endif

                        <div class="line"></div>
                        <div class="mentor-block-info">
                            <div class="info-title">
                                Дипломы, сертификаты и курсы
                            </div>
                            <div class="mentor-block-certificates">
                                @foreach($item->certifications($item->user_id,$item->role_name) as $certificate)
                                    <div class="certificate-card">
                                        <div class="left">
                                            <div class="info-title">
                                                {{ $certificate->name }}
                                            </div>
                                            <div class="info-description">
                                                {{ $certificate->description }}
                                            </div>
                                        </div>
                                        @if($certificate->image)
                                            <div class="right">
                                                <img src="{{ $certificate->certificateImage }}" alt="certificate">
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="mentor-reviews">
                            <div class="head">
                                <div class="info-title">
                                    Отзывы ({{ $reviews->count() }})
                                </div>

                                @auth
                                    @if($myReview == 0 && !$item->checkMyProfileCard($item->id))
                                        <div class="write" onclick="openAddReviewPopup()">
                                            Написать отзыв
                                            <svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.7929 2.29289C17.1834 1.90237 17.8166 1.90237 18.2071 2.29289L22.2071 6.29289C22.5976 6.68342 22.5976 7.31658 22.2071 7.70711L9.20711 20.7071C9.01957 20.8946 8.76522 21 8.5 21H4.5C3.94772 21 3.5 20.5523 3.5 20L3.5 16C3.5 15.7348 3.60536 15.4804 3.79289 15.2929L13.7927 5.2931L16.7929 2.29289ZM14.5 7.41421L5.5 16.4142L5.5 19H8.08579L17.0858 10L14.5 7.41421ZM18.5 8.58579L20.0858 7L17.5 4.41421L15.9142 6L18.5 8.58579Z"
                                                    fill="#1DC0BD"/>
                                            </svg>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <div class="review-items">
                                @foreach($reviews as $review)
                                    <div class="review-item" id="review-item-{{$review->id}}">
                                        <div class="head">
                                            <div class="info">
                                                <img
                                                    src="{{ $review->userRoleInformation->user->getAvatarImageAttribute() }}"
                                                    width="61"
                                                    alt="user-review">
                                                <div class="user">
                                                    <div class="name">
                                                        {{ $review->userRoleInformation->user->getLastNameAndFirstName() }}
                                                    </div>
                                                    <div class="position">
                                                        {{ $review->userRoleInformation->user->getSpecializationTextCustomAttribute() }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="date">
                                                {{ $review->dateFormat() }}
                                                <div class="stars">
                                                    <input name="star-rating" class="rating result-star-rating"
                                                           data-min="0" data-max="5" data-step="0.1"
                                                           value="{{ $review->rate }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="review-text medium-small-text dark-charcoal-text">{!! $review->text !!}</div>
                                        @auth
                                            <div class="review-item-buttons">
                                                @if(!$review->checkParentReview)
                                                    <a onclick="openAnswerReviewPopup({{$review->id}})" class="comment"
                                                       href="javascript:void(0);">
                                                        Комментировать
                                                    </a>
                                                @endif
                                                @if($review->user_id == $userInformation->id)
                                                    <a onclick="openUpdateReviewPopup({{$review->id}})" class="comment"
                                                       href="javascript:void(0);">
                                                        Редактровать
                                                    </a>
                                                @endif
                                            </div>
                                        @endauth

                                        @if($review->parentReviews->count() > 0)
                                            <div class="review-item-parents">
                                                @foreach($review->parentReviews as $parentReview)
                                                    <div class="review-item"
                                                         id="review-item-parent-{{$parentReview->id}}">
                                                        <div class="head">
                                                            <div class="info">
                                                                <img
                                                                    src="{{ $parentReview->userRoleInformation->user->getAvatarImageAttribute() }}"
                                                                    width="61"
                                                                    alt="user-review">
                                                                <div class="user">
                                                                    <div class="name">
                                                                        {{ $parentReview->userRoleInformation->user->getLastNameAndFirstName() }}
                                                                    </div>
                                                                    <div class="position">
                                                                        {{ $parentReview->userRoleInformation->user->getSpecializationTextCustomAttribute() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="date">
                                                                {{ $parentReview->dateFormat() }}
                                                                <div class="stars">
                                                                    <input name="star-rating"
                                                                           class="rating result-star-rating"
                                                                           data-min="0" data-max="5" data-step="0.1"
                                                                           value="{{ $parentReview->rate }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="review-text medium-small-text dark-charcoal-text">{!! $parentReview->text !!}</div>
                                                        @auth
                                                            <div class="review-item-buttons">
                                                                @if($parentReview->user_id == $userInformation->id)
                                                                    <a onclick="openUpdateParentReviewPopup({{$parentReview->id}})"
                                                                       class="comment"
                                                                       href="javascript:void(0);">
                                                                        Редактровать
                                                                    </a>
                                                                @endif
                                                            </div>
                                                        @endauth
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        <div class="line"></div>
                                    </div>
                                @endforeach
                            </div>

                            @if($reviews->count() > 10)
                                <button class="btn-default medium-btn  btn-load-more">
                                    Показать еще
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.7929 2.29289C13.1834 1.90237 13.8166 1.90237 14.2071 2.29289L17.2071 5.29289C17.5976 5.68342 17.5976 6.31658 17.2071 6.70711L14.2071 9.70711C13.8166 10.0976 13.1834 10.0976 12.7929 9.70711C12.4024 9.31658 12.4024 8.68342 12.7929 8.29289L14.0858 7H12.5C8.95228 7 6 9.95228 6 13.5C6 17.0477 8.95228 20 12.5 20C16.0477 20 19 17.0477 19 13.5C19 12.9477 19.4477 12.5 20 12.5C20.5523 12.5 21 12.9477 21 13.5C21 18.1523 17.1523 22 12.5 22C7.84772 22 4 18.1523 4 13.5C4 8.84772 7.84772 5 12.5 5H14.0858L12.7929 3.70711C12.4024 3.31658 12.4024 2.68342 12.7929 2.29289Z"
                                            fill="#1DC0BD"/>
                                    </svg>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    @include('client.components.sectionWriteToUs', ['gray' => true])
@endsection

@section('custom_js')
    <script>
        /*function renderHtmlAddCommentItem() {
            return `<div class="review-write">
                        <div class="review-write-header">
                            <img src="{{ asset(User::DEFAULT_MALE_IMAGE) }}" alt="" class="review-write-img">
                        </div>
                        <div class="review-write-body">
                            <div class="review-write-username">Жаксыбай Толеби</div>
                            <textarea name="review-message" rows="10" placeholder="Напишите что-нибудь"
                                      class="review-write-textarea"></textarea>
                            <div class="review-write-buttons">
                                <button onclick="s  aveReview(this)" class="review-write-btn review-write-send">Отправить</button>
                                <button onclick="cancelReview(this)" class="review-write-btn review-write-cancel">Отмена</button>
                            </div>
                        </div>
                        <div class="line"></div>
                    </div>`;
        }*/

        // $('.write').click(function () {
        //     $('.review-items').prepend(renderHtmlAddCommentItem());
        // });

        // function cancelReview(event) {
        //     $(event).closest('.review-write').remove();
        // }


        $('#addReviewForm').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let itemInformationId = {{ $item->id }};
            let textComment = $(this).find('.review-write-textarea').val();
            let ratingStarValue = $(this).find('.star-rating').val();

            $(".loader").addClass("loading")

            $.ajax({
                url: "{{ route('cabinet.reviews.save') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    itemInformationId: itemInformationId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно отправлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно отправлено!')
                }
            });
        })

        $('#answerReviewForm').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let itemInformationId = {{ $item->id }};
            let textComment = $(this).find('.review-write-textarea').val();
            let ratingStarValue = $(this).find('.star-rating').val();
            let reviewId = $(this).find('#review-id').val();

            $(".loader").addClass("loading")

            $.ajax({
                url: "{{ route('cabinet.reviews.answer.save') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    itemInformationId: itemInformationId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                    reviewId: reviewId,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно отправлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно отправлено!')
                }
            });
        })

        $('#updateReviewForm').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let reviewId = $(this).find('#update-review-id').val()
            let textComment = $(this).find('.review-write-textarea').val()
            let ratingStarValue = $(this).find('.star-rating').val()

            $(".loader").addClass("loading")

            $.ajax({
                url: "{{ route('cabinet.reviews.update') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    reviewId: reviewId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно обновлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно обновлено!')
                }
            });
        })

        $('#updateParentReviewPopup').submit(function (event) {
            event.preventDefault();

            let _token = $('meta[name="csrf-token"]').attr('content')
            let reviewId = $(this).find('#update-parent-review-id').val()
            let textComment = $(this).find('.review-write-textarea').val()
            let ratingStarValue = $(this).find('.star-rating').val()

            $(".loader").addClass("loading")
            $.ajax({
                url: "{{ route('cabinet.reviews.update') }}",
                method: "POST",
                data: {
                    '_token': _token,
                    reviewId: reviewId,
                    textComment: textComment,
                    ratingStarValue: ratingStarValue,
                },
                success: function (responce) {
                    $(".loader").removeClass("loading")
                    if (responce.status) {
                        alertModal('Комментария успешно обновлено!')
                        $(this).find('.review-write-textarea').val()
                        $(this).find('.star-rating').val(0)

                        setTimeout(() => {
                            window.location.reload();
                        }, 1500)
                    }
                },
                error: function (err) {
                    $(".loader").removeClass("loading")
                    alertWarningModal('Комментария не успешно обновлено!')
                }
            });
        })
    </script>
@endsection

{{--Ози бырдене былесизбе? Тупой сияктысызго чето!--}}
{{--Ози бырдене дым былмитын сиякты? Таза тупойгой мынауын!--}}

