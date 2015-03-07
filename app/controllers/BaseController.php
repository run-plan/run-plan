<?php

class BaseController extends Controller {

	protected $plan_list = [
		'1:plan:1' => [
			'name' => 'プラン1',
			'description' => 'ミッドタウンの周り',
			'records' => [
				[
					'lat' => 35.6657301,
					'lng' => 139.7318553
				],
				[
					'lat' => 35.6657966,
					'lng' => 139.73180579999996
				],
				[
					'lat' => 35.6657418,
					'lng' => 139.73183790000007
				],
			]
		],
		'1:plan:2' => [
			'name' => 'プラン2',
			'description' => '自宅の周り',
			'records' => [
				[
					'lat' => 35.6657301,
					'lng' => 139.7318553
				],
				[
					'lat' => 35.6657966,
					'lng' => 139.73180579999996
				],
				[
					'lat' => 35.6657418,
					'lng' => 139.73183790000007
				],
			]
		],
		'1:plan:3' => [
			'name' => '皇居',
			'description' => '皇居の周り',
			'records' => [
				[
					'lat' => 35.6657301,
					'lng' => 139.7318553
				],
				[
					'lat' => 35.6657966,
					'lng' => 139.73180579999996
				],
				[
					'lat' => 35.6657418,
					'lng' => 139.73183790000007
				],
			]
		],
	];

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	protected function getUserKeys($user_id)
	{
		return Cache::get($user_id);
	}

	protected function getPlan($user_id, $plan_id)
	{
		$key = $user_id . ':plan:' . $plan_id;
//		return Cache::get($key);
		return $this->plan_list[$key];
	}

}
