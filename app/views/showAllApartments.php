<div class="mt-3 ms-3">
    <h1 class="mb-4"> Квартиры </h1>
    <div style="width: 40%">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Номер дома</th>
                <th scope="col">Этаж</th>
                <th scope="col">Площадь</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество комнат</th>
                <th scope="col">План дома</th>
                <th scope="col">Номер квартиры</th>
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0;$i<count($vars);$i++){
                echo '<tr><th scope="row"><a style="text-decoration: none" href="/apartmentInfo/'. $vars[$i]['Id'] .'">'. $vars[$i]['Id'] .'</a></th><td>'.
                    $vars[$i]['HouseId'] .'</td><td>'.
                    $vars[$i]['Floor'] .'</td><td>'.
                    $vars[$i]['HouseSquare'] .'</td><td>'.
                    $vars[$i]['Price'] .'</td><td>'.
                    $vars[$i]['RoomsCount'] .'</td><td>'.
                    '<a style="text-decoration: none" href="/apartmentPlan/'.$vars[$i]['Id'] .'">&#128269;</a></td><td>'.
                    $vars[$i]['ApartmentNumber'] .'</td>'.
                    '<td><a style="text-decoration: none" href="/editApartment/'. $vars[$i]['Id'] .'">&#9998;</a></td>'.
                    '<td><a style="text-decoration: none" href="/deleteApartment/'. $vars[$i]['Id'] .'">&#10060;</a></td></tr>';
            }
            ?>
            </tbody>
        </table>
</div>