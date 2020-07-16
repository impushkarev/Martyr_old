@section('last-collection')
<section class="last-collection" style="background-image: url('{{ asset('img/welcome/last/ПОСТЕР5.jpg') }}');">
    <h1>{{ __('welcome.new_collection') }}</h1>
    <div class="container bgc" style="background-image: url('{{ asset('img/welcome/last/ПОСТЕР1.jpg') }}');">
        <div class="item">
            <div class="item-container">
                <div class="desc"> 
                </div>
            </div>
            <a href="" class="item-container">
                <img src="{{ asset('img/welcome/last/ПОСТЕР2.jpg') }}" alt="" class="thumbnail">
            </a>
        </div>
        <div class="item">
            <a href="" class="item-container">
                <img src="{{ asset('img/welcome/last/ПОСТЕР2.jpg') }}" alt="" class="thumbnail">
            </a>
            <div class="item-container">
            
            </div>
        </div>
        <div class="button-container">
            <a href="{{ route('cat') }}" class="button">
                {{ __('interface.button_more') }}
            </a>
        </div>
    </div> 
</section>
@endsection