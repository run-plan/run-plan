<?php

/**
 * Created by PhpStorm.
 * User: ichikawashingo
 * Date: 15/03/07
 * Time: 14:17
 */
class RunController extends BaseController
{

    public function index()
    {
        return View::make('run.index', [
            'plan_list' => $this->plan_list
        ]);
    }

    public function start()
    {
        return View::make('run.map', [
            'user_id' => Session::get('user_id'),
            'plan_id' => Input::get('plan_id')
        ]);
    }

    public function end()
    {
        $user_id = Input::get('user_id');
        $key = $user_id . '_' . Input::get('time_id');
        Cache::forever($key, [
            'plan_id' => Input::get('plan_id'),
            'date' => date('Y-m-d H:i:s'),
            'total' => Input::get('total'),
            'records' => Cache::has($key) ? Cache::get($key) : [],
        ]);
        $user_keys = Cache::has($user_id) ? Cache::get($user_id) : [];
        $user_keys[] = $key;
        Cache::forever($user_id, $user_keys);
        return Redirect::to('/record?user_id='.$user_id);
    }

    public function record()
    {
        $key = Input::get('user_id') . '_' . Input::get('time_id');
        $records = Cache::has($key) ? Cache::get($key) : [];
        $records[] = Input::only(['lat', 'lng']);
        Cache::forever($key, $records);
        return 'OK';
    }

    public function get()
    {
        $data = $this->getPlan(Input::get('user_id'), Input::get('plan_id'));
        return Response::json($data['records']);
    }
}