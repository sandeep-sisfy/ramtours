<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\model\package;

class upd_pkg extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'ramtours:dbpkgupd';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		foreach( \DB::select('select * from yyy') as $y) {
			print $y->id . "\n";
			$p = package::find($y->id);
			if ($p) {
				$p->package_title = $y->package_title ;
				$p->is_display_pkg_title = $y->is_display_pkg_title ;
				$p->package_desc = $y->package_desc; 
				$p->package_type = $y->package_type; 
				$p->package_start_date = $y->package_start_date; 
				$p->package_end_date = $y->package_end_date; 
				$p->instant_approval = $y->instant_approval; 
				$p->package_hotel = $y->package_hotel; 
				$p->package_hotel_room = $y->package_hotel_room; 
				$p->room_reserved = $y->room_reserved; 
				$p->package_airline = $y->package_airline; 
				$p->package_flight_sche = $y->package_flight_sche; 
				$p->package_flight_location = $y->package_flight_location; 
				$p->package_car_suplier = $y->package_car_suplier; 
				$p->package_car = $y->package_car; 
				$p->package_profit_type = $y->package_profit_type; 
				$p->profit_curr = $y->profit_curr; 
				$p->package_profit_fhc = $y->package_profit_fhc; 
				$p->package_profit_fh = $y->package_profit_fh; 
				$p->package_profit_fc = $y->package_profit_fc; 
				$p->cheapest_room = $y->cheapest_room; 
				$p->cheapest_car = $y->cheapest_car; 
				$p->cheapest_flight_sche = $y->cheapest_flight_sche; 
				$p->package_status = $y->package_status; 
				$p->created_at = $y->created_at; 
				$p->updated_at = $y->updated_at; 
				$p->deleted_at = $y->deleted_at; 
				$p->package_lowest_price = $y->package_lowest_price; 
				$p->is_render = $y->is_render; 
				$p->is_render_priceis_render_price;
				$p->is_hot_deal = $y->is_hot_deal; 
				$p->header_custom_code = $y->header_custom_code; 
				$p->footer_custom_code = $y->footer_custom_code; 
				$p->pkg_instruction_text = $y->pkg_instruction_text; 
				$p->pkg_title_text = $y->pkg_title_text; 
				$p->slug = $y->slug; 
				$p->total_persons = $y->total_persons; 
				$p->total_persons_combinations = $y->total_persons_combinations; 
				$p->total_price_in_euro = $y->total_price_in_euro; 
				$p->is_fix_profit = $y->is_fix_profit; 
				$p->save();
			}
		}
	}
}
