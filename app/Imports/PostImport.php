<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Post;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;


class PostImport implements ToModel, WithStartRow
{

    /* @return int
    */
   public function startRow(): int
   {
       return 2;
   }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        $catogory = Category::firstOrNew([ 'name' => ucwords($row[3])  ],[
            'name' =>  ucwords($row[3])
        ]);
        
        return new Post([
            'title' => $row[0],
            'excerpt' => $row[1],
            'category_id' => $catogory->id,
            'body' => $row[2],
            // 'published_date' => now(),
            'user_id' => Auth()->user()->id
        ]);
    }
}
