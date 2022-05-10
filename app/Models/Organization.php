<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_number',
        'address',
        'type',
        'website_url'
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'organization_id', 'id');
    }

    public function getMembersCount()
    {
        if (empty($this->users) || is_null($this->users)) {
            return 0;
        }
        return $this->users->count();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getContactNumber()
    {
        return $this->contact_number;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getWebsiteURL()
    {
        return $this->website_url;
    }

    public function setName($value)
    {
        // UPDATE organizations SET name=$value
        $this->name = $value;
        return $this->save();
    }

    public function setAddress($value)
    {
        // UPDATE organizations SET address=$value
        $this->address = $value;
        return $this->save();
    }

    public function setContactNumber($value)
    {
        $this->contact_number = $value;
        return $this->save();
    }

    public function setType($value)
    {
        $this->type = $value;
        return $this->save();
    }

    public function setWebsiteURL($value)
    {
        $this->website_url = $value;
        return $this->save();
    }

    public function isPrivate()
    {
        return ($this->type == 'private');
    }

    public function isGovernment()
    {
        return ($this->type == 'government');
    }
}
