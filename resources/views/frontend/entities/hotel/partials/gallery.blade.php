<div class="img-gallery modal fade" id="{{ $hotel->reference }}G" tabindex="-1" role="dialog" aria-labelledby="{{ $hotel->reference }}GModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header mt10 p0 border-none">
                <button type="button" class="close color-white" data-dismiss="modal" aria-label="Close" style="color: #fff; opacity: 0.9">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title t-center color-white">{{ $hotel->name }}</h4>
            </div>
            <div class="modal-body">
                <div class="fotorama" data-width="100%"
                     data-ratio="800/600"
                     data-nav="thumbs">
                    @for($i = 1; $i <= 10; $i++)
                        <img src="/img/hotel-images/{{ $hotel->media_path . '/' . $i }}.jpg" alt="">
                    @endfor
                </div>
            </div>
        </div>
    </div>
</div>
