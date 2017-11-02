<form action="{{ action('HotelRoomController@update', ['id' => $room->id]) }}" method="POST">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

    <div class="row">
        <div class="col-md-4">
            <!-- Room_name Form Input -->
            <div class="form-group">
                <label for="room_name">Name</label>
                <input type="text" class="form-control" id="room_name" name="room_name" value="{{ $room->room_name }}">
            </div>
        </div>
        <div class="col-md-4">
            <!-- Category Form Input -->
            <div class="form-group">
                <label for="room_category">Category</label>
                <input type="text" class="form-control" id="room_category" name="room_category" value="{{ $room->room_category }}">
            </div>
        </div>
        <div class="col-md-4">
            <!-- Room_price Form Input -->
            <div class="form-group">
                <label for="room_cost">Cost</label>
                <input type="text" class="form-control" id="room_cost" name="room_cost" value="{{ $room->room_cost }}">
                <small class="form-text text-muted">(Per night without city tax)</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <!-- Room_price Form Input -->
            <div class="form-group">
                <label for="room_price">Room Price</label>
                <input type="text" class="form-control" id="room_price" name="room_price" value="{{ $room->room_price }}">
            </div>
        </div>
        <div class="col-md-4">
            <!-- Comission Form Input -->
            <div class="form-group">
                <label for="room_comission">Comission</label>
                <input type="text" class="form-control" id="room_comission" name="room_comission" value="{{ $room->room_comission }}">
            </div>
        </div>
        <div class="col-md-4">
            <!-- Fee Form Input -->
            <div class="form-group">
                <label for="room_fee">Fee</label>
                <input type="text" class="form-control" id="room_fee" name="room_fee" value="{{ $room->room_fee }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- Tax_percentage Form Input -->
            <div class="form-group">
                <label for="room_tax_percentage">Tax Percentage</label>
                <input type="text" class="form-control" id="room_tax_percentage" name="room_tax_percentage" value="{{ $room->room_tax_percentage }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="room_type">Room Type</label>
                <select name="room_type" id="room_type" class="form-control">
                    <option value="0" {{ $room->room_type === 0 ? 'selected' : '' }}>Single Use</option>
                    <option value="1" {{ $room->room_type === 1 ? 'selected' : '' }}>Double Use</option>
                    <option value="2" {{ $room->room_type === 2 ? 'selected' : '' }}>Triple Use</option>
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="misc">Miscellanous</label>
        <textarea name="misc" id="misc" cols="30" rows="5" class="form-control"></textarea>
    </div>

    <input type="submit" class="btn btn-secondary" value="Add Room">
</form>
