<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Author extends Model
{

    public function authorBooks () {
        return $this->hasMany(Book::class, 'id');
    }

    use Sortable;

    // nustatoma kuri lentele bus rikiuojama. kintamieji- galioja tik modelyje, yra bibliotekos
    protected $table="authors";

    //nurodomi kintamieji, kurie gali buti pildomi nauja informacija
    protected $fillable=["name", "surname"];

    // nurodomi visi stulpeliai kuriuo norima rikiuoti
    public $sortable= ["id", "name", "surname"];

}


