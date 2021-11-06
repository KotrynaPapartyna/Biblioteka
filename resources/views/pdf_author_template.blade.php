<style>
    h1 {
        color: blueviolet;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>

{{--vaizdas kaip atrodys ir ka sugeneruos pdf faila lenteleje --}}
     <h1>AUTHOR</h1>

<table>
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>SURNAME</th>
        <th>Authors books count</th>

    </tr>

    <tr>
        <td> {{$author->id }}</td>
        <td> {{$author->name}}</td>
        <td> {{$author->surname}}</td>
        <td> {{$author->booksCount}}</td>
    </tr>

</table>
