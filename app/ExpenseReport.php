<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    public function Expense()
    {
      return $this->hasMany(Expense::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
