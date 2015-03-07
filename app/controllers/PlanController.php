<?php

/**
 * Created by PhpStorm.
 * User: ichikawashingo
 * Date: 15/03/07
 * Time: 14:17
 */
class PlanController extends BaseController
{

    public function index()
    {
        $plan_list = [
            [
                'name' => 'プラン1',
                'description' => 'ミッドタウンの周り'
            ],
            [
                'name' => 'プラン2',
                'description' => '自宅の周り'
            ],
            [
                'name' => '皇居',
                'description' => '皇居の周り'
            ],
        ];
        return View::make('plan.index', [
            'plan_list' => $plan_list
        ]);
    }

    public function distance()
    {
        return View::make('plan.distance');
    }

    public function map()
    {
        return View::make('plan.map');
    }
}