<?php

namespace App\Http\Controllers\automation;

use App\Http\Controllers\Controller;
use App\model\attraction;
use App\model\car;
use App\model\flight;
use App\model\flight_schedule;
use App\model\hotel;
use App\model\Location;
use App\model\package;
use App\model\page;
use App\model\pagelink;
use App\model\room;
use App\model\wp_post;
use DB;

class AutomationController extends Controller
{
    public function location_flight_count()
    {
        $loctions = Location::all();
        foreach ($loctions as $loction) {
            $flights_src = flight::where(['flight_source' => $loction->id])->count();
            $flights_des = flight::where(['flight_desti' => $loction->id])->count();
            if ($flights_src != 0) {
                $loction->count_for_flight = $flights_src;
                $loction->save();
            } else {
                $loction->count_for_flight = $flights_des;
                $loction->save();
            }

        }
    }
    public function location_fch_count()
    {
        $loctions = Location::all();
        foreach ($loctions as $loction) {
            $packages = package::where([['package_type', 1], ['package_status', 1], ['package_flight_location', $loction->id]])->count();
            $loction->count_for_fhc = $packages;
            $loction->save();
        }
    }
    public function location_fc_count()
    {
        $loctions = Location::all();
        foreach ($loctions as $loction) {
            $packages = package::where([['package_type', 3], ['package_flight_location', $loction->id]])->count();
            $loction->count_for_fc = $packages;
            $loction->save();
        }
    }
    public function location_hotel_count()
    {
        $loctions = Location::all();
        foreach ($loctions as $loction) {
            $hotels = hotel::where(['hotel_location' => $loction->id])->count();
            $loction->count_for_accomodation = $hotels;
            $loction->save();
        }

    }
    public function copy_links()
    {
        $page_id = 29;
        $pagidid2 = page::find(137);
        $pagidid2->having_right_link = 1;
        $pagidid2->menu_title = 'מידע על ערים וכפרים ביער השחור';
        $pagidid2->save();
        $pagelinks = pagelink::where([['page_id', $page_id]])->orderBy('id', 'ASC')->get();
        foreach ($pagelinks as $pagelink) {
            $new_page_link = new pagelink;
            $new_page_link->pagelink_title = $pagelink->pagelink_title;
            $new_page_link->pagelink_url = $pagelink->pagelink_url;
            $new_page_link->page_id = $pagidid2->id;
            $new_page_link->save();
        }
    }
    public function import_pages()
    {
        $posts = wp_post::where(['post_type' => 'post'])->get();
        foreach ($posts as $post) {
            $page = new page;
            $page->page_title = $post->post_title;
            $page->page_disc = $post->post_content;
            if ($post->post_status == 'publish') {
                $page->page_status = 1;
            } else {
                $page->page_status = 0;
            }
            $page->slug = urldecode($post->post_name);
            $page->save();
        }
        $posts = wp_post::where(['post_type' => 'page'])->get();
        foreach ($posts as $post) {
            $page = new page;
            $page->page_title = $post->post_title;
            $page->page_disc = $post->post_content;
            if ($post->post_status == 'publish') {
                $page->page_status = 1;
            } else {
                $page->page_status = 0;
            }
            $page->slug = urldecode($post->post_name);
            $page->save();
        }
    }
    public function import_attr()
    {
        $hotels = wp_post::where(['post_type' => 'accommodation'])->get();
        $count2 = 1;
        $locname_array = array();
        foreach ($hotels as $hotel) {
            $terms = DB::table('wp_term_relationships')->join('wp_terms', 'wp_terms.term_id', '=', 'wp_term_relationships.term_taxonomy_id')->join('wp_term_taxonomy', 'wp_term_taxonomy.term_id', '=', 'wp_terms.term_id')
                ->where([['wp_term_relationships.object_id', $hotel->ID], ['wp_term_taxonomy.taxonomy', 'location']])->get();
            $count = 0;
            foreach ($terms as $term) {
                $hotel_id = $term->object_id;
                if ($count == 0) {
                    $loc_name = $term->name;
                    $parent = $term->parent;
                    $term_id = $term->term_id;
                } elseif ($term->$parent != 0) {
                    if ($term->parent != $parent) {
                        if (in_array($term_id, $this->get_all_parents($term->term_id))) {
                            $loc_name = $term->name;
                            $parent = $term->parent;
                            $term_id = $term->$term_id;
                        } elseif (in_array($term->term_id, $this->get_all_parents($term_id))) {
                            continue;
                        } elseif ($term_id > $term->term_id) {
                            continue;
                        } else {
                            $loc_name = $term->name;
                            $parent = $term->parent;
                            $term_id = $term->$term_id;
                        }
                    } else {
                        if ($term_id > $term->term_id) {
                            continue;
                        } else {
                            $loc_name = $term->name;
                            $parent = $term->parent;
                            $term_id = $term->$term_id;
                        }
                    }
                }
            }
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo $loc_name;
            if (in_array($loc_name, $locname_array)) {
                continue;
            }
            echo "<br>";
            echo $term_id;
            echo "<br>";
            $map_loc = DB::table('wp_postmeta')->where([['post_id', $hotel->ID], ['meta_key', 'hotel_mapping_location']])->get()->first();
            if (!empty($map_loc)) {
                var_dump($map_loc->meta_value);
                echo "<br>";
                $this->get_attaction($map_loc->meta_value, $loc_name);
            }
            $locname_array[] = $loc_name;

        }

    }

    public function get_attaction($map_loc, $loc_name)
    {
        $att_set = DB::table('wp_postmeta')->where([['post_id', $map_loc], ['meta_key', 'attractions_set']])->get()->first();
        $att_distactce = DB::table('wp_postmeta')->where([['post_id', $map_loc], ['meta_key', 'distances_to_attractions']])->get()->first();
        if (!empty($att_set)) {
            $distances = $att_distactce->meta_value;
            $att_set_id = $att_set->meta_value;
            $attractions_order_list = DB::table('wp_postmeta')->where([['post_id', $att_set_id], ['meta_key', 'attractions_order_list']])->get()->first();

            // echo "<pre>";
            //var_dump($attractions_order_list->meta_value);
            $attractions_order_list = explode(',', $attractions_order_list->meta_value);
            //var_dump($attractions_order_list);
            $distances = explode(',', $att_distactce->meta_value);
            //var_dump($distances);
            // die();
            $total_attr = count($attractions_order_list);
            for ($i = 1; $i <= $total_attr; $i++) {
                $attraction = new attraction;
                $attraction->attraction_title = wp_post::find($attractions_order_list[$i - 1])->post_title;
                $attraction->attraction_location = Location::where([['loc_name', $loc_name]])->first()->id;
                $attraction->attraction_distance = $distances[$i - 1];
                $attraction->attraction_sequence = $i;
                $attraction->save();
            }
            var_dump($distances);
            var_dump($att_set_id);
        }
    }
    public function get_all_parents($id, $parents = array())
    {
        $term = DB::table('wp_term_taxonomy')->where([['term_id', $id]])->get()->first();
        if ($term->parent == 0) {
            return $parents;
        } else {
            $parents[] = $term->parent;
        }
        return $this->get_all_parents($term->parent, $parents);
    }

    public function setup_package_fhc()
    {
        $this->setup_low_cost_package_fhc();
        $package = package::where([['package_type', 1], ['package_status', 1], ['is_render', null]])->get();
        foreach ($package as $pack) {
            $curr_pack = package::find($pack->id);
            if (!empty($curr_pack)) {
                $start_date = $curr_pack->package_start_date;
                $end_date = $curr_pack->package_end_date;
                $rooms = unserialize($pack->package_hotel_room);
                if (empty($rooms)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_room = array();
                $room_id = null;
                $count = 1;
                foreach ($rooms as $room) {
                    $curr_room = room::find($room);
                    if (empty($curr_room) && (empty($curr_room->room_available))) {
                        continue;
                    }
                    $room_price = get_rami_room_price_cheapest($room, $start_date);
                    if ($count == 1) {
                        $room_id = $room;
                        $old_price = $room_price['per_person_price'];
                    } elseif ($old_price <= $room_price['per_person_price']) {
                        $room_id = $room;
                        $old_price = $room_price['per_person_price'];
                    }
                    if (($old_price != 0)) {
                        $new_room[] = $room;
                    }
                    $count++;
                }
                if (empty($new_room)) {
                    $curr_pack->package_hotel_room = serialize($new_room);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_hotel_room = serialize($new_room);
                    $curr_pack->cheapest_room = $room_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
                $cars = unserialize($pack->package_car);
                if (empty($cars)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_car = array();
                $count = 1;
                $car_id = null;
                foreach ($cars as $car) {
                    $curr_car = car::find($car);
                    if (empty($curr_car)) {
                        continue;
                    }
                    $car_price = get_rami_car_price_cheapest($car, $start_date);
                    if ($count == 1) {
                        $car_id = $car;
                        $old_price = $car_price['per_person_price'];
                    } elseif ($old_price <= $car_price['per_person_price']) {
                        $car_id = $car;
                        $old_price = $car_price['per_person_price'];
                    }
                    if (($old_price != 0)) {
                        $new_car[] = $car;
                    }
                    $count++;
                }
                if (empty($new_car)) {
                    $curr_pack->package_car = serialize($new_car);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_car = serialize($new_car);
                    $curr_pack->cheapest_car = $car_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
                $flights = unserialize($pack->package_flight_sche);
                if (empty($flights)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_flight_sch = array();
                $count = 1;
                $flight_id = null;
                foreach ($flights as $flight) {
                    $curr_flight = flight_schedule::find($flight);
                    if (empty($flight)) {
                        continue;
                    }
                    $flight_price = get_rami_flight_price($flight);

                    $flight_price = $this->getFlightPriceWithPackage($flight_price, $curr_flight->package_profit, $curr_pack->is_fix_profit, $curr_pack->package_profit_fhc);

                    if ($count == 1) {
                        $flight_id = $flight;
                        $old_price = $flight_price;
                    } elseif ($old_price <= $flight_price) {
                        $flight_id = $flight;
                        $old_price = $flight_price;
                    }
                    if (($old_price != 0)) {
                        $new_flight_sch[] = $flight_id;
                    }
                    $count++;
                }
                if (empty($new_flight_sch)) {
                    $curr_pack->package_flight_sche = serialize($new_flight_sch);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_flight_sche = serialize($new_flight_sch);
                    $curr_pack->cheapest_flight_sche = $flight_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
            }
        }
    }

    public function setup_package_fh()
    {
        $package = package::where([['package_type', 2], ['package_status', 1], ['is_render', null]])->get();
        foreach ($package as $pack) {
            $curr_pack = package::find($pack->id);
            if (!empty($curr_pack)) {
                $start_date = $curr_pack->package_start_date;
                $end_date = $curr_pack->package_end_date;
                $rooms = unserialize($pack->package_hotel_room);
                if (empty($rooms)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_room = array();
                $room_id = null;
                $count = 1;
                foreach ($rooms as $room) {
                    $curr_room = room::find($room);
                    if (empty($curr_room) && (empty($curr_room->room_available))) {
                        continue;
                    }
                    $room_price = get_rami_room_price_cheapest($room, $start_date);
                    if ($count == 1) {
                        $room_id = $room;
                        $old_price = $room_price['per_person_price'];
                    } elseif ($old_price <= $room_price['per_person_price']) {
                        $room_id = $room;
                        $old_price = $room_price['per_person_price'];
                    }
                    if (($old_price != 0)) {
                        $new_room[] = $room;
                    }
                    $count++;
                }
                if (empty($new_room)) {
                    $curr_pack->package_hotel_room = serialize($new_room);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_hotel_room = serialize($new_room);
                    $curr_pack->cheapest_room = $room_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
                $flights = unserialize($pack->package_flight_sche);
                if (empty($flights)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_flight_sch = array();
                $count = 1;
                $flight_id = null;
                foreach ($flights as $flight) {
                    $curr_flight = flight_schedule::find($flight);
                    if (empty($flight)) {
                        continue;
                    }
                    $flight_price = get_rami_flight_price($flight);
                    $flight_price = $this->getFlightPriceWithPackage($flight_price, $curr_flight->package_profit, $curr_pack->is_fix_profit, $curr_pack->package_profit_fhc);

                    if ($count == 1) {
                        $flight_id = $flight;
                        $old_price = $flight_price;
                    } elseif ($old_price <= $flight_price) {
                        $flight_id = $flight;
                        $old_price = $flight_price;
                    }
                    if (($old_price != 0)) {
                        $new_flight_sch[] = $flight_id;
                    }
                    $count++;
                }
                if (empty($new_flight_sch)) {
                    $curr_pack->package_flight_sche = serialize($new_flight_sch);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_flight_sche = serialize($new_flight_sch);
                    $curr_pack->cheapest_flight_sche = $flight_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
            }
        }
    }
    public function setup_low_cost_package_fhc()
    {
        $package = package::where([['package_type', 1], ['package_status', 1], ['is_render_price', null]])->get();
        foreach ($package as $pack) {
            $curr_pack = package::find($pack->id);
            if (!empty($curr_pack)) {
                $start_date = $curr_pack->package_start_date;
                $end_date = $curr_pack->package_end_date;
                $cheapest_car = $curr_pack->cheapest_car;
                $cheapest_room = $curr_pack->cheapest_room;
                $cheapest_flight_sche = $curr_pack->cheapest_flight_sche;
                if (!empty($ccheapest_room) && !empty($cheapest_car) && !empty($cheapest_flight_sche)) {
                }
            }
        }

    }
    public function setup_low_cost_package_fh()
    {
        $package = package::where([['package_type', 2], ['package_status', 1], ['is_render_price', null]])->get();
        dd($package);
    }
    public function setup_low_cost_package_fc()
    {
        $package = package::where([['package_type', 3], ['package_status', 1], ['is_render_price', null]])->get();
        dd($package);
    }
    public function setup_package_fc()
    {
        $package = package::where([['package_type', 3], ['package_status', 1], ['is_render', null]])->get();
        foreach ($package as $pack) {
            $start_date = $curr_pack->package_start_date;
            $end_date = $curr_pack->package_end_date;
            $curr_pack = package::find($pack->id);
            if (!empty($curr_pack)) {
                $cars = unserialize($pack->package_car);
                if (empty($cars)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_car = array();
                $count = 1;
                $car_id = null;
                foreach ($cars as $car) {
                    $curr_car = car::find($car);
                    if (empty($curr_car)) {
                        continue;
                    }
                    $car_price = get_rami_car_price_cheapest($car, $start_date);
                    if ($count == 1) {
                        $car_id = $car;
                        $old_price = $car_price['per_person_price'];
                    } elseif ($old_price <= $car_price['per_person_price']) {
                        $car_id = $car;
                        $old_price = $car_price['per_person_price'];
                    }
                    if (($old_price != 0)) {
                        $new_car[] = $car;
                    }
                    $count++;
                }
                if (empty($new_car)) {
                    $curr_pack->package_car = serialize($new_car);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_car = serialize($new_car);
                    $curr_pack->cheapest_car = $car_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
                $flights = unserialize($pack->package_flight_sche);
                if (empty($flights)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                    continue;
                }
                $new_flight_sch = array();
                $count = 1;
                $flight_id = null;
                foreach ($flights as $flight) {
                    $curr_flight = flight_schedule::find($flight);
                    if (empty($flight)) {
                        continue;
                    }
                    $flight_price = get_rami_flight_price($flight);
                    $flight_price = $this->getFlightPriceWithPackage($flight_price, $curr_flight->package_profit, $curr_pack->is_fix_profit, $curr_pack->package_profit_fhc);

                    if ($count == 1) {
                        $flight_id = $flight;
                        $old_price = $flight_price;
                    } elseif ($old_price <= $flight_price) {
                        $flight_id = $flight;
                        $old_price = $flight_price;
                    }
                    if (($old_price != 0)) {
                        $new_flight_sch[] = $flight_id;
                    }
                    $count++;
                }
                if (empty($new_flight_sch)) {
                    $curr_pack->package_flight_sche = serialize($new_flight_sch);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_flight_sche = serialize($new_flight_sch);
                    $curr_pack->cheapest_flight_sche = $flight_id;
                    $curr_pack->is_render = 1;
                    $curr_pack->save();
                }
            }
        }
    }

    public function update_pack_profit()
    {
        $packages = package::all();
        foreach ($packages as $package) {
            $new_pack = package::find($package->id);
            $new_pack->package_profit_fhc = $new_pack->package_profit_fhc / 5;
            $new_pack->package_profit_fc = $new_pack->package_profit_fc / 5;
            //$new_pack->save();
        }
    }
    public function setup_all_package_cost()
    {
        $packages = package::where([['package_type', 1], ['package_status', 1]])->get();
        foreach ($packages as $package) {
            $this->setup_low_cost_for_package($package->id);
        }
    }
    public function setup_low_cost_for_package($id)
    {
        $curr_pack = package::find($id);
        if (!empty($curr_pack)) {
            $start_date = $curr_pack->package_start_date;
            $end_date = $curr_pack->package_end_date;
            if (($curr_pack->package_type == 1) || ($curr_pack->package_type == 2)) {
                $rooms = unserialize($curr_pack->package_hotel_room);
                if (empty($rooms)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                }
                $new_room = array();
                $room_id = null;
                $count = 1;
                foreach ($rooms as $room) {
                    $curr_room = room::find($room);
                    if (empty($curr_room) || (empty(get_rami_package_room_avalible($id, $room)))) {
                        continue;
                    }
                    $room_price = get_rami_room_price_cheapest($room, $start_date);
                    if ($count == 1) {
                        $room_id = $room;
                        $old_price = $room_price['per_person_price'];
                    } elseif (($old_price >= $room_price['per_person_price']) && ($room_price['per_person_price'] > 0)) {
                        $room_id = $room;
                        $old_price = $room_price['per_person_price'];
                    }
                    if (($old_price != 0)) {
                        $new_room[] = $room;
                    }
                    $count++;
                }
                if (empty($new_room)) {
                    $curr_pack->package_hotel_room = serialize($new_room);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_hotel_room = serialize($new_room);
                    $curr_pack->cheapest_room = $room_id;
                    $curr_pack->save();
                }
            } else {
                $curr_pack->package_hotel_room = serialize(array());
                $curr_pack->cheapest_room = null;
                $curr_pack->save();
            }
            if (($curr_pack->package_type == 1) || ($curr_pack->package_type == 3)) {
                $cars = unserialize($curr_pack->package_car);
                if (empty($cars)) {
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                }
                $new_car = array();
                $count = 1;
                $car_id = null;
                foreach ($cars as $car) {
                    $curr_car = car::find($car);
                    if (empty($curr_car)) {
                        continue;
                    }
                    $car_price = get_rami_car_price_cheapest($car, $start_date);
                    if ($count == 1) {
                        $car_id = $car;
                        $old_price = $car_price['per_person_price'];
                    } elseif (($old_price >= $car_price['per_person_price']) && ($car_price['per_person_price'] > 0)) {
                        $car_id = $car;
                        $old_price = $car_price['per_person_price'];
                    }
                    if (($old_price != 0)) {
                        $new_car[] = $car;
                    }
                    $count++;
                }
                if (empty($new_car)) {
                    $curr_pack->package_car = serialize($new_car);
                    $curr_pack->package_status = 0;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_car = serialize($new_car);
                    $curr_pack->cheapest_car = $car_id;
                    $curr_pack->save();
                }
            } else {
                $curr_pack->package_car = serialize(array());
                $curr_pack->cheapest_car = null;
                $curr_pack->save();
            }

            $flights = unserialize($curr_pack->package_flight_sche);
            if (empty($flights)) {
                $curr_pack->package_status = 0;
                $curr_pack->save();
            }
            $new_flight_sch = array();
            $count = 1;
            $flight_id = null;
            foreach ($flights as $flight) {
                $curr_flight = flight_schedule::find($flight);
                if (empty($curr_flight)) {
                    continue;
                }
                $flight_price = get_rami_flight_price($flight);
                $flight_price = $this->getFlightPriceWithPackage($flight_price, $curr_flight->package_profit, $curr_pack->is_fix_profit, $curr_pack->package_profit_fhc);

                if ($count == 1) {
                    $flight_id = $flight;
                    $old_price = $flight_price;
                } elseif (($old_price >= $flight_price) && ($flight_price > 0)) {
                    $flight_id = $flight;
                    $old_price = $flight_price;
                }
                if (($old_price != 0)) {
                    $new_flight_sch[] = $curr_flight->id;
                }
                $count++;
            }
            if (empty($new_flight_sch)) {
                $curr_pack->package_flight_sche = serialize($new_flight_sch);
                $curr_pack->package_status = 0;
                $curr_pack->save();
            } else {
                $curr_pack->package_flight_sche = serialize($new_flight_sch);
                $curr_pack->cheapest_flight_sche = $flight_id;
                $curr_pack->save();
            }
            $no_of_days = rami_get_no_of_days_diff($start_date, $end_date);
            $car_price = get_rami_car_price_cheapest($curr_pack->cheapest_car, $start_date);
            $room_price = get_rami_room_price_cheapest($curr_pack->cheapest_room, $start_date);
            $flight_price = get_rami_flight_price($curr_pack->cheapest_flight_sche);
            $flight_price = $this->getFlightPriceWithPackage($flight_price, $curr_flight->package_profit, $curr_pack->is_fix_profit, $curr_pack->package_profit_fhc);

            if (($car_price['person'] != $room_price['person']) && ($room_price['person'] != 0) && ($car_price['person'] != 0)) {
                $room_price_new = get_rami_room_price($curr_pack->cheapest_room, $car_price['person'], $start_date);
                $car_price_new = get_rami_car_price($curr_pack->cheapest_car, $room_price['person'], $start_date);
                if (($room_price_new == 0) || ($car_price_new == 0)) {
                    if ($car_price['person'] > $room_price['person']) {
                        $persons = $room_price['person'];
                    } else {
                        $persons = $car_price['person'];
                    }
                } else {
                    $persons = $room_price['person'];
                    $persons1 = $car_price['person'];
                }
            } elseif ($room_price['person'] > 0) {
                $persons = $room_price['person'];
            } else {
                $persons = $car_price['person'];
            }
            if (!empty($persons1)) {
                if ($car_price['person'] == $persons1) {
                    // get_rami_car_price($curr_pack->cheapest_car, $no_of_days ,$start_date);
                    $car_total_price = $car_price['price'] * ($no_of_days + 1);
                } else {
                    $car_total_price = $car_price_new * ($no_of_days + 1);
                }
                if ($room_price['person'] == $persons1) {
                    $room_total_price = $room_price['price'] * $no_of_days;
                } else {
                    $room_total_price = $room_price_new * $no_of_days;
                }
                $flight_total_price = $flight_price * $persons1;
                $total = $flight_total_price + $room_total_price + $car_total_price;
                // $per_adults_extra_charge=get_rami_price_conversion_to_shekel(30,2);
                // $adults = $persons1 > 2 ? 2 : $persons1;
                // $adults_total_extra_charge=$per_adults_extra_charge*$adults*$no_of_days;
                // $total+= $adults_total_extra_charge;
                $profit = get_rami_pakage_profit($curr_pack->id, $total) * $persons1;
                $total += $profit;
                $total_euro = get_rami_price_conversion_shekel_to_other($total, 2);
                $per_peson1 = get_rami_round_num($total_euro / $persons1);
            }
            if (($car_price['person'] == $persons) || ($car_price['person'] == 0)) {
                $car_total_price = $car_price['price'] * ($no_of_days + 1);
            } else {
                $car_total_price = $car_price_new * ($no_of_days + 1);
            }
            if (($room_price['person'] == $persons) || ($room_price['person'] == 0)) {
                $room_total_price = $room_price['price'] * $no_of_days;
            } else {
                $room_total_price = $room_price_new * $no_of_days;
            }
            $flight_total_price = $flight_price * $persons;
            $total = $flight_total_price + $room_total_price + $car_total_price;
            // $per_adults_extra_charge=get_rami_price_conversion_to_shekel(30,2);
            // $adults = $persons > 2 ? 2 : $persons;
            // $adults_total_extra_charge=$per_adults_extra_charge*2*$no_of_days;
            // $total+= $adults_total_extra_charge;
            $profit = get_rami_pakage_profit($curr_pack->id, $total) * $persons;
            $total += $profit;
            $total_euro = get_rami_price_conversion_shekel_to_other($total, 2);
            if ($persons == 0) {
                $curr_pack->package_lowest_price = 0;
                $curr_pack->total_persons = 0;
                $curr_pack->total_persons_combinations = 0;
                $curr_pack->total_price_in_euro = 0;
                $curr_pack->package_status = 0;
                $curr_pack->save();
            } else {
                $per_peson = get_rami_round_num($total_euro / $persons);
                if ((!empty($per_peson1)) && ($per_peson1 < $per_peson)) {
                    $curr_pack->package_lowest_price = $per_peson1;
                    $curr_pack->total_persons_combinations = '2' . '&' . "$persons1-2";
                    $curr_pack->total_persons = $persons1;
                    $curr_pack->total_price_in_euro = $total_euro;
                    $curr_pack->save();
                } else {
                    $curr_pack->package_lowest_price = $per_peson;
                    $curr_pack->total_persons_combinations = '2' . '&' . "$persons-2";
                    $curr_pack->total_persons = $persons;
                    $curr_pack->total_price_in_euro = $total_euro;
                    $curr_pack->save();
                }
            }
        }
    }

    private function getFlightPriceWithPackage($flight_price, $package_profit, $is_fix_profit, $package_profit_fhc)
    {
        // EH - get package price
        //==================================================== EH
        $prf = 0;
        if ($is_fix_profit) {
            $prf = $package_profit_fhc; // TBD - get by get_rami_pakage_profit
        } else {
            $prf = (int) $package_profit;
        }

	if ($flight_price < 1) {
		$flight_price = $prf;
	}
        return $flight_price < $prf ? $flight_price : $prf;
        //==================================================== EH
    }
}
