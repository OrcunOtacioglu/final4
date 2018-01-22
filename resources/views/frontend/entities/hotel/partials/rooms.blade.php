<div class="collapse pt-30" id="{{ $hotel->reference }}R">
    <hr>
    @foreach($hotel->rooms as $room)
        <div class="room">
            <div class="row">
                <div class="col-md-4 text-center">
                    <p class="form-control-static mb5">Room Type</p>
                    <p class="text-uppercase" style="font-size: 16px;">{{ $room->name }}</p>
                </div>
                <div class="col-md-4">
                    <label for="roomQty">Select Room Quantity</label>
                    <select name="roomQty" id="roomQty" class="form-control">
                        <option value="">Select Room Qty</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <div class="col-md-4 text-center">
                    <button class="btn btn-primary mt25">Add to Package</button>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>