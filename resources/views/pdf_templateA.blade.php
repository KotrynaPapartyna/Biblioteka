<style>
    h1 {
        color: blueviolet;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>


<h1>ALL Authors LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Author Name</th>
        <th>Author Surname</th>
        <th>Author Books Count</th>

    </tr>

    @foreach ($authors as $author)
        <tr>
            <td> {{$author->id }}</td>
            <td> {{$author->name }}</td>
            <td> {{$author->surname}}</td>
            <td> {{$author->booksCount}}</td>


        </tr>
    @endforeach
</table>
