<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    protected $fillable = [
        'complete_name',
        'contact_number',
        'email'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getCompleteName()
    {
        return $this->complete_name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getContactNumber()
    {
        return $this->contact_number;
    }

    public function setCompleteName($value)
    {
        // UPDATE friends SET complete_name=':value' WHERE id=$this->id
        $this->complete_name = $value;
        return $this->save();
    }

    public function setEmail($value)
    {
        // UPDATE friends SET email=':value' WHERE id=$this->id
        $this->email = $value;
        return $this->save();
    }

    public function setContactNumber($value)
    {
        // UPDATE friends SET contact_number=':value' WHERE id=$this->id
        $this->contact_number = $value;
        return $this->save();
    }
}
