<style>
    h1 {
        color: blueviolet;
    }
    table, th, td {
        border: 1px solid black;
    }
     </style>


<h1>ALL BOOKS LIST</h1>

<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Book Title</th>
        <th>Book ISBN</th>
        <th>Book Pages</th>
        <th>About Book</th>
        <th>Book Author</th>

    </tr>

    @foreach ($books as $book)
        <tr>
            <td> {{$book->id }}</td>
            <td> {{$book->title}}</td>
            <td> {{$book->isbn}}</td>
            <td> {{$book->pages}}</td>
            <td> {{$book->about}}</td>
            <td> {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}} </td>

        </tr>
    @endforeach
</table>
