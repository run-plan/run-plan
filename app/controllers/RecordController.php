<?php

/**
 * Created by PhpStorm.
 * User: ichikawashingo
 * Date: 15/03/07
 * Time: 14:17
 */
class RecordController extends BaseController
{

    public function index()
    {
        $user_id = Input::get('user_id');
        $records = [];
        if ($keys = $this->getUserKeys($user_id)) {
            foreach ($keys as $key) {
                $data = Cache::get($key);
                $records[] = [
                    'key' => $key,
                    'date' => $data['date'],
                    'total' => $data['total'],
                    'plan_id' => $data['plan_id']
                ];
            }
        }
        return View::make('record.index', [
            'plan_list' => $this->plan_list,
            'records' => $records,

        ]);
    }

    public function map()
    {
        $data = Cache::get(Input::get('key'));
        return View::make('record.map', $data);
    }

    public function get()
    {
        $data = Cache::get(Input::get('key'));
        return Response::json($data['records']);
    }
}