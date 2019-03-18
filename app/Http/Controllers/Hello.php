<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\Contracts\CustomServiceInterface;

class Hello extends Controller
{

	public function index(CustomServiceInterface $customServiceInstance)
    {
        return view('hello',array('jobOffers' => $customServiceInstance->getJobOffers()));
    }

    public function getname($name)
	{
	    return view('helloName',array('name' => $name));
	}
}
