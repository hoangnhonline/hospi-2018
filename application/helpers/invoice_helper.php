<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('invoiceDetails')) {
    function invoiceDetails($id, $ref, $reviewData = null)
    {
        $CI = get_instance();
        $CI->db->select('pt_bookings.*,pt_accounts.ai_mobile,pt_accounts.accounts_id,pt_accounts.ai_country,pt_accounts.accounts_email,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.ai_address_1,pt_accounts.ai_address_2');
        $CI->db->where('pt_bookings.booking_id', $id);
        $CI->db->where('pt_bookings.booking_ref_no', $ref);
        $CI->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $invoiceData = $CI->db->get('pt_bookings')->result();
        $bookingsubitem = json_decode($invoiceData[0]->booking_subitem);
        $bookingExtras = json_decode($invoiceData[0]->booking_extras);
        $bookingExtrasInfo = array();
        $subItemData = "";
        $itemData = "";
        $fullExpiry = date('F j Y', $invoiceData[0]->booking_expiry);
        $bookedItemInfo = "";

        $imgPathExtras = "";
        if ($invoiceData[0]->booking_type == 'hotels') {
            $imgPathExtras = PT_EXTRAS_IMAGES;
        } else if ($invoiceData[0]->booking_type == 'tours') {
            $imgPathExtras = PT_TOURS_EXTRAS_IMAGES;
        } else if ($invoiceData[0]->booking_type == 'cars') {
            $imgPathExtras = PT_CARS_EXTRAS_IMAGES;
        }

        if (!empty($bookingExtras)) {

            foreach ($bookingExtras as $bext) {
                $extTitle = getExtraTitleImg($bext->id);

                $bookingExtrasInfo[] = (object)array("id" => $bext->id, "title" => $extTitle->title, "price" => $bext->price, "thumbnail" => $imgPathExtras . $extTitle->image);
            }

        }

        if ($invoiceData[0]->booking_type == 'hotels') {
            $CI->load->library('hotels/hotels_lib');
            $CI->hotels_lib->set_id($invoiceData[0]->booking_item);
            $CI->hotels_lib->hotel_short_details();

            $itemData = array(
                "title" => $CI->hotels_lib->title,
                'thumbnail' => $CI->hotels_lib->thumbnail,
                'stars' => pt_create_stars($CI->hotels_lib->stars),
                'location' => $CI->hotels_lib->location,
                'address' => $CI->hotels_lib->mapAddress,
                'hotel_policy' => $CI->hotels_lib->hotel_policy,
            );
            $roomTitle = $CI->hotels_lib->getRoomTitleOnly($bookingsubitem->id);
            $subItemData = (object)array(
                'id' => $bookingsubitem->id,
                'title' => $roomTitle,
                'price' => $bookingsubitem->price,
                'quantity' => $bookingsubitem->count,
                'totalNightsPrice' => $bookingsubitem->price * $bookingsubitem->count * $invoiceData[0]->booking_nights,
                'total' => $bookingsubitem->price * $bookingsubitem->count);


        } elseif ($invoiceData[0]->booking_type == 'tours') {
            $CI->load->library('tours/tours_lib');
            $CI->tours_lib->set_id($invoiceData[0]->booking_item);
            $CI->tours_lib->tour_short_details();
            $itemData = array(
                "title" => $CI->tours_lib->title,
                'thumbnail' => $CI->tours_lib->thumbnail,
                'stars' => pt_create_stars($CI->tours_lib->stars),
                'location' => $CI->tours_lib->location,
                'tourDays' => $CI->tours_lib->tourDays,
                'tourNights' => $CI->tours_lib->tourNights,
                'tour_transportation' => $CI->tours_lib->transportation,
            );
            $subItemData = $bookingsubitem;
            /*
            $subItemData = (object)array(
              'id' => $bookingsubitem->id,
              'title' => $roomTitle,
              'price' => $bookingsubitem->price,
              'quantity' => $bookingsubitem->count,
              'totalNightsPrice' => $bookingsubitem->price * $bookingsubitem->count * $invoiceData[0]->booking_nights,
              'total' => $bookingsubitem->price * $bookingsubitem->count);*/
        } elseif ($invoiceData[0]->booking_type == 'cars') {
            $CI->load->library('cars/cars_lib');
            $CI->cars_lib->set_id($invoiceData[0]->booking_item);
            $CI->cars_lib->car_short_details();
            $itemData = array(
                "title" => $CI->cars_lib->title,
                'thumbnail' => $CI->cars_lib->thumbnail,
                'stars' => pt_create_stars($CI->cars_lib->stars),
                'location' => $CI->cars_lib->location,
            );
            $subItemData = $bookingsubitem;
            $bookedItemInfo = $CI->cars_lib->bookedInvoiceInfo($id);

        }

        $currencySymbol = $invoiceData[0]->booking_curr_symbol;
        if (empty($currencySymbol)) {
            $currencySymbol = "";
        }

        $CI->db->select('*');
        $CI->db->where('offer_id',$invoiceData[0]->booking_item);
        $rs = $CI->db->get('pt_special_offers')->result();
        $offer_detail =  $rs[0];

        $coupon_code = "";
        $discount_value= 0;
        if(isset($invoiceData[0]->booking_coupon) && !empty($invoiceData[0]->booking_coupon) ){
            $coupon_code = $invoiceData[0]->booking_coupon;
            $CI->db->select('*');
            $CI->db->where('code',$coupon_code);
            $rs = $CI->db->get('pt_coupons')->result();
            $couponVo =  $rs[0];
            if ($couponVo->type == '%') {
                $discount_value = $couponVo->value *  $invoiceData[0]->booking_remaining / 100;
            } else {
                $discount_value = $couponVo->value ;
            }
            //$this->updateCoupon('pt_coupons', $coupon_row->id);
        }
        /*echo "<pre>";
        print_r($itemData);
        echo "</pre>";*/
        $returnData = (object)array("id" => $invoiceData[0]->booking_id,
            "module" => $invoiceData[0]->booking_type,
            "itemid" => $invoiceData[0]->booking_item,
            "paymethod" => $invoiceData[0]->booking_payment_type,
            "code" => $invoiceData[0]->booking_ref_no,
            "nights" => $invoiceData[0]->booking_nights,
            "checkin" => fromDbToAppFormatDate($invoiceData[0]->booking_checkin),
            "checkout" => fromDbToAppFormatDate($invoiceData[0]->booking_checkout),
            "date" => pt_show_date_php($invoiceData[0]->booking_date),
            "currCode" => $invoiceData[0]->booking_curr_code,
            "currSymbol" => $currencySymbol,
            "checkoutAmount" => $invoiceData[0]->booking_deposit,
            "checkoutTotal" => $invoiceData[0]->booking_total,
            "status" => $invoiceData[0]->booking_status,
            "accountEmail" => $invoiceData[0]->accounts_email,
            "bookingID" => $invoiceData[0]->booking_id,
            "expiry" => pt_show_date_php($invoiceData[0]->booking_expiry),
            "expiryUnixtime" => $invoiceData[0]->booking_expiry,
            "bookingDate" => pt_show_date_php($invoiceData[0]->booking_date),
            "title" => $itemData['title'],
            "thumbnail" => $itemData['thumbnail'],
            "stars" => $itemData['stars'],
            "location" => $itemData['location'],
            "address" => $itemData['address'],
            "tax" => $invoiceData[0]->booking_tax,
            "subItem" => $subItemData,
            "extraBeds" => $invoiceData[0]->booking_extra_beds,
            "extraBedsCharges" => $invoiceData[0]->booking_extra_beds_charges,
            "cancelRequest" => $invoiceData[0]->booking_cancellation_request,
            "expiryFullDate" => $fullExpiry,
            "reviewsData" => $reviewData,
            "bookingExtras" => $bookingExtrasInfo,
            "amountPaid" => $invoiceData[0]->booking_amount_paid,
            "bookingUser" => $invoiceData[0]->booking_user,
            "userCountry" => $invoiceData[0]->ai_country,
            "userFullName" => $invoiceData[0]->ai_first_name . " " . $invoiceData[0]->ai_last_name,
            "userMobile" => $invoiceData[0]->ai_mobile,
            "userEmail" => $invoiceData[0]->accounts_email,
            "userAddress" => $invoiceData[0]->ai_address_1 . " " . $invoiceData[0]->ai_address_2,
            "nguoikhac" => $invoiceData[0]->nguoikhac,
            "sent_invoice" => $invoiceData[0]->sent_invoice,
            "company" => $invoiceData[0]->company,
            "mst" => $invoiceData[0]->mst,
            "companyadd" => $invoiceData[0]->companyadd,
            "sentto" => $invoiceData[0]->sentto,
            "guest" => $invoiceData[0]->guest,
            "additionaNotes" => $invoiceData[0]->booking_additional_notes,
            "couponCode" => $invoiceData[0]->booking_coupon,
            "couponRate" => $invoiceData[0]->booking_coupon_rate,
            "remainingAmount" => $invoiceData[0]->booking_remaining,
            "guestInfo" => json_decode($invoiceData[0]->booking_guest_info),
            "bookedItemInfo" => $bookedItemInfo,
            "honeymoon" => $invoiceData[0]->honeymoon,
            "paymentInfo" => $invoiceData[0]->booking_payment_info,
            "paymentmethod" => getPayment($invoiceData[0]->booking_payment_type),
            'hotel_policy' => $itemData['hotel_policy'],
            'tourDays' => $itemData['tourDays'],
            'tourNights' => $itemData['tourNights'],
            'tour_transportation' => $itemData['tour_transportation'],
            "adult" => $invoiceData[0]->booking_adults,
            "child" => $invoiceData[0]->booking_child,
            "use_condition" => str_replace('\n', '<br>', $invoiceData[0]->use_condition) ,
            "cancel_condition" => str_replace('\n', '<br>', $invoiceData[0]->cancel_condition),
            "booking_subitem" => (array) json_decode($invoiceData[0]->booking_subitem),
            'offer_detail' =>$offer_detail,
            'booking_quantity' => $invoiceData[0]->booking_quantity,
            'discount_value' => $discount_value,
            "booking_additional_notes" => $invoiceData[0]->booking_additional_notes,
            "booking_extra_beds_request" => $invoiceData[0]->booking_extra_beds_request,
            "customer_request" => $invoiceData[0]->customer_request,
             "booking_extras_fee" => $invoiceData[0]->booking_extras_fee,
             "booking_extras_quantity" => $invoiceData[0]->booking_extras_quantity,
             "is_unknown_date" => $invoiceData[0]->is_unknown_date,
        );

       /* echo "<pre>";
        print_r($returnData);
        echo "</pre>";*/
        return $returnData;


    }
}

if (!function_exists('pt_get_einvoice_details')) {
    function pt_get_einvoice_details($id, $itid)
    {
        $CI = get_instance();
        $CI->db->select('pt_ean_booking.*,pt_accounts.ai_mobile,pt_accounts.accounts_id,pt_accounts.ai_country,pt_accounts.accounts_email,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.ai_address_1,pt_accounts.ai_address_2');
        $CI->db->where('pt_ean_booking.book_id', $id);
        $CI->db->where('pt_ean_booking.book_itineraryid', $itid);
        $CI->db->join('pt_accounts', 'pt_ean_booking.book_user = pt_accounts.accounts_id', 'left');
        $invoiceData = $CI->db->get('pt_ean_booking')->result();

        /* $returnData = (object)array("id" => $invoiceData[0]->book_id,
               "module" => "ean",
               "itemid" => $invoiceData[0]->book_hotelid,
               "paymethod" => "",
               "code" => "",
               "nights" => $invoiceData[0]->book_nights,
               "checkin" => date("M j, Y", strtotime($invoiceData[0]->book_checkin)),
               "checkout" => date("M j, Y", strtotime($invoiceData[0]->book_checkout)),
               "date" => pt_show_date_php($invoiceData[0]->book_date),
               "currCode" => $invoiceData[0]->book_currency,
               "currSymbol" => "",
               "checkoutAmount" => $invoiceData[0]->book_total,
               "checkoutTotal" => $invoiceData[0]->book_total,
               "status" => "paid",
               "accountEmail" => "",
               "bookingID" => $invoiceData[0]->book_id,
               "expiry" => "",
               "expiryUnixtime" => "",
               "bookingDate" => pt_show_date_php($invoiceData[0]->book_date),
               "title" => $invoiceData[0]->book_hotel,
               "thumbnail" => "",
               "stars" => "",
               "location" => "",
               "nights" => $invoiceData[0]->book_nights,
               "tax" => "",
               "subItem" => "",
               "extraBeds" => "",
               "extraBedsCharges" => "",
               "cancelRequest" => "",
               "expiryFullDate" => "",
               "reviewsData" => "",
               "bookingExtras" => "",
               "amountPaid" => "",
               "bookingUser" => $invoiceData[0]->book_user,
               "userCountry" => $invoiceData[0]->ai_country,
               "userFullName" => $invoiceData[0]->ai_first_name . " " . $invoiceData[0]->ai_last_name,
               "userMobile" => $invoiceData[0]->ai_mobile,
               "userAddress" => $invoiceData[0]->ai_address_1. " " . $invoiceData[0]->ai_address_2,
               "additionaNotes" => "",
               "couponCode" => "",
               "couponRate" => "",
               "remainingAmount" => "",
               "guestInfo" => "",
               "book_response" => $invoiceData[0]->book_response

               );*/

        return $invoiceData;


    }
}

if (!function_exists('updateInvoiceStatus')) {
    function updateInvoiceStatus($invoiceid, $amount, $txnid, $paymethod, $status, $module, $totalamount)
    {
        $CI = get_instance();
        $remaining = $totalamount - $amount;
        $bookingdata = array(
            'booking_status' => $status,
            'booking_amount_paid' => $amount,
            'booking_txn_id' => $txnid,
            'booking_remaining' => $remaining,
            'booking_payment_type' => $paymethod
        );
        $CI->db->where('booking_id', $invoiceid);
        $CI->db->update('pt_bookings', $bookingdata);

        if ($module == "hotels") {
            $roombookingdata = array("booked_booking_status" => $status);
            $CI->db->where('booked_booking_id', $invoiceid);
            $CI->db->update('pt_booked_rooms', $roombookingdata);
        }

        if ($module == "cars") {
            $carbookingdata = array("booked_booking_status" => $status);
            $CI->db->where('booked_booking_id', $invoiceid);
            $CI->db->update('pt_booked_cars', $carbookingdata);
        }


    }
}

if (!function_exists('updateInvoiceLogs')) {
    function updateInvoiceLogs($invoiceid, $logs = "")
    {
        $CI = get_instance();
        if (!empty($logs)) {

            $logData = array(
                'booking_logs' => $logs
            );

            $CI->db->where('booking_id', $invoiceid);
            $CI->db->update('pt_bookings', $logData);

        }


    }
}

if (!function_exists('pt_get_selected_rooms')) {
    function pt_get_selected_rooms($roomstring)
    {
        $CI = get_instance();
        $eachroom = explode(",", $roomstring);
        $detail = array();
        foreach ($eachroom as $er) {

            $detail[] = explode("_", $er);

        }

        return $detail;

    }
}


if (!function_exists('pt_get_room_title')) {
    function pt_get_room_title($id)
    {
        $CI = get_instance();

        $CI->db->select('room_title');
        $CI->db->where('room_id', $id);
        $res = $CI->db->get('pt_rooms')->result();
        return $res[0]->room_title;

    }
}


if (!function_exists('pt_booked_extras')) {
    function pt_booked_extras($id)
    {
        $CI = get_instance();
        $result = array();
        $CI->db->select('extras_title,extras_discount,extras_basic_price');
        $CI->db->where('extras_id', $id);
        $res = $CI->db->get('pt_extras')->result();
        if (!empty($res)) {

            $result['title'] = $res[0]->extras_title;
            if ($res[0]->extras_discount > 0) {

                $result['price'] = $res[0]->extras_discount;


            } else {

                $result['price'] = $res[0]->extras_basic_price;


            }

        }
        return $result;

    }
}


if (!function_exists('pt_tax_details')) {
    function pt_tax_details($type, $id)
    {
        $deftax = 0;
        $deftype = 'fixed';

        $CI = get_instance();
        $result = array();
        $CI->db->select('front_tax_fixed,front_tax_percentage');
        $CI->db->where('front_for', $type);
        $defaultsettings = $CI->db->get('pt_front_settings')->result();

        if ($defaultsettings[0]->front_tax_fixed > 0) {
            $deftax = $defaultsettings[0]->front_tax_fixed;
            $deftype = 'fixed';

        } elseif ($defaultsettings[0]->front_tax_percentage > 0) {

            $deftax = $defaultsettings[0]->front_tax_percentage;
            $deftype = 'percentage';

        }


        if ($type == "hotels") {

            $CI->db->select('hotel_title,hotel_tax_fixed,hotel_tax_percentage');
            $CI->db->where('hotel_id', $id);
            $hotel = $CI->db->get('pt_hotels')->result();
            $result['title'] = $hotel[0]->hotel_title;

            if ($hotel[0]->hotel_tax_fixed > 0) {
                $result['tax'] = $hotel[0]->hotel_tax_fixed;
                $result['tax_type'] = 'fixed';

            } elseif ($hotel[0]->hotel_tax_percentage > 0) {

                $result['tax'] = $hotel[0]->hotel_tax_percentage;
                $result['tax_type'] = 'percentage';

            } else {

                $result['tax'] = $deftax;
                $result['tax_type'] = $deftype;


            }


        } elseif ($type == "tours") {
            $CI->db->select('tour_title,tour_tax_fixed,tour_tax_percentage');
            $CI->db->where('tour_id', $id);
            $tour = $CI->db->get('pt_tours')->result();
            $result['title'] = $tour[0]->tour_title;

            if ($tour[0]->tour_tax_fixed > 0) {
                $result['tax'] = $tour[0]->tour_tax_fixed;
                $result['tax_type'] = 'fixed';

            } elseif ($tour[0]->tour_tax_percentage > 0) {

                $result['tax'] = $tour[0]->tour_tax_percentage;
                $result['tax_type'] = 'percentage';

            } else {

                $result['tax'] = $deftax;
                $result['tax_type'] = $deftype;


            }


        } elseif ($type == "cars") {
            $CI->db->select('car_title,car_tax_fixed,car_tax_percentage');
            $CI->db->where('car_id', $id);
            $car = $CI->db->get('pt_cars')->result();
            $result['title'] = $car[0]->car_title;

            if ($car[0]->tour_tax_fixed > 0) {
                $result['tax'] = $car[0]->car_tax_fixed;
                $result['tax_type'] = 'fixed';

            } elseif ($car[0]->car_tax_percentage > 0) {

                $result['tax'] = $car[0]->car_tax_percentage;
                $result['tax_type'] = 'percentage';

            } else {

                $result['tax'] = $deftax;
                $result['tax_type'] = $deftype;


            }


        } elseif ($type == "cruises") {
            $CI->db->select('cruise_title,cruise_tax_fixed,cruise_tax_percentage');
            $CI->db->where('cruise_id', $id);
            $cruise = $CI->db->get('pt_cruises')->result();
            $result['title'] = $cruise[0]->cruise_title;

            if ($cruise[0]->cruise_tax_fixed > 0) {
                $result['tax'] = $cruise[0]->cruise_tax_fixed;
                $result['tax_type'] = 'fixed';

            } elseif ($cruise[0]->cruise_tax_percentage > 0) {

                $result['tax'] = $cruise[0]->cruise_tax_percentage;
                $result['tax_type'] = 'percentage';

            } else {

                $result['tax'] = $deftax;
                $result['tax_type'] = $deftype;


            }


        }

        return $result;

    }

}


if (!function_exists('pt_total_accomodates')) {
    function pt_total_accomodates($array)
    {

        $result = array();
        $comsep = explode(",", $array);
        foreach ($comsep as $com) {
            $items = explode("_", $com);
            $result[$items[0]] = $items[2];

        }
        return $result;

    }
}