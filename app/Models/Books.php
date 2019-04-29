<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    //fillable properties
		protected $fillable = [
			'title', 'isbn', 'status', 'user_id',
		];

		//function getting relationshsip bettween user and book create
		public function user()
		{
			return $this->belongsTo(User::class);
		} 

}
