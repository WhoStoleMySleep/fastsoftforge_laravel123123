@vite(['resources/scss/card.scss', 'resources/ts/card.ts'])
<div class="card">
    @if($revert == 'false')
        <a class="card__link" href="{{$link}}">{{$link}}</a>
        <img src="{{$img}}" alt="" class="card__img">
        <h3 class="card__title">{{$name}}</h3>
        <p class="card__description">{{$about}}</p>
        <p class="card__technologies">Технологии: {{$technologies}}</p>
    @elseif($revert == 'true')
        <h3 class="card__title">{{$name}}</h3>
        <p class="card__description">{{$about}}</p>
        <p class="card__technologies">Технологии: {{$technologies}}</p>
        <img src="{{$img}}" alt="" class="card__img">
        <a class="card__link" href="{{$link}}">{{$link}}</a>
    @endif
</div>