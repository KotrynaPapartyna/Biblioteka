<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{

    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="books";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["title", "isbn", "pages", "about", "author_id"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "title", "about", "author_id"];



    public function bookAuthor() {
        return $this->belongsTo(Author::class, "author_id", "id");

    }

}
