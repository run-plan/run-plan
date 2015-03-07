<?php

class BaseController extends Controller {

	protected $plan_list = [
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

}
