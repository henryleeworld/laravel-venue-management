@extends('layouts.front')

@section('content')
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="site-section-title">
                        <h2>搜尋結果</h2>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($venues as $venue)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('venues.show', [$venue->slug, $venue->id]) }}" class="prop-entry d-block">
                        <figure>
                            <img src="{{ $venue->getFirstMediaUrl('main_photo', 'big_thumb') }}" alt="{{ $venue->name }}" class="img-fluid">
                        </figure>
                        <div class="prop-text">
                            <div class="inner">
                                <span class="price rounded">${{ $venue->price_per_hour }}</span>
                                <h3 class="title">{{ $venue->name }}</h3>
                                <p class="location">{{ $venue->address }}</p>
                            </div>
                            <div class="prop-more-info">
                                <div class="inner d-flex">
                                    <div class="col">
                                        <span>活動類型：</span>
                                        <strong>{{ implode(', ', $venue->event_types->pluck('name')->toArray()) }}</strong>
                                    </div>
                                    <div class="col">
                                        <span>人數：</span>
                                        <strong>{{ $venue->people_minimum }} - {{ $venue->people_maximum }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

            {{ $venues->appends(request()->except('page'))->links() }}
        </div>
    </div>

@endsection