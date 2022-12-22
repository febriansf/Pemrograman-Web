<?php 

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once "myFunc.php";
        require_once "database.php";

        $rooms = mysqli_query($conn, "SELECT * FROM room_type WHERE capacity >= $_POST[guest] AND amount !=0");

        if (mysqli_num_rows($rooms) > 0){

            echo "<tbody id='filter-result'>
                <div class='d-flex justify-content-center'>
                                    <div class='spinner-border text-primary' role='status' id='load' style='position: absolute; top: 50%; display: none;'>
                                    </div>
                                </div>";
            while ($room = mysqli_fetch_assoc($rooms)){
                echo "<tr>
                <td scope='row'>
                    <div class='row no-gutters mb-2'>
                        <div class='col-md-12 order-md-last d-flex'>
                            <div class='room-wrap d-md-flex'>
                                <a href='#' class='img w-50 h-auto' style='background-image: url(/images/Rooms/".$room['image'].")'></a>
                                <div class='half d-flex align-items-center'>
                                    <div class='text p-2 text-center'>
                                        <p class='star mb-0'><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span><span class='ion-ios-star'></span></p>
                                        <p class='mb-0'><span class='price mr-1'>".rp_format($room['price'])."</span> <span class='per'> /
                                                night</span></p>
                                        <h5 class='mb-3'><a href='rooms.php'>".$room['name']."</a></h5>
                                        <p class='pt-1'><button type='button' id='book-modal-btn' class='btn-custom px-1 py-0 rounded' data-id='".$room['type_id']."'>Book Now <span class='icon-long-arrow-right'></span></button></p>

                                    </div>
                                    <div class='text text-dark p-2 text-left'>
                                        <p class='mb-0'><span class='mr-1 per'><i class='fas fa-cube'></i> ".$room['size']." m&#178;</span></p>
                                        <p class='mb-0'><span class='mr-1 per'><i class='fas fa-user'></i> ".$room['capacity']."</span></p>
                                        <p class='mb-0'><span class='mr-1 per'><i class='fas fa-wifi'> </i> <i class='fas fa-fan'></i> <i class='fas fa-utensils'></i></span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>";
            }
            echo "</tbody>";
        } else {
            echo "<tbody id='filter-result'>
                <tr>
                <td scope='row'>
                    <div class='row no-gutters mb-2'>
                        <div class='col-md-12 order-md-last d-flex'>
                            <div class='room-wrap d-md-flex'>
                                <h4>Rooms not Available</h4>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            </tbody>";
        }
    }
