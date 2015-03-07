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
            'plan_id' => Input::get('plan_id')
        ]);
    }

    public function end()
    {
        return Redirect::to('/record');
    }
}