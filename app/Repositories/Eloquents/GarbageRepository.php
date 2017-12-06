<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\GarbageInterface;
use DB;

class GarbageRepository implements GarbageInterface
{
    public function getAll()
    {
        return DB::table('garbages')->paginate(10);
    }

    public function insert($request)
    {
        $payload = [
            'name' => $request->name,
            'street' => !isset($request->route) ? "Updating" : $request->street . " " . $request->route,
            'district' => !isset($request->district) ? "Updating" : $request->district ,
            'city' => $request->city,
            'country' => $request->country,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'type' => $request->type
        ];
        return DB::table('garbages')->insert($payload);
    }

    public function getById($id)
    {
        return DB::table('garbages')->find($id);
    }

    public function updateById($request, $id)
    {
        $payload = [
            'name' => $request->name,
            'street' => !isset($request->route) ? "Updating" : $request->street . " " . $request->route,
            'district' => !isset($request->district) ? "Updating" : $request->district ,
            'city' => $request->city,
            'country' => $request->country,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'type' => $request->type
        ];
        return DB::table("garbages")->where('id', $id)->update($payload);
    }

    public function deleteGarbage($id)
    {
        return DB::table("garbages")->delete($id);
    }
}
