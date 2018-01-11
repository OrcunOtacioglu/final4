<?php

namespace App\Entities;

use Acikgise\Helpers\Helpers;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Event extends Model
{
    protected $table = 'events';

    protected $fillable = [
        'seat_map_id',
        'name',
        'slug',
        'description',
        'cover_photo',
        'start_date',
        'end_date',
        'on_sale_date',
        'category',
        'status',
        'listing',
        'allow_only_ticket_purchase'
    ];

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function seatMap()
    {
        return $this->hasOne(SeatMap::class, 'id', 'seat_map_id');
    }

    public static function createNew(Request $request)
    {
        $event = new Event();

        $event->seat_map_id = $request->seat_map_id;

        $event->name = $request->name;
        $event->slug = Helpers::generateSlug($request->name);
        $event->description = $request->description;
        $event->cover_photo = Helpers::uploadImage($request, 'cover-photos', 'cover_photo');

        $event->start_date = Helpers::getDateTimeFormat($request->start_date);
        $event->end_date = Helpers::getDateTimeFormat($request->end_date);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->on_sale_date);

        $event->category = $request->category;
        $event->status = $request->status;
        $event->listing = $request->listing;

        $event->is_seated = $request->is_seated;
        $event->allow_only_ticket_purchase = $request->allow_only_ticket_purchase;

        $event->created_at = Carbon::now();
        $event->updated_at = Carbon::now();

        $event->save();

        return $event;
    }

    public static function updateEntity(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $event->seat_map_id = $request->seat_map_id;

        $event->name = $request->name;
        $event->slug = $request->slug != null ? $request->slug : Helpers::generateSlug($request->name);
        $event->description = $request->description;
        $event->cover_photo = $request->cover_photo != null ? Helpers::uploadImage($request, 'cover-photos' ,'cover_photo') : $event->cover_photo;

        $event->start_date = Helpers::getDateTimeFormat($request->start_date);
        $event->end_date = Helpers::getDateTimeFormat($request->end_date);
        $event->on_sale_date = Helpers::getDateTimeFormat($request->on_sale_date);

        $event->category = $request->category;
        $event->status = $request->status;
        $event->listing = $request->listing;

        $event->is_seated = $request->is_seated;
        $event->allow_only_ticket_purchase = $request->allow_only_ticket_purchase;

        $event->updated_at = Carbon::now();

        $event->save();

        return $event;
    }
}
