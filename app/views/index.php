
<div class="mt-3 ms-3">
    <h1 class="mb-4"> Дома </h1>
    <div style="width: 40%">
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Район</th>
                <th scope="col">Год постройки</th>
                <th scope="col">Этажи</th>
                <th scope="col">Тип дома</th>
                <th scope="col">Изменить</th>
                <th scope="col">Удалить</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for($i=0;$i<count($vars);$i++){
                echo '<tr><th scope="row"><a style="text-decoration: none" href="/apartments/'. $vars[$i]['Id'] .'">'. $vars[$i]['Id'] .'</a></th><td>'. $vars[$i]['District'] .'</td><td>'.
                    $vars[$i]['BuiltYear'] .'</td><td>'.
                    $vars[$i]['Floors'] .'</td><td>'.
                    $vars[$i]['HouseType'] .'</td>'.
                    '<td><a style="text-decoration: none" href="/editHouse/'. $vars[$i]['Id'] .'">&#9998;</a></td>'.
                    '<td><a style="text-decoration: none" href="/deleteHouse/'. $vars[$i]['Id'] .'">&#10060;</a></td></tr>';
            }
            ?>
            </tbody>
        </table>
        <div style="width: 15%;">
            <a href="/addHouse" class="btn btn-success"> Добавить </a>
        </div>
</div>