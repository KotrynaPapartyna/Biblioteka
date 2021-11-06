<style>
    h1 {
        color: blueviolet;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>

{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
     <h1>BOOK</h1>

<table>
    <tr>
        <th>ID</th>
        <th>TITLE</th>
        <th>ISBN</th>
        <th>PAGES</th>
        <th>ABOUT BOOK</th>



    </tr>

    <tr>
        <td> {{$book->id }}</td>
        <td> {{$book->title}}</td>
        <td> {{$book->isbn}}</td>
        <td> {{$book->pages}}</td>
        <td> {{$book->about}}</td>



    </tr>

</table>
