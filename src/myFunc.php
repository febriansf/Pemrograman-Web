<?php 

function rp_format($angka)
{
    return "Rp. " . number_format($angka, 0, ',', '.');
}


// Fungsi untuk menjalankan query select
function get_data($table_name, $select_option, $order_by = NULL , $order = 'ASC'){
    require "database.php";

    $query = "SELECT $select_option FROM $table_name";

    if (isset($order_by)){
        $query .= " ORDER BY $order_by $order";
    }

    return mysqli_query($conn, $query);
}

// Fungsi untuk menjalankan query select tapi di filter
function search_data($table_name, $select_option, $filter_by=NULL, $filter=NULL, $order_by = NULL , $order = 'ASC'){
    require "database.php";

    $query = "SELECT $select_option FROM $table_name";

    if (isset($filter_by)){
        $query .= " WHERE $filter_by = '$filter'";
    }

    if (isset($order_by)){
        $query .= " ORDER BY $order_by $order";
    }

    return mysqli_query($conn, $query);
}

function print_rooms($nama, $harga, $gambar, $pos = '', $kapasitas){
    $pos_class = $pos == 'right-arrow' ? 'order-md-last' : '';
    return "
        <div class='col-lg-6'>
            <div class='room-wrap d-md-flex ftco-animate'>
                <a href='#' class='img ".$pos_class."' style='background-image: url(images/Rooms/".$gambar.")'></a>
                <div class='half ".$pos." d-flex align-items-center'>
                    <div class='text p-4 text-center'>
                        <p class='star mb-0'><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span></p>
                        <p class='mb-0'><span class='price mr-1'>".rp_format($harga)."</span> <span class='per'>per
                                night</span></p>
                        <h3 class='mb-3'><a href='#'>".$nama."</a></h3>
                        <p class='pt-1'><a href='reservation.php?guest=".$kapasitas."' class='btn-custom px-3 py-2 rounded'>Book Now <span class='icon-long-arrow-right'></span></a></p>
                    </div>
                </div>
            </div>
        </div>";
}

function print_menus($nama, $harga, $ket, $image)
{
	echo "
	<div class='col-lg-6 col-xl-6 d-flex'>
		<div class='pricing-entry rounded d-flex ftco-animate'>
			<div class='img' style='background-image: url(images/Restaurant/".$image.");'></div>
			<div class='desc p-4'>
				<div class='d-md-flex text align-items-start'>
					<h3><span>".$nama."</span></h3>
					<span class='price'>".rp_format($harga)."</span>
				</div>
				<div class='d-block'>
					<p>".$ket."</p>
				</div>
			</div>
		</div>
	</div>";
}