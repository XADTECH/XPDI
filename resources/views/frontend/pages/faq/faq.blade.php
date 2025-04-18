@php

$faqData = json_decode(getPageInfo()->faq, true);

@endphp

<div class="col-lg-7">
    <div id="accordion" class="generic-accordion generic-accordion-layout-2">
       
        @foreach($faqData as $index=> $item)
        <div class="card">
            <div class="card-header" id="heading{{$index}}">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$index}}"
                    aria-expanded="{{$index==0 ? 'true' : 'false'}}" aria-controls="collapse{{$index}}">
                    <i class="la la-plus"></i>
                    <i class="la la-minus"></i>
                    {{$item['name']}}
                </button>
            </div>
            <div id="collapse{{$index}}" class="collapse {{$index == 0 ? 'show' : ''}}" aria-labelledby="heading{{$index}}"
                data-parent="#accordion">
                <div class="card-body">
                    <p class="card-text">{{$item['value']}}</p>
                </div><!-- end card-body -->
            </div>
        </div><!-- end card -->
        @endforeach


    </div><!-- end generic-accordion -->

</div><!-- end col-lg-7-->
