<?php



class Apihotels_model extends CI_Model {

		public $settings;



		function __construct() {

// Call the Model constructor

				parent :: __construct();

				$this->load->helper('apihelp');

				$this->load->library('hotels/hotels_lib');

				$this->settings = $this->settings_model->get_settings_data();

		}



		function get_hotels() {

				$result = array();

				$this->db->select('pt_hotels.hotel_id,pt_hotels.hotel_basic_price,pt_hotels.hotel_title,pt_hotels.hotel_desc,pt_hotels.hotel_stars,pt_hotels.hotel_city');

				$this->db->where('pt_hotels.hotel_status', '1');

				$this->db->order_by('pt_hotels.hotel_id', 'desc');

				$rs = $this->db->get('pt_hotels')->result();

				if (!empty ($rs)) {

						foreach ($rs as $r) {

								$aprice = api_hotel_advanced_price($r->hotel_id);

								$this->hotels_lib->set_id($r->hotel_id);

								$this->hotels_lib->hotel_short_details();

								$city = $this->hotels_lib->city;

								$isfeatured = false;

								if ($this->hotels_lib->isfeatured == "1") {

										$isfeatured = true;

								}

								if (empty ($aprice)) {

										$price = $r->hotel_basic_price;

								}

								else {

										$price = $aprice;

								}

								$result["response"][] = array('id' => $r->hotel_id, 'title' => $r->hotel_title, 'description' => limit_chars(strip_tags($r->hotel_desc), 75), 'price' => $price, 'thumbnail' => $this->hotel_thumbnail($r->hotel_id), 'city' => $city, 'stars' => $r->hotel_stars, 'featured' => $isfeatured);

						}

						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}



		function get_featured_hotels() {

				$result = array();

				$this->load->model('hotels/hotels_model');

				$rs = $this->hotels_model->featured_hotels_front();

				if (!empty ($rs)) {

						foreach ($rs as $r) {

								$aprice = api_hotel_advanced_price($r->hotel_id);

								if (empty ($aprice)) {

										$price = $r->hotel_basic_price;

								}

								else {

										$price = $aprice;

								}

								$result["response"][] = array('id' => $r->hotel_id, 'title' => $r->hotel_title, 'description' => limit_chars(strip_tags($r->hotel_desc), 75), 'price' => $price, 'thumbnail' => $this->hotel_thumbnail($r->hotel_id), 'stars' => $r->hotel_stars);

						}

						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}


    // List all hotels on front listings page

		function list_hotels_front($perpage = 10, $offset = null, $orderby = null) {

				$data = array();

               // $hotelslist = $lists['hotels'];

				if ($offset != null) {

						$offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;

				}

				$this->db->select('pt_hotels.*,pt_rooms.room_basic_price as price');

				if ($orderby == "za") {

						$this->db->order_by('pt_hotels.hotel_title', 'desc');

				}

				elseif ($orderby == "az") {

						$this->db->order_by('pt_hotels.hotel_title', 'asc');

				}

				elseif ($orderby == "oldf") {

						$this->db->order_by('pt_hotels.hotel_id', 'asc');

				}

				elseif ($orderby == "newf") {

						$this->db->order_by('pt_hotels.hotel_id', 'desc');

				}

				elseif ($orderby == "ol") {

						$this->db->order_by('pt_hotels.hotel_order', 'asc');

				}

				elseif ($orderby == "p_lh") {

						$this->db->order_by('pt_rooms.room_basic_price', 'asc');

				}

				elseif ($orderby == "p_hl") {

						$this->db->order_by('pt_rooms.room_basic_price', 'desc');

				}

				elseif ($orderby == "s_lh") {

						$this->db->order_by('pt_hotels.hotel_stars', 'asc');

				}

				elseif ($orderby == "s_hl") {

						$this->db->order_by('pt_hotels.hotel_stars', 'desc');

				}

               // $this->db->where_in('pt_hotels.hotel_id', $hotelslist);

				$this->db->select_avg('pt_reviews.review_overall', 'overall');

				$this->db->group_by('pt_hotels.hotel_id');

               $this->db->join('pt_rooms', 'pt_hotels.hotel_id = pt_rooms.room_hotel', 'left');

			    $this->db->join('pt_reviews', 'pt_hotels.hotel_id = pt_reviews.review_itemid', 'left');

				$this->db->where('pt_hotels.hotel_status', '1');

				$query = $this->db->get('pt_hotels', $perpage, $offset);

//  $data['all']  = $this->db->get('pt_hotels',$perpage,$offset)->result();

			   $rs = $query->result();

				$data['rows'] = $query->num_rows();

			   	if (!empty ($rs)) {

						foreach ($rs as $r) {

							   $this->hotels_lib->set_id($r->hotel_id);

     $this->hotels_lib->hotel_short_details();

     $this->hotels_lib->bestprice();

      if($this->hotels_lib->isavailable && $this->hotels_lib->roomsavailable){


								$result["response"][] = array('id' => $r->hotel_id, 'title' => $this->hotels_lib->title, 'description' => limit_chars(strip_tags($this->hotels_lib->desc), 75), 'price' => $this->hotels_lib->bestprice, 'thumbnail' => $this->hotel_thumbnail($r->hotel_id), 'city' => $this->hotels_lib->city, 'stars' => $this->hotels_lib->stars);
                            }
						}

						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}

		function get_offers_hotels() {

				$result = array();

				$this->load->model('hotels/hotels_model');

				$rs = $this->hotels_model->specialoffer_hotels();

				if (!empty ($rs)) {

						foreach ($rs as $r) {

								$aprice = api_hotel_advanced_price($r->hotel_id);

								if (empty ($aprice)) {

										$price = $r->hotel_basic_price;

								}

								else {

										$price = $aprice;

								}

								$result["response"][] = array('id' => $r->hotel_id, 'title' => $r->hotel_title, 'description' => limit_chars(strip_tags($r->hotel_desc), 75), 'price' => $price, 'thumbnail' => $this->hotel_thumbnail($r->hotel_id), 'stars' => $r->hotel_stars);

						}

						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}



		function search_hotels_by_text() {

				$result = array();

				$txtsearch = $this->input->get('searchquery');
				
				$temp[] = strtok($txtsearch, " ,-");
				$txtsearch = $temp[0];

				$checkin = $this->input->get('checkin');

				$checkout = $this->input->get('checkout');

				$adult = $this->input->get('adults');

				$child = $this->input->get('child');

				$stars = $this->input->get('stars');

				$days = api_count_days($checkin, $checkout);

				$this->db->select('pt_hotels.hotel_title,pt_hotels.hotel_id,pt_hotels.hotel_city,pt_hotels.hotel_desc,



  pt_hotels.hotel_stars,pt_hotels.hotel_basic_price,pt_hotels.hotel_status');

//  $this->db->select_avg('pt_reviews.review_overall','overall');


				$this->db->group_by('pt_hotels.hotel_id');

// $this->db->join('pt_reviews','pt_hotels.hotel_id = pt_reviews.review_itemid','left');

				$this->db->like('pt_hotels.hotel_title', $txtsearch);

				$this->db->having('pt_hotels.hotel_status', '1');

				$rs = $this->db->get('pt_hotels')->result();

				if (!empty ($rs)) {

						foreach ($rs as $r) {

								$aprice = api_hotel_advanced_price($r->hotel_id);

								if (empty ($aprice)) {

										$price = $r->hotel_basic_price;

								}

								else {

										$price = $aprice;

								}

								$result["response"][] = array('id' => $r->hotel_id, 'title' => $r->hotel_title, 'description' => limit_chars(strip_tags($r->hotel_desc), 75), 'price' => $price, 'thumbnail' => $this->hotel_thumbnail($r->hotel_id),'stars' => $r->hotel_stars);

						}

						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}



		function hotel_thumbnail($id) {

				$this->db->select('himg_image');

				$this->db->where('himg_hotel_id', $id);

				$this->db->where('himg_approved', '1');

				$this->db->where('himg_type', 'default');

				$q = $this->db->get('pt_hotel_images')->result();

				if (!empty ($q)) {

						$result = PT_HOTELS_SLIDER_THUMBS . $q[0]->himg_image;

				}

				else {

						$result = PT_BLANK;

				}

				return $result;

		}



		function hotel_details($hotelid) {

				$result = array();

				$roomsarray = array();

				$this->hotels_lib->set_id($hotelid);

				$this->hotels_lib->hotel_short_details();

				$this->db->select('hotel_id,hotel_basic_price,hotel_title,hotel_desc,hotel_latitude,hotel_longitude,



     hotel_admin_review,hotel_additional_facilities,hotel_check_in,hotel_check_out,hotel_adults,hotel_children,hotel_stars,hotel_policy,hotel_city');

				$this->db->where('pt_hotels.hotel_id', $hotelid);

				$rs = $this->db->get('pt_hotels')->result();

				if (!empty ($rs)) {

						$aprice = api_hotel_advanced_price($rs[0]->hotel_id);

						if (empty ($aprice)) {

								$price = $rs[0]->hotel_basic_price;

						}

						else {

								$price = $aprice;

						}

						$images = api_hotel_images($rs[0]->hotel_id);
                        $rooms = $this->hotels_lib->available_rooms();
                        foreach($rooms as $room){
                         $roomsarray[] = array('room_id' => $room['id'],'room_title' => $room['roomtitle'],'room_desc' => $room['desc'],'price' => $room['roomprice'],'thumbnail' => $room['roomsmallthumb'],'adults' => $room['room_adults'],'children' => $room['room_children'],'rooms_available' => $room['available_quantity']);
                        }
                        $paymentopts = implode(", ", api_hotel_opts($rs[0]->hotel_id, "payment"));

						$recreation = implode(", ", api_hotel_opts($rs[0]->hotel_id, "recreation"));

						$amenities = implode(", ", api_hotel_opts($rs[0]->hotel_id, "amenities"));

						$policies = array("check_in" => $rs[0]->hotel_check_in, "check_out" => $rs[0]->hotel_check_out, "adults" => $rs[0]->hotel_adults, "children" => $rs[0]->hotel_children, "payment_options" => $paymentopts, "privacy" => $rs[0]->hotel_policy);

						$reviews = $this->hotels_lib->hotel_reviews_for_api();

						$result["response"]['id'] = $hotelid;

						$result["response"]['title'] = $this->hotels_lib->title;

						$result["response"]['description'] = strip_tags($this->hotels_lib->desc);

						$result["response"]['city'] = $this->hotels_lib->city;

						$result["response"]['our_review'] = $rs[0]->hotel_admin_review;

						$result["response"]['additional_facilities'] = $rs[0]->hotel_additional_facilities;

						$result["response"]['recreation'] = $recreation;

						$result["response"]['amenities'] = $amenities;

						$result["response"]['policies'] = $policies;

						$result["response"]['reviews'] = $reviews;

						$result["response"]['price'] = $price;

						$result["response"]['latitude'] = $rs[0]->hotel_latitude;

						$result["response"]['longitude'] = $rs[0]->hotel_longitude;

						$result["response"]['stars'] = $this->hotels_lib->stars;

						$result["response"]['images'] = $images;

                        $result["response"]['rooms'] = $roomsarray;

						$bookingDetails["nights"] = $this->hotels_lib->stay;
						$bookingDetails['deposit_type'] = $this->hotels_lib->comm_type;
						$bookingDetails['deposit_value'] = $this->hotels_lib->comm_value;
						$bookingDetails['tax_type'] = $this->hotels_lib->tax_type;
						$bookingDetails['tax_value'] = $this->hotels_lib->tax_value;
						$bookingDetails['gateway_id'] = $this->settings[0]->default_gateway;
						$bookingDetails['gateway_value'] = $this->hotels_lib->paymethodValue($this->settings[0]->default_gateway);
						
						$result["response"]["bookingDetails"] = $bookingDetails;
						
						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}



		function hotel_book($hotelid, $checkin, $checkout) {

				$result = array();

				$roomsarray = array();

				$this->hotels_lib->set_id($hotelid);

				$this->hotels_lib->hotel_short_details();

				$this->db->select('pt_hotels.hotel_id,pt_hotels.hotel_basic_price,pt_hotels.hotel_title,pt_hotels.hotel_desc,pt_hotels.hotel_latitude,pt_hotels.hotel_longitude');

				$this->db->where('pt_hotels.hotel_id', $hotelid);

				$rs = $this->db->get('pt_hotels')->result();

				if (!empty ($rs)) {

						$aprice = api_hotel_advanced_price($rs[0]->hotel_id);

						if (empty ($aprice)) {

								$price = $rs[0]->hotel_basic_price;

						}

						else {

								$price = $aprice;

						}

						$images = api_hotel_images($rs[0]->hotel_id);

						$rooms = $this->hotels_lib->hotel_rooms();

						foreach ($rooms as $room) {

								$roomthumb = api_default_room_image($room->room_id);

// $roomimages = array();

								if (!empty ($roomthumb)) {

										$roomthumbnail = PT_ROOMS_IMAGES . $roomthumb;

								}

								else {

										$roomthumbnail = PT_BLANK;

								}

								$roomprice = api_room_booking_adv_price($room->room_id, $checkin, $checkout);

								$unavailable = api_is_room_unvailable($room->room_id, $checkin, $checkout);

								$bookedrooms = api_is_room_booked($room->room_id, $checkin, $checkout);

								$nights = api_count_days($checkin, $checkout);

								$totalroomscount = $room->room_quantity;

								if ($unavailable) {

										$availablerooms = "0";

								}

								else {

										$availablerooms = $totalroomscount - $bookedrooms;

								}

								$roomsarray[] = array("room_id" => $room->room_id, "room_title" => $room->room_title, "room_desc" => $room->room_desc, "price" => $roomprice, "roomprice" => $roomprice, "adults" => $room->room_adults, "children" => $room->room_children, "rooms_available" => $availablerooms, "thumbnail" => $roomthumbnail);

//  $roomsarray[]['thumbnail'] = ;

						}

// $result["response"] = $rs;

						$result["response"]['id'] = $hotelid;

						$result["response"]['title'] = $rs[0]->hotel_title;

// $result["response"]['description'] = strip_tags($rs[0]->hotel_desc);

// $result["response"]['price'] = $price;

//$result["response"]['latitude'] = $rs[0]->hotel_latitude;

// $result["response"]['longitude'] = $rs[0]->hotel_longitude;

//  $result["response"]['images'] = $images;

						$result["response"]['thumbnail'] = $this->hotels_lib->thumbnail;

						$result["response"]['nights'] = $nights;

						$result["response"]['deposit_type'] = $this->hotels_lib->comm_type;

						$result["response"]['deposit_value'] = $this->hotels_lib->comm_value;

						$result["response"]['tax_type'] = $this->hotels_lib->tax_type;

						$result["response"]['tax_value'] = $this->hotels_lib->tax_value;

						$result["response"]['gateway_id'] = $this->settings[0]->default_gateway;

						$result["response"]['gateway_value'] = "5";

						$result["response"]['nights'] = $nights;

						$result["response"]['rooms'] = $roomsarray;

						$result['currency_code'] = $this->settings[0]->currency_code;

						$result['currency_sign'] = $this->settings[0]->currency_sign;

						return $result;

				}

				else {

						return $result;

				}

		}



}