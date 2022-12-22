<?php
session_start();

include "myFunc.php";
require_once "database.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bookBtn"])) {

    if (!isset($_SESSION['authenticated'])) {

        echo "
        <tbody>
                <tr>
                    <td><h4>Harap <a href='../login.php'>Login</a> Terlebih Dahulu!</h4></td>
                </tr>
        </tbody>";
    } else {
        $today = date("D, d-M-Y");

        $data = mysqli_query($conn, "SELECT user.fullname, user.email, user.telephone FROM user WHERE user.uid=$_SESSION[uid]");

        $userdata = mysqli_fetch_assoc($data);

        $rooms = mysqli_query($conn, "SELECT type_id, name, price FROM room_type WHERE type_id = $_POST[room_type]");

        $checkin = new DateTime($_POST['checkin']);
        $checkout = new DateTime($_POST['checkout']);

        $room = mysqli_fetch_assoc($rooms);

        $duration = date_diff($checkin, $checkout)->format("%a");

        $total_price = $room['price'] * $duration;

        echo "
            <tbody>
                <tr>
                    <td scope='row' class='w-50'>Name</td>
                    <td>:</td>
                    <td class='text-left'>$userdata[fullname]</td>
                </tr>
                <tr>
                    <td scope='row'>Email</td>
                    <td>:</td>
                    <td class='text-left'>$userdata[email]</td>
                </tr>
                <tr>
                    <td scope='row'>Telephone</td>
                    <td>:</td>
                    <td class='text-left'>$userdata[telephone]</td>
                </tr>
                <tr>
                    <td scope='row'>Booked date</td>
                    <td>:</td>
                    <td class='text-left'>$today</td>
                </tr>
                <tr>
                    <td scope='row'>From - To</td>
                    <td>:</td>
                    <td class='text-left'>" . $_POST['checkin'] . " to " . $_POST['checkout'] . "</td>
                </tr>
                <tr>
                    <td scope='row'>Room Type</td>
                    <td>:</td>
                    <td class='text-left'>$room[name]</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td scope='row'>Notes</td>
                    <td>:</td>
                    <td class='text-left'>$_POST[notes]</td>
                </tr>
                <tr>
                    <td></td>
                </tr>
                <tr>
                    <td scope='row'>Price per Night</td>
                    <td>:</td>
                    <td class='text-left'>" . rp_format($room['price']) . "</td>
                </tr>
                <tr>
                    <td scope='row'>Total Price</td>
                    <td>:</td>
                    <td class='text-left'>" . rp_format($total_price) . "</td>
                </tr>
            </tbody>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET["submit"])) {
    if (isset($_SESSION['authenticated'])) {

        require_once "database.php";

        $checkin = $_POST['checkin'];
        $checkout = $_POST['checkout'];

        print_r($checkin);

        $query_reservation = "INSERT INTO reservation(id, check_in, check_out, uid, room_id, notes) VALUES (NULL, '$checkin', '$checkout', '$_SESSION[uid]', '$_POST[room_type]', '$_POST[notes]');";

        if (mysqli_query($conn, $query_reservation)) {

            $last_id = mysqli_query($conn, "SELECT LAST_INSERT_ID() as reservation_id");

            $reservation_id = mysqli_fetch_assoc($last_id)['reservation_id'];

            $query_booking = "INSERT INTO booking(id, uid, status, notes) VALUES($reservation_id, $_SESSION[uid], 'Pending', '$_POST[notes]' )";

            if (mysqli_query($conn, $query_booking)) {

                mysqli_query($conn, "UPDATE `room_type` SET amount=amount-1 WHERE `room_type`.`type_id` = '$_POST[room_type]'; ");

                echo "
                    <tbody>
                        <tr>
                            <td>
                                <h4>Reservasi berhasil!</h4>
                                <h4>Harap Check-in sebelum pukul 03:00 AM </h4>
                            </td>
                        </tr>
                    </tbody>";
            }
        }
    }
}
