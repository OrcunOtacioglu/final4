<div class="modal fade" id="{{ $hotel->reference }}M" tabindex="-1" role="dialog" aria-labelledby="{{ $hotel->reference }}MModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff; opacity: 0.9">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="hotel-{{ $hotel->reference }}" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>
