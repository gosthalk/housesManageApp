<div class="ms-3 mt-3" style="width: 20%;">
    <h3 class="mb-3"> Добавление квартиры </h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="mt-3 form-group">
            <label for="inputFloor"> Этаж </label>
            <input type="number" name="Floor" class="mt-2 form-control" id="inputFloor" min="1" max="<?php echo $vars[0]['Floors']; ?>" required>
            <div class="invalid-feedback"> Введите этаж </div>
        </div>
        <div class="mt-3 form-group">
            <label for="inputHouseSquare"> Площадь квартиры </label>
            <input type="number" step="0.01" name="HouseSquare" class="mt-2 form-control" id="inputHouseSquare" min="1" required>
            <div class="invalid-feedback"> Введите площадь квартиры </div>
        </div>
        <div class="mt-3 form-group">
            <label for="inputPrice"> Цена </label>
            <input type="number" name="Price" class="mt-2 form-control" id="inputPrice" min="1" required>
            <div class="invalid-feedback"> Введите цену </div>
        </div>
        <div class="mt-3 form-group">
            <label for=""> Количество комнат </label>
            <select class="mt-2 form-select" name="RoomsCount" aria-label="HouseType">
                <option value="1"> 1-2 </option>
                <option value="2"> 3-4 </option>
                <option value="3">  5-6 </option>
                <option value="4"> Другой </option>
            </select>
        </div>
        <div class="mt-3 form-group">
            <label for="inputApartmentNumber"> Номер квартиры </label>
            <input type="number" name="ApartmentNumber" class="mt-2 form-control" id="inputApartmentNumber" min="1" required>
            <div class="invalid-feedback"> Введите номер квартиры </div>
        </div>
        <div class="mt-3 form-group">
                <label for="inputApartmentPlane"> План дома </label>
                <input type="file" class="mt-2 form-control" name="ApartmentPlane" id="inputApartmentPlane" required>
        </div>
        <div class="d-flex justify-content-center mt-3">
            <button type="submit" name="addApartment" class="btn btn-success"> Добавить </button>
        </div>
    </form>
</div>