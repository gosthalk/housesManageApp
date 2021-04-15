<div class="ms-3 mt-3">

    <h1> Квартира </h1>

    <label for=""> Номер дома </label>
    <h3><?php echo $vars[0]['HouseId']; ?></h3>
    <label for=""> Этаж </label>
    <h3><?php echo $vars[0]['Floor']; ?></h3>
    <label for=""> Площадь квартиры </label>
    <h3><?php echo $vars[0]['HouseSquare']; ?></h3>
    <label for=""> Количество комнат </label>
    <h3><?php echo $vars[0]['RoomsCount']; ?></h3>
    <label for=""> Номер квартиры </label>
    <h3><?php echo $vars[0]['ApartmentNumber']; ?></h3>
    <label for=""> План дома </label><br>
    <img src="data:image/jpeg;base64, <?php echo $vars[0]['PlaneImage']; ?>" alt="">

</div>