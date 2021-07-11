<!DOCTYPE html>
<html lang= "en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width-device-width, initial-scale-1.0">
        <meta http-equiv="X-UA-Compatible" content="ie-edge">
        <title> Transakcije </title>
    </head>

    <body>
        <table>
            <thead>
            <tr>
                <th> ID kupca </th>
                <th> tip transakcije </th>

                <th> datum </th>
                <th> stanje </th>
                <th> cijena </th>
                <th> artikal </th>
                <th> kolicina</th>
                


            </tr> 
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td> {{$transaction->id_kupca}} </td>
                    <td> {{$transaction->tip_transakcije}} </td>
                    <td> {{$transaction->datum}} </td>
                    <td> {{$transaction->stanje}} </td>
                    <td> {{$transaction->cijena}} </td>
                    <td> {{$transaction->artikl}} </td>
                    <td> {{$transaction->kolicina}} </td>


                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </body>
</html>